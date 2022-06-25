<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\VideoHistory;
use App\Video;

class VideoController extends Controller
{
    // Validation Message
    public $message = [
        'video_title.required'      =>  '動画タイトルが必要とされている。',

        'filename.required'         =>  '動画が必要です。',

        'video_url.required'        =>  '動画が必要です。',

        'point.required'            =>  'ポイントが必要です。',
        // 'point.digits_between'      =>  'ポイントは1から100の間でなければなりません。',
        'point.integer'             =>  'ポイントは数字でなければなりません。',
        'point.between'             =>  'ポイントは0から100の間でなければなりません。',

        'caption.required'          =>  'キャプションが必要です。',
        // 'caption.min'               =>  'キャプションは20〜1000の間でなければなりません。',
        'caption.max'               =>  'キャプション文字の長さは:max未満である必要があります。',
    ];

    //////////////////// The Admin Video ////////////////////
    // The First Page
    public function index(){
        if($_SESSION['isAuthentication']){
            $page_title = '動画管理';
            $videos = Video::paginate(10);
            return view('well_pedia.admin.video.list', ['videos' => $videos, 'page_title' => $page_title]);
        } else {
            return redirect()->route('toAdminLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    // The Fnnction to Get All Videos
    public function getVideos(Request $request){
        $result = DB::table('tbl_video')->get();
        return json_encode(array("data" => $result));
    }

    // The Function to Search
    public function onSearchVideo(Request $request){
        $sql = "SELECT * FROM `tbl_video` WHERE video_title LIKE '%" . $request->key . "%' OR caption LIKE '%" . $request->key . "%'";
        $result = DB::select($sql);
        return response()->json($result);
    }

    // The Function to Delete
    public function delete(Request $request){
        $result = Video::where('id', $request->id)->first();
        File::delete(public_path('upload/videos/' . $result->video_name));
        Video::where('id', $request->id)->delete();
    }

    // The Function to Delete Video History
    public function onDeleteVideoHistory(Request $request){
        VideoHistory::where('id', $request->id)->delete();

        $point_sql =   "SELECT sort, sum(point) as point
                        FROM `tbl_video_history`
                        GROUP BY sort
                        ORDER BY sort DESC";
        $points = DB::select($point_sql);
        return $points;
    }

    //////////////////// Admin Video Register ////////////////////
    // The First Page to Register
    public function toRegister(){
        if($_SESSION['isAuthentication']){
            $page_title = "動画ー登録";
            return view('well_pedia.admin.video.add', ['page_title' => $page_title]);
        } else {
            return redirect()->route('toAdminLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    // The Function to Avoid Duplicate
    public function onAvoidDuplicate(Request $request){
        File::delete(public_path('upload/videos/' . $request->filename));
    }

    // The Function to Upload
    public function videoUpload(Request $request){
        $data = array();

        $validator = Validator::make($request->all(), [
           'file' => 'required|mimes:mp4, avi, mpg, mpeg, quicktime'
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
                $location = 'upload/videos';

                // Upload file
                $file->move($location, $filename);

                // File path
                $filepath = url('upload/videos/'.$filename);

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
    public function register(Request $request){
        $valid = $request->validate([
                        'video_title'   => 'required|max:50',
                        'filename'      => 'required|max:100',
                        'video_url'     => 'required|max:200',
                        'point'         => 'required|integer|between:0,100',
                        'caption'       => 'max:1000',
         ], $this->message);

        $result = Video::create([
            'video_title'   => $valid['video_title'],
            'video_name'    => $valid['filename'],
            'video_url'     => $valid['video_url'],
            'genre'         => $request['genre'],
            'point'         => $valid['point'],
            'caption'       => $valid['caption'] == null ? '' : $valid['caption'],
         ]);

        if($result){
            return redirect()->route('toAdminVideo');
        }
    }

    //////////////////// Admin Video Edit ////////////////////
    // The Page to Edit
    public function toEdit(Request $request){
        if($_SESSION['isAuthentication']){
            $page_title = "動画ー編集";
            $video = Video::where('id', $request->id)->first();
            return view('well_pedia.admin.video.edit', [
                        'video' => $video,
                        'page_title' => $page_title
                    ]);
        } else {
            return redirect()->route('toAdminLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    // The Function to Edit
    public function update(Request $request){
        $valid = $request->validate([
                            'video_title'   => 'required|max:50',
                            'filename'      => 'required|max:100',
                            'video_url'     => 'required|max:200',
                            'point'         => 'required|integer|between:0,100',
                            'caption'       => 'max:1000',
        ], $this->message);

        $result = Video::where('id', $request->id)
                        ->update([
                            'video_title'   => $valid['video_title'],
                            'video_name'    => $valid['filename'],
                            'video_url'     => $valid['video_url'],
                            'genre'         => $request->genre,
                            'point'         => $valid['point'],
                            'caption'       => $valid['caption'] == null ? '' : $valid['caption'],
                        ]);
        if($result){
            return redirect()->route('toAdminVideo');
        }
    }

}
