<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Kokoro;
use App\Kokoro_type;

class KokoroController extends Controller
{
    // Validation Message
    public $message = [
        'name.required'         => 'タイプ名は必須です。',
        'name.alpha_num'        => 'タイプ名はアルファと数字である必要があります。',

        'priority.required'     => '優先順位が必要です。',
        'priority.digits'       => '優先順位は数字でなければなりません。',
    ];

/////////////////////////////////// Admin ///////////////////////////////////
    // The First List Page
    public function index(Request $request){
        $page_title = "KOKORO";
        if(isset($_SESSION['isAuthentication'])){
            $result = Kokoro::orderBy('created_at', 'DESC')->paginate(8);
            return view('well_pedia.admin.kokoro.index', [
                'page_title'    => $page_title,
                'kokoros'       => $result,
            ]);
        } else {
            return redirect()->route('toAdminLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    public function onDeleteAdminKokoro(Request $request){
        Kokoro::where('id', $request->id)->delete();
    }

    public function onDeleteAdminCheckedKokoro(Request $request){
        for($i = 0; $i < count($request->ids); $i++){
            Kokoro::where('id', $request->ids[$i])->delete();
        }
    }

    // Side to Register
    public function toAdminKokoroRegister(Request $request){
        if(isset($_SESSION['isAuthentication'])){
            $page_title = "KOKORO登録";
            $types = Kokoro_type::get();
            return view("well_pedia.admin.kokoro.add", [
                'page_title'    => $page_title,
                'types'         => $types
            ]);
        } else {
            return redirect()->route('toAdminLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    public function onAdminKokoroUpload(Request $request){
        $data = array();

        $validator = Validator::make($request->all(), [
           'file' => 'required|mimes:jpg, png, bmp, gif,'
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
                $location = 'upload/kokoro';

                // Upload file
                $file->move($location, $filename);

                // File path
                $filepath = url('upload/kokoro/'.$filename);

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

    public function onAdminKokoroRegister(Request $request){

        $valid = $request->validate([
            'title'     => 'required|max:50',
            'content'   => 'required|min:10|max:1000',
        ], $this->message);

        $year = date('Y');
        $month = date('m');
        $day = date('d');
        $date = $year . '年 ' . $month . '月 ' . $day . '日';
        Kokoro::create([
            'title'     => $valid['title'],
            'content'   => nl2br($valid['content']),
            'image_url' => $request->image_url == null? '' : $request->image_url,
            'filename'  => $request->filename == null? '' : $request->filename,
            'type'      => $request->type,
            'public'    => $request->public != null ? 1 : 0,
            'date'      => $date
        ]);

        return redirect()->route('toAdminKokoro')->with('success-message', '正確に登録しました。');
    }

    // Side to Edit
    public function toAdminKokoroEdit($id){
        $page_title = "KOKORO更新";
        if(isset($_SESSION['isAuthentication'])){
            $result = Kokoro::where('id', $id)->first();

            return view('well_pedia.admin.kokoro.edit', [
                    'page_title'    => $page_title,
                    'kokoro'        => $result
            ]);
        } else {
            return redirect()->route('toAdminLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    public function onAdminKokoroEdit(Request $request){
        $valid = $request->validate([
            'title'     => 'required|max:50',
            'content'   => 'required|min:10|max:1000',
        ], $this->message);

        $year = date('Y');
        $month = date('m');
        $day = date('d');
        $date = $year . '年 ' . $month . '月 ' . $day . '日';
        Kokoro::where('id', $request->id)->update([
            'title'     => $valid['title'],
            'content'   => nl2br($valid['content']),
            'image_url' => $request->image_url == null? '' : $request->image_url,
            'filename'  => $request->filename == null? '' : $request->filename,
            'type'      => $request->type,
            'public'    => $request->public != null ? 1 : 0,
            'date'      => $date
        ]);

        return redirect()->route('toAdminKokoro')->with('success-message', '彼は正しく変わった。');
    }

    public function toAdminAddKokoroType(){
        $page_title = "KOKOROタイプを";
        if(isset($_SESSION['isAuthentication'])){
            $types = Kokoro_type::orderBy('priority', 'ASC')->get();
            return view('well_pedia.admin.kokoro.type', [
                    'page_title'    => $page_title,
                    'types'         => $types
            ]);
        } else {
            return redirect()->route('toAdminLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    public function onAdminAddKokoroType(Request $request){
        $valid = $request->validate([
            'name'      => 'required|alpha_num',
            'priority'  => 'required|digits_between:1,3'
        ], $this->message);

        $confirm = Kokoro_type::where('priority', $valid['priority'])
                                ->first();

        if(!isset($confirm)){
            Kokoro_type::create([
                'name'      => $valid['name'],
                'priority'  => $valid['priority'] + 2
            ]);
        } else {
            return redirect()->route('toAdminAddKokoroType')->with('sucess-message', 'すでに同じ優先順位があります。');
        }

        return redirect()->route('toAdminAddKokoroType')->with('message', "新しいタイプを正確に追加します。");
    }

    public function onAdminDeleteKokoroType(Request $request){
        Kokoro_type::where('id', $request->id)->delete();
    }


/////////////////////////////////// User ///////////////////////////////////





}
