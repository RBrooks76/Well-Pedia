<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Staff;
use App\Client;
use Validator;
use Redirect;
use DateTime;

class LoginController extends Controller
{

    // Validation Message
    public $message = [
        'email.required'        => 'メールが必要です。',
        'email.max'             => 'メールは:max文字未満である必要があります。',

        'company_code.required' => '企業コードが必要です。',
        'company_code.digits'   => '企業コードは:digits桁である必要があります。',

        'staff_number.required' => '社員番号が必要です。',
        'staff_number.digits'   => '社員番号は:digits桁である必要があります。',

        'password.required'     => 'スワードが必要です。',
        'password.alpha_num'    => 'パスワードは、数字または英字、あるいはその両方の合計である必要があります。',
        'password.min'          => 'パスワードは8〜12文字である必要があります',
        'password.max'          => 'パスワードは8〜12文字である必要があります',
    ];
    ////////////////// AS ADMIN //////////////////
    // The Function to Login as Admin
    public function onAdminLogin(Request $request){


        $valid = $request->validate([
            'email'      => 'required|email|max:100',
            'password'   => 'required|alpha_num|min:8|max:12',
        ], $this->message);

        $result = Admin::where('email', $valid['email'])
                        ->where('password', $valid['password'])
                        ->first();

        if(!$result){
            return redirect()
                    ->route('toAdminLogin')
                    ->with('error-message', 'あなたが見つけた人は誰もいません。 再試行。');
        } else {
            $_SESSION['isAuthentication'] = true;
            $_SESSION['role'] = $result['role'];
            // if($result['role']){
                return redirect()->route('toAdminList');
            // } else {
            //     return redirect()->route('');
            // }

        }
    }

    ////////////////// AS Client //////////////////
    // The Function to Login as Client
    public function onClientLogin(Request $request){
        $valid = $request->validate([
            'company_code'  => 'required|digits:8',
            'password'      => 'required|alpha_num|min:8|max:12',
        ], $this->message);

        $result = Client::where('company_code', $valid['company_code'])
                        ->where('password',     $valid['password'])
                        ->first();
        if($result){
            $_SESSION['isClient'] = true;
            $_SESSION['company_code'] = $valid['company_code'];
            $_SESSION['company_name'] = $result->company_name;
            return redirect()
                    ->route('toClientMain');
        } else {
            return redirect()
                    ->route('toClientLogin')
                    ->with('error-message', 'あなたが見つけようとしている会社はありません。 再試行。');
        }
    }

    // The Function to Login as Client In The Case Forgotten Password
    public function onClientForget(Request $request){
        $valid = $request->validate([
                    'company_code'      => 'required|digits:8',
                    'email'             => 'required|email'
                ], $this->message);

        $result = Client::where('company_code', $valid['company_code'])
                        ->where('email', $valid['email'])
                        ->first();

        if($result){
            return redirect()->route('toClientLogin')
                            ->with('success-message', 'パスワード : ' . $result->password);
        } else {
            return redirect()->route('toLoginForgotten')
                            ->with('error-message', 'あなたが見つけたクライアントはありません。 再試行。');
        }
    }

    ////////////////// AS User //////////////////
    // The Function to Login as User
    public function onUserLogin(Request $request){
        $valid = $request->validate([
            'company_code'  => 'required|digits:8',
            'staff_number'  => 'required|digits:8',
            'password'      => 'required|alpha_num|min:8|max:12',
        ], $this->message);

        $verify_company = Client::where('company_code', $valid['company_code'])->first();

        if($verify_company){
            $result = Staff::where('company_code',  $valid['company_code'])
                            ->where('staff_number', $valid['staff_number'])
                            ->where('password',     $valid['password'])
                            ->first();

            if($result){
                $_SESSION['isUser']       = true;
                $_SESSION['userID']       = $result->id;
                $_SESSION['staff_number'] = $result->staff_number;
                $_SESSION['company_code'] = $result->company_code;
                $_SESSION['company_name'] = $verify_company->company_name;

                $time = new DateTime();
                $formattedTime = $time->format('Y/m/d H:i:s');
                Staff::where('id',  $result->id)
                            ->update(['final_login_date' => $formattedTime]);

                return redirect()->route('toMyPage');
            } else {
                return redirect('/user')->with('error-message', "あなたが見つけようとしている会社はありません。 再試行。");
            }
        } else {
            return redirect('/user')->with('error-message', "あなたが見つけようとしているスタッフはいない。 再試行。");
        }

    }

    // The Function to Login as User In The Case Forgotten Password
    public function onUserForgotten(Request $request){
        $valid = $request->validate([
            'company_code' => 'required|digits:8',
            'staff_number' => 'required|digits:8',
            'email'        => 'required|email|max:100'
        ]);

        $result = Staff::where('company_code', $valid['company_code'])
                        ->where('staff_number', $valid['staff_number'])
                        ->where('email', $valid['email'])
                        ->first();
        if($result){
            $_SESSION['isUser']       = true;
            $_SESSION['userID']       = $result->id;
            $_SESSION['staff_number'] = $result->staff_number;
            $_SESSION['company_code'] = $result->company_code;
            // $result->full_name = $result->first_name . ' ' . $result->last_name;
            // $result->birthday = $result->birth_year . '年 ' . $result->birth_month . '月 ' . $result->birth_day . '日';
            // return redirect()->route('toBasicInfo', ['result' => $result]);
             return redirect()->route('toBasicInfo');
        }
    }

}
