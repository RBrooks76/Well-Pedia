<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin;

class AdminController extends Controller
{

    // Validation Message
    public $message = [
        'username.required'     => '管理ユーザー名が必要です。',
        'username.max'          => '管理ユーザー名は:max未満である必要があります',
        'email.required'        => 'メールが必要です。',
        'email.max'             => 'メールは:max未満である必要があります。',
        'password.required'     => 'パスワードが必要。',
        'password.alpha_num'    => 'パスワードは、数字または英語のアルファベット、あるいは両方の合計である必要があります。',
        'password.min'          => 'パスワードは8から12の間でなければなりません。',
        'password.max'          => 'パスワードは8から12の間でなければなりません。',
    ];

    // The Function to Encrypt the Data
    public function encryption($data){
        return MD5($data);
    }

    // The First Page for Admin
    public function toAdminLogin(){
        $page_title = '管理者専用ページ';

        if(!Admin::where('role', 1)->first()){
            Admin::create([
                'username'  => 'Administrator',
                'email'     => 'admin@email.com',
                'password'  => 'password',
                'role'      => 1
            ]);
        }

        return view('well_pedia.admin.auth.login', ['page_title' => $page_title]);
    }

    // The Function for Admin logout
    public function onAdminlogout(){
        session_destroy();
        return redirect()->route('toAdminLogin');
    }

//////////////////// Admin List ////////////////////

    // The Page for Admin List
    public function toAdminList(){
        $page_title = '管理ユーザー管理';

        if(isset($_SESSION['isAuthentication'])){
            $admins = Admin::all();
            return view('well_pedia.admin.admin.list', [
                            'admins'        => $admins,
                            'page_title'    => $page_title
                    ]);
        } else {
            return redirect()->route('toAdminLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    // The Function for Admin Delete(related to ID)
    public function onDeleteAdmin(Request $request){
        DB::table('tbl_admin')
                ->where('id',  $request->id)
                ->delete();
    }

    // The Function for Admin Delete(related to Seleted)
    public function onCheckedDeleteAdmin(Request $request){
        for($i = 0; $i < count($request->ids); $i++){
            DB::table('tbl_admin')
                ->where('id',  $request->ids[$i])
                ->delete();
        }
    }

//////////////////// Admin Register ////////////////////

    // The Page for Admin Register
    public function toAdminRegister(){
        $page_title = '管理ユーザー登録';

        if(isset($_SESSION['isAuthentication'])){
            return view('well_pedia.admin.admin.add', ['page_title' => $page_title]);
        } else {
            return redirect()->route('toAdminLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    // The Function for Admin Register
    public function onAdminRegister(Request $request){

        $valid = $request->validate([
            'username'  => 'required|max:30',
            'email'     => 'required|email|max:50',
            'password'  => 'required|alpha_num|min:8|max:12',
        ], $this->message);

        $name = Admin::where('username', $valid['username'])->first();
        $email = Admin::where('email', $valid['email'])->first();

        if($name){
            return redirect()->route('toAdminRegister')->with('error-message', '同じ名前のユーザーがすでにいます。');
        } else if($email) {
            return redirect()->route('toAdminRegister')->with('error-message', '同じメールアドレスのユーザーがすでにいます。');
        } else{
            Admin::create([
                'username'  => $valid['username'],
                'email'     => $valid['email'],
                'password'  => $valid['password'],
                'role'      => 0
            ]);
            return redirect()->route('toAdminList');
        }
    }

//////////////////// Admin Edit ////////////////////

    // The Page for Admin Edit
    public function toAdminEdit(Request $request){

        if($_SESSION['isAuthentication']){
            $page_title = '管理ユーザー編集';
            $result = Admin::where('id', $request->id)->first();
            return view('well_pedia.admin.admin.edit', [
                        'result' => $result,
                        'page_title' => $page_title
                    ]);
        } else {
            return redirect()->route('toAdminLogin')->with('error-message', '最初にログインする必要があります。');
        }
    }

    // The Function for Admin Edit
    public function onAdminEdit(Request $request){
        $valid = $request->validate([
            'username'  => 'required|max:30',
            'email'     => 'required|email|max:50',
            'password'  => 'required|alpha_num|min:8|max:12',
        ], $this->message);

        Admin::where('id', $request->id)->update($valid);
        return redirect()->route('toAdminList');
    }









}
