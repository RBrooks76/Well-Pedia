<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Content;

class ContentController extends Controller
{
    // Validation Message
    public $message = [
        'concept_image.required'            => 'Concept画像が必要です。',
        'concept_filename.required'         => 'Concept画像が必要です。',
        'concept_text.required'             => 'Conceptテキストが必要です。',
        'concept_text.max'                  => 'Conceptテキストは2000文字未満である必要があります。',
        'recommendation_image.required'     => 'Recommendation画像が必要です。',
        'recommendation_filename.required'  => 'Recommendation画像が必要です。',
        'recommendation_text.required'      => 'Recommendationテキストが必要です。',
        'recommendation_text.max'           => 'Recommendationテキストは2000文字未満である必要があります。',
    ];

//////////////////// Admin Content ////////////////////

    // The First Page for Admin Content
    public function toAdminContent(){
        if(isset($_SESSION['isAuthentication'])){
            $result = DB::table('tbl_content')->first();
            if($result){
                $page_title = 'コンテンツー編集';
                return view('well_pedia.admin.content.edit', [
                            'page_title' => $page_title,
                            'result' => $result,
                        ]);
            } else {
                $page_title = 'コンテンツー登録';
                return view('well_pedia.admin.content.add', [
                            'page_title' => $page_title,
                        ]);
            }
        } else {
            return redirect()->route('toAdminLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    // The Function to Upload Concept Immage
    public function conceptUpload(Request $request){
        $data = array();

        $validator = Validator::make($request->all(), [
           'file' => 'required|mimes:png,jpg,jpeg'
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
                $location = 'upload/contents';

                // Upload file
                $file->move($location, $filename);

                // File path
                $filepath = url('upload/contents/'.$filename);
                // Response
                $data['success'] = 1;
                $data['message'] = 'Uploaded Successfully!';
                $data['real_filename'] = $real_filename;
                $data['filename'] = $filename;
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

    // The Function to Upload Recommend Image
    public function recommUpload(Request $request){
        $data = array();

        $validator = Validator::make($request->all(), [
           'file' => 'required|mimes:png,jpg,jpeg'
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
                $location = 'upload/contents';

                // Upload file
                $file->move($location, $filename);

                // File path
                $filepath = url('upload/contents/'.$filename);

                // Response
                $data['success'] = 1;
                $data['message'] = 'Uploaded Successfully!';
                $data['real_filename'] = $real_filename;
                $data['filename'] = $filename;
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

    // The Function To Register Content
    public function register(Request $request){
        $valid = $request->validate([
            'concept_image'             => 'required|max:100',
            'concept_filename'          => 'required|max:100',
            'concept_text'              => 'max:2000',
            'recommendation_image'      => 'required|max:100',
            'recommendation_filename'   => 'required|max:100',
            'recommendation_text'       => 'max:2000',
        ], $this->message);

        $result = Content::create([
            'concept_image'             => $valid['concept_image'],
            'concept_filename'          => $valid['concept_filename'],
            'concept_text'              => $request->concept_text == null ? '' : nl2br($request->concept_text),
            'recommendation_image'      => $valid['recommendation_image'],
            'recommendation_filename'   => $valid['recommendation_filename'],
            'recommendation_text'       => $request->recommendation_text == null ? '' : nl2br($request->recommendation_text),
        ]);

        if($result){
            return redirect()->route('toAdminContent');
        }
    }

    // The Function to Edit Content
    public function edit(Request $request){
        // return $request->concept_image;
        $valid = $request->validate([
            'concept_image'             => 'required|max:100',
            'concept_filename'          => 'required|max:100',
            'concept_text'              => 'max:2000',
            'recommendation_image'      => 'required|max:100',
            'recommendation_filename'   => 'required|max:100',
            'recommendation_text'       => 'max:2000',
        ]);

        $result = DB::table('tbl_content')->where('id', $request->id)
                ->update([
                    'concept_image'             => $valid['concept_image'],
                    'concept_filename'          => $valid['concept_filename'],
                    'concept_text'              => $valid['concept_text'] == null ? '' : nl2br($valid['concept_text']),
                    'recommendation_image'      => $valid['recommendation_image'],
                    'recommendation_filename'   => $valid['recommendation_filename'],
                    'recommendation_text'       => $valid['recommendation_text'] == null ? '' : nl2br($valid['recommendation_text']),
                ]);

        // if($result){
            return redirect()->route('toAdminContent');
        // }
    }

    // The Function to Advoid Duplicate Content
    public function onAvoidDuplicate(Request $request){
        File::delete(public_path('upload/contents/' . $request->filename));
    }
}
