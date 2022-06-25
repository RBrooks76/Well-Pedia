<?php

namespace App\Http\Controllers;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\News;


class NewsController extends Controller
{
    // Validation Message
    public $message = [
        'news_title.required'   => 'ニュースタイトルが必要です。',
        'news_title.max'        => 'ニュースのタイトルは:max文字未満である必要があります。',

        'filename.required'     => '画像が必要です。',
        'genre.required'        => '種類が必要です。',

        'news_caption.required' => 'ニュースのキャプションが必要です。',
        'news_caption.min'      => 'ニュースのキャプションは、:minと5000の文字の間にある必要があります。',
        'news_caption.max'      => 'ニュースのキャプションは、20と:maxの文字の間にある必要があります。',
    ];

    // The Function for Customize Pagination with SQL Query
    public function paginateArray($data, $perPage = 10){
        $page = Paginator::resolveCurrentPage();
        $total = count($data);
        $results = array_slice($data, ($page - 1) * $perPage, $perPage);

        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
        ]);
    }

//////////////////// Admin News ////////////////////

    // The First Page
    public function toAdminNews(){
        $page_title = "ニュース管理";
        if(isset($_SESSION['isAuthentication'])){
            $all = News::orderby('created_at', 'DESC')->paginate(10);
            $notices = News::where('genre', 1)->orderby('created_at', 'DESC')->paginate(10);
            $publications = News::where('genre', 2)->orderby('created_at', 'DESC')->paginate(10);
            return view('well_pedia.admin.news.list', [
                    'page_title'    =>  $page_title,
                    'all'           =>  $all,
                    'notices'       =>  $notices,
                    'publications'  =>  $publications
            ]);
        } else {
            return redirect()->route('toAdminLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    // The Function to Search
    public function onAdminSearchNews(Request $request){
        // return $request;
        if($request->tab != 0){
            $sql = "SELECT id, news_title, genre, news_caption
                    FROM `tbl_news`
                    WHERE genre = $request->tab
                    AND news_title LIKE '%$request->key%'
                    OR news_caption LIKE '%$request->key%'
                    OR created_at LIKE '%$request->key%'";

            $result = $this->paginateArray(DB::select($sql));
        } else {
            $sql = "SELECT id, news_title, genre, news_caption
            FROM `tbl_news`
            WHERE news_title LIKE '%$request->key%'
            OR news_caption LIKE '%$request->key%'
            OR created_at LIKE '%$request->key%'";

            // $result = $this->paginateArray(DB::select($sql));
            $result = DB::select($sql);
        }

        return response()->json($result);

    }

    // The Function to Delete
    public function onAdminDeleteNews(Request $request){
        // return $request;
        News::where('id', $request->id)->delete();
    }

//////////////////// Admin News Register ////////////////////

    // The Page to Register
    public function toAdminNewsRegister(){
        $page_title = "ニュース登録";
        if(isset($_SESSION['isAuthentication'])){
            return view('well_pedia.admin.news.add', [
                    'page_title'    =>  $page_title,
            ]);
        } else {
            return redirect()->route('toAdminLogin')->with('error-message', '最初にログインする必要があります。');
        }

    }

    // The Function to Upload
    public function onAdminNewsUpload(Request $request){
        $data = array();

        $validator = Validator::make($request->all(), [
           'file' => 'required|mimes:jpg, png, bmp, gif, mp4, avi, mpg, mpeg, quicktime'
        ]);

        if ($validator->fails()) {

            $data['success'] = 0;
            $data['error'] = $validator->errors()->first('file');// Error response

        }else{
           if($request->file('file')) {

                $file = $request->file('file');
                $real_filename = $file->getClientOriginalName();
                $filename = time().'_'.$file->getClientOriginalName();

                // File extension
                $extension = $file->getClientOriginalExtension();

                // File upload location
                $location = 'upload/news';

                // Upload file
                $file->move($location, $filename);

                // File path
                $filepath = url('upload/news/'.$filename);

                // Response
                $data['success'] = 1;
                $data['message'] = 'Uploaded Successfully!';
                $data['filename'] = $filename;
                $data['real_filename'] = $real_filename;
                $data['filepath'] = $filepath;
                $data['extension'] = $extension;
           }else{
               // Response
               $data['success'] = 2;
               $data['message'] = 'File not uploaded.';
           }
        }

        return response()->json($data);
    }

    // The Function to Register
    public function onAdminNewsRegister(Request $request){
        $valid = $request->validate([
            'news_title'    => 'required|max:50',
            'genre'         => 'required',
            'news_caption' => 'min:20|max:3000'
            // 'filename'      => 'required|max:50',
            // 'news_url'      => 'required|max:100',
            // 'news_caption'  => 'required|min:20|max:3000'
        ], $this->message);

        // return $valid;
        $year = date('Y');
        $month = date('m');
        $day = date('d');
        $date = $year . '年 ' . $month . '月 ' . $day . '日';
        News::create([
            'news_title'    => $valid['news_title'],
            'news_name'     => $request->filename == null ? '' : $request->filename,
            'news_url'      => $request->news_url == null ? '' : $request->news_url,
            'genre'         => $valid['genre'],
            'news_caption'  => nl2br($valid['news_caption']),
            'date'          => $date
        ]);

        return redirect()->route('toAdminNews');
    }

//////////////////// Admin News  ////////////////////

    // The Page for Detail
    public function toAdminNewsDetail(Request $request){
        $page_title = "ニュース";
        if(isset($_SESSION['isAuthentication'])){
            $result = News::where('id', $request->id)->first();
            return view('well_pedia.admin.news.detail', [
                    'page_title'    =>  $page_title,
                    'news'          =>  $result
            ]);
        } else {
            return redirect()->route('toAdminLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

//////////////////// Admin News Edit ////////////////////

    // The Page to Edit
    public function toAdminNewsEdit(Request $request){
        $page_title = "ニュース編集";
        if(isset($_SESSION['isAuthentication'])){
            $result = News::where('id', $request->id)->first();
            return view('well_pedia.admin.news.edit', [
                    'page_title'    =>  $page_title,
                    'news'          =>  $result
            ]);
        } else {
            return redirect()->route('toAdminLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    // The Function to Edit
    public function onAdminEditNews(Request $request){
        $valid = $request->validate([
            'news_title'   => 'required|max:50',
            // 'filename'      => 'required|max:50',
            // 'news_url'      => 'required|max:100',
            'genre'         => 'required',
            // 'news_caption'  => 'required|min:20|max:3000'
            'news_caption'  => 'max:3000'
        ], $this->message);

        // return $valid;
        $year = date('Y');
        $month = date('m');
        $day = date('d');
        $date = $year . '年 ' . $month . '月 ' . $day . '日';

        News::where('id', $request->id)->update([
            'news_title'    => $valid['news_title'],
            'news_name'     => $request->filename == null ? '' : $request->filename,
            'news_url'      => $request->news_url == null ? '' : $request->news_url,
            'genre'         => $valid['genre'],
            'news_caption'  => nl2br($valid['news_caption']),
            'date'          => $date
        ]);
        return redirect()->route('toAdminNews');
    }

    // The Function to Avoid Duplicate News
    public function onAvoidDuplicateNews(Request $request){
        File::delete(public_path('upload/news/' . $request->filename));
    }
}
