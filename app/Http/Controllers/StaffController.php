<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Admin;
use App\Staff;
use App\Content;
use App\Video;
use App\VideoHistory;
use App\Client;
use App\Health;
use App\Kokoro;
use DateTime;

class StaffController extends Controller
{
    // Validation Message
    public $message = [
        'company_name.required' => '会社名が必要です。',
        'company_name.max'      => '会社名は:max文字未満である必要があります。',

        'company_code.required' => '企業コードが必要です。',
        'company_code.digits'   => '企業コードは:digits桁である必要があります。',

        'staff_number.required' => '社員番号が必要です。',
        'staff_number.digits'   => '社員番号は:digits桁である必要があります。',

        'deploy.required'       => '部署が必要です。',
        'deploy.max'            => '社員番号は8桁である必要があります。',

        'first_name.required'   => '姓が必要です。',
        'first_name.alpha'      => '姓は文字である必要があります。',
        'first_name.max'        => '姓は:max文字未満である必要があります。',

        'last_name.alpha'       => '名は文字である必要があります',
        'last_name.required'    => '名が必要です。',
        'last_name.max'         => '名は:max文字未満である必要があります。',

        'gender.required'       => '性別が必要です。',

        'email.required'        => 'メールが必要です。',
        'email.max'             => 'メールは:max文字未満である必要があります。',

        'password.required'     => 'パスワードが必要。',
        'password.alpha_num'    => 'パスワードは、数字または英字、あるいはその両方の合計である必要があります。',
        'password.min'          => 'パスワードは8〜12文字である必要があります',
        'password.max'          => 'パスワードは8〜12文字である必要があります',
    ];

    // Customize Pagination with SQL Query
    public function paginateArray($data, $perPage = 10) {
        $page = Paginator::resolveCurrentPage();
        $total = count($data);
        $results = array_slice($data, ($page - 1) * $perPage, $perPage);

        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
        ]);
    }

//////////////////// The First Page ////////////////////
    // The Page for Admin Staff
    public function index(){
        if(isset($_SESSION['isAuthentication'])){
            $page_title = 'スタッフ⼀覧';
            $staffs = Staff::paginate(8);

            $year = date("Y");
            $month = date("m");
            $current_month = $year . '-' . $month;
            $getPoint = "SELECT A.*, (SELECT IFNULL(sum(point), 0) FROM tbl_video_history WHERE date LIKE '%". $current_month ."%' AND staff_number = A.id) as point,
                        (SELECT company_name FROM tbl_client WHERE company_code = A.company_code) as company_name FROM tbl_staff as A";
            $points = $this->paginateArray(DB::select($getPoint));
            return view('well_pedia.admin.staff.list', [
                    'staffs' => $staffs,
                    'points' => $points,
                    'page_title' => $page_title
                ]);
        } else {
            return redirect()
                    ->route('toAdminLogin')
                    ->with('error-message', "最初にログインする必要があります。");
        }
    }

    // The Function to delete
    public function onDeleteCheckedStaff(Request $request){
        for($i = 0; $i < count($request->ids); $i++){
            Staff::where('id', $request->ids[$i])->delete();
            VideoHistory::where('staff_number', $request->ids[$i])->delete();
        }
    }

    // The Function to Search
    public function onAdminStaffSearch(Request $request){
        $sql = "SELECT A.*, (SELECT IFNULL(sum(point), 0) FROM tbl_video_history WHERE staff_number = A.id) as point
                FROM tbl_staff as A
                WHERE staff_number LIKE '%" . $request->key ."%'
                OR first_name LIKE '%" . $request->key ."%'
                OR last_name LIKE '%" . $request->key ."%'
                OR company_name LIKE '%" . $request->key ."%'
                OR deploy LIKE '%" . $request->key ."%'
                OR email LIKE '%" . $request->key ."%'";
        // echo $sql;
        $result = $this->paginateArray(DB::select($sql));
        return response()->json($result);
    }

    // The Function to Clear Search Keyword
    public function onAdminStaffSearchClear(Request $request){
        $staffs = Staff::paginate(8);
        return response()->json($staffs);
    }

 //////////////////// Admin Staff Register ////////////////////
    // The Page to Register
    public function toAdd(Request $request){
        if(isset($_SESSION['isAuthentication'])){
            $page_title = "新規スタッフ登録";
            return view('well_pedia.admin.staff.add', [
                    'page_title' => $page_title
                ]);
        } else {
            return redirect('/admin')
                    ->with('error-message', "最初にログインする必要があります。");
        }
    }

    // The Function to Resigter
    public function register(Request $request){
        // return $request;
        $valid = $request->validate([
                'company_code'      => 'required|digits:8',
                'staff_number'      => 'required|digits:8',
                'deploy'            => 'max:20',
                'first_name'        => 'required|alpha|max:20',
                'last_name'         => 'required|alpha|max:20',
                'gender'            => 'required',
                'email'             => 'required|email|max:100',
                'password'          => 'required|alpha_num|min:8|max:12',
        ], $this->message);

        $is_company = Client::where('company_code', $valid['company_code'])
                            ->first();
        $is_staff = Staff::where('staff_number', $valid['staff_number'])
                        ->first();
        if($is_company){
            if(!$is_staff){
                // $filename= 'staff'. '-' .$valid['company_code'] . '-' . $valid['staff_number'];

                // header('Content-Type: text/csv; charset=utf-8');
                // header('Content-Disposition: attachment; filename= ' . $filename . '.csv');
                // $output = fopen("php://output", "w");
                // $fields = array('company_name', 'company_code', 'staff_number', 'deploy', 'first_name', 'last_name', 'gender', 'birth_year', 'birth_month', 'birth_day', 'email', 'password');
                // fputcsv($output, $fields);
                // $linedata = array(
                //     // $valid['company_name'],
                //     '',
                //     $valid['company_code'],
                //     $valid['staff_number'],
                //     $valid['deploy'],
                //     $valid['first_name'],
                //     $valid['last_name'],
                //     $valid['gender'],
                //     $request->birth_year,
                //     $request->birth_month,
                //     $request->birth_day,
                //     $valid['email'],
                //     $valid['password']);

                // fputcsv($output, $linedata);
                // fclose($output);
                $d = strtotime("now");
                $date = date("Y-m-d h:i:s", $d);
                Staff::create([
                        // 'company_name'      => $valid['company_name'],
                        'company_code'      => $valid['company_code'],
                        'staff_number'      => $valid['staff_number'],
                        'deploy'            => $valid['deploy'] == '' ? '' : $valid['deploy'],
                        'first_name'        => $valid['first_name'],
                        'last_name'         => $valid['last_name'],
                        'gender'            => $valid['gender'],
                        'birth_year'        => $request->birth_year,
                        'birth_month'       => $request->birth_month,
                        'birth_day'         => $request->birth_day,
                        'email'             => $valid['email'],
                        'password'          => $valid['password'],
                        'final_login_date'  => $date,
                ]);

                Health::create([
                    'company_code'          => $valid['company_code'],
                    'staff_number'          => $valid['staff_number'],
                    'height'                => $request->height == null ? '' : $request->height,
                    'weight'                => $request->weight == null ? '' :  $request->weight,
                    'blood_type'            => $request->blood_type == null ? '' : $request->blood_type,
                    'bmi'                   => $request->bmi  == null ? '' : $request->bmi,
                    'body_hole'             => $request->body_hole  == null ? '' : $request->body_hole,
                    'blood_pressure_over'   => $request->blood_pressure_over  == null ? '' : $request->blood_pressure_over,
                    'blood_pressure_down'   => $request->blood_pressure_down  == null ? '' : $request->blood_pressure_down,
                    'tp'                    => $request->tp  == null ? '' : $request->tp,
                    'alb'                   => $request->alb  == null ? '' : $request->alb,
                    'ast'                   => $request->ast  == null ? '' : $request->ast,
                    'alt'                   => $request->alt  == null ? '' : $request->alt,
                    'gtp'                   => $request->gtp  == null ? '' : $request->gtp,
                    'tc'                    => $request->tc  == null ? '' : $request->tc,
                    'hdl'                   => $request->hdl  == null ? '' : $request->hdl,
                    'ldl'                   => $request->ldl  == null ? '' : $request->ldl,
                    'tg'                    => $request->tg  == null ? '' : $request->tg,
                    'bun'                   => $request->bun  == null ? '' : $request->bun,
                    'cre'                   => $request->cre  == null ? '' : $request->cre,
                    'ua'                    => $request->ua  == null ? '' : $request->ua,
                    'glu'                   => $request->glu  == null ? '' : $request->glu,
                    'hba1c'                 => $request->hba1c  == null ? '' : $request->hba1c,
                    'sight_left'            => $request->sight_left  == null ? '' : $request->sight_left,
                    'sight_right'           => $request->sight_right  == null ? '' : $request->sight_right,

                ]);

                return redirect()->route('toAdminStaff');
            } else {
                return redirect()->route('toAdminStaffRegister')->with('error-message', '登録しようとしているスタッフ番号はすでに存在します。再試行。');
            }
        } else {
            return redirect()->route('toAdminStaffRegister')->with('error-message', 'お探しの会社は存在しません。 再試行。');
        }
    }

    // The Function to Upload Staff CSV
    public function onAdminStaffCSVUpload(Request $request){
        $fileName = $_FILES["file"]["tmp_name"];
        if ($_FILES["file"]["size"] > 0) {

            $file = fopen($fileName, "r");
            $cnt = 0;
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

                $company_name = "";
                if (isset($column[0])) {
                    $company_name = $column[0];
                }
                $company_code = "";
                if (isset($column[1])) {
                    $company_code = $column[1];
                }
                $staff_number = "";
                if (isset($column[2])) {
                    $staff_number = $column[2];
                }
                $deploy = "";
                if (isset($column[3])) {
                    $deploy = $column[3];
                }

                $first_name = "";
                if (isset($column[4])) {
                    $first_name = $column[4];
                }

                $last_name = "";
                if (isset($column[5])) {
                    $last_name = $column[5];
                }

                $gender = "";
                if (isset($column[6])) {
                    $gender = $column[6];
                }

                $birth_year = "";
                if (isset($column[7])) {
                    $birth_year = $column[7];
                }

                $birth_month = "";
                if (isset($column[8])) {
                    $birth_month = $column[8];
                }

                $birth_day = "";
                if (isset($column[9])) {
                    $birth_day = $column[9];
                }

                $email = "";
                if (isset($column[10])) {
                    $email = $column[10];
                }

                $password = "";
                if (isset($column[11])) {
                    $password = $column[11];
                }

                $d = strtotime("now");
                $date = date("Y-m-d h:i:s", $d);

                $paramArray[$cnt] = array(
                    $company_name,
                    $company_code,
                    $staff_number,
                    $deploy,
                    $first_name,
                    $last_name,
                    $gender,
                    $birth_year,
                    $birth_month,
                    $birth_day,
                    $email,
                    $password,

                );
                if($cnt != 0){
                    $data = Staff::where('staff_number', $staff_number)->first();
                    if(!$data){
                        Staff::create([
                            'company_name'      => $company_name,
                            'company_code'      => $company_code,
                            'staff_number'      => $staff_number,
                            'deploy'            => $deploy,
                            'first_name'        => $first_name,
                            'last_name'         => $last_name,
                            'gender'            => $gender,
                            'birth_year'        => $birth_year,
                            'birth_month'       => $birth_month,
                            'birth_day'         => $birth_day,
                            'email'             => $email,
                            'password'          => $password,
                            'final_login_date'  => $date,
                        ]);
                    } else {
                        return response()->json(array('error' => '登録しようとしているスタッフ番号はすでに存在します。<br>再試行。'));
                    }
                }
                $cnt++;
            }
            $result = DB::table('tbl_staff')->get();
            return response()->json(array("data" => $result));
            // return redirect()->route('toAdminStaff');
        }
    }

    // The Function to
    public function onAdmiStaffRegisterUploadCSV(Request $request){
        $fileName = $_FILES["file"]["tmp_name"];
        if ($_FILES["file"]["size"] > 0) {

            $file = fopen($fileName, "r");
            $cnt = 0;
            $nn = 0;
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

                $company_name = "";
                if (isset($column[0])) {
                    $company_name = $column[0];
                }
                $company_code = "";
                if (isset($column[1])) {
                    $company_code = $column[1];
                }
                $staff_number = "";
                if (isset($column[2])) {
                    $staff_number = $column[2];
                }
                $deploy = "";
                if (isset($column[3])) {
                    $deploy = $column[3];
                }

                $first_name = "";
                if (isset($column[4])) {
                    $first_name = $column[4];
                }

                $last_name = "";
                if (isset($column[5])) {
                    $last_name = $column[5];
                }

                $gender = "";
                if (isset($column[6])) {
                    $gender = $column[6];
                }

                $birth_year = "";
                if (isset($column[7])) {
                    $birth_year = $column[7];
                }

                $birth_month = "";
                if (isset($column[8])) {
                    $birth_month = $column[8];
                }

                $birth_day = "";
                if (isset($column[9])) {
                    $birth_day = $column[9];
                }

                $email = "";
                if (isset($column[10])) {
                    $email = $column[10];
                }

                $password = "";
                if (isset($column[11])) {
                    $password = $column[11];
                }

                $d = strtotime("now");
                $date = date("Y-m-d h:i:s", $d);

                if($cnt != 0){
                    $paramArray[$nn++] = array(
                        'company_name'  => $company_name,
                        'company_code'  =>$company_code,
                        'staff_number'  =>$staff_number,
                        'deploy'        => $deploy,
                        'first_name'    =>$first_name,
                        'last_name'     =>$last_name,
                        'gender'        =>$gender,
                        'birth_year'    => $birth_year,
                        'birth_month'   => $birth_month,
                        'birth_day'     => $birth_day,
                        'email'         => $email,
                        'password'      => $password,
                    );
                }
                $cnt++;
            }
            return response()->json(array("data" => $paramArray));
        }
    }

//////////////////// Admin Staff View ////////////////////
    // The Page to view
    public function toView(Request $request){
        $page_title = "スタッフ⼀覧ページ";

        if(isset($_SESSION['isAuthentication'])){
            //  to get company_name
            $sql = "SELECT *, (SELECT company_name FROM tbl_client WHERE company_code = A.company_code) as company_name
                    FROM tbl_staff as A
                    WHERE A.id = $request->id";
            $result = DB::select($sql);

            //  to get video history
            $videos = VideoHistory::where('staff_number', $request->id)->orderBy('date', 'DESC')->get();

            //  to get video point
            $point_sql =   "SELECT sort, sum(point) as point
                            FROM `tbl_video_history`
                            WHERE staff_number = $request->id
                            GROUP BY sort
                            ORDER BY sort DESC";
            $points = DB::select($point_sql);

            // to get health
            $health_sql = "SELECT *
                            FROM tbl_health
                            WHERE company_code = (SELECT company_code FROM tbl_staff WHERE id = $request->id)
                            AND staff_number = (SELECT staff_number FROM tbl_staff WHERE id = $request->id)";
            $health = DB::select($health_sql);

            return view('well_pedia.admin.staff.view', [
                        'page_title'    => $page_title,
                        'staff'         => $result[0],
                        'videos'        => $videos,
                        'points'        => $points,
                        'health'        => $health[0]
                    ]);
        } else {
            return redirect()->route('toAdminClient')
                    ->with('error-message', '同じ会社コードを持つものがあります。 再試行。');
        }
    }

    // The Function to Get All Staffs
    public function getStaffs(Request $request){
        $result = DB::table('tbl_staff')->get();
        for($i = 0; $i < count($result); $i++){
            $result[$i]->full_name = $result[$i]->first_name . ' ' . $result[$i]->last_name;
        }

        return json_encode(array("data" => $result));
    }

//////////////////// Admin Staff Edit ////////////////////
    // The Page to Edit
    public function toEdit(Request $request){
        $page_title = "スタッフ⼀編集";
        $result = DB::table('tbl_staff')->where('id', $request->id)->first();

        // to get video history
        $videos = VideoHistory::where('staff_number', $request->id)->get();

        // to get video points
        $point_sql =   "SELECT sort, sum(point) as point, 'date'
                        FROM `tbl_video_history`
                        WHERE staff_number = $request->id
                        GROUP BY sort
                        ORDER BY sort DESC";
        $points = DB::select($point_sql);

        // to get health
        $health_sql =   "SELECT *
                        FROM tbl_health
                        WHERE company_code = (SELECT company_code FROM tbl_staff WHERE id = $request->id)
                        AND staff_number = (SELECT staff_number FROM tbl_staff WHERE id = $request->id)";
        $health = DB::select($health_sql);

        return view('well_pedia.admin.staff.edit', [
                    'staff'      => $result,
                    'page_title' => $page_title,
                    'videos'     => $videos,
                    'points'     => $points,
                    'health'     => $health[0]
                ]);
    }

    // The Function to Edit
    public function edit(Request $request){
        // return $request->id;
        $valid = $request->validate([
                    'company_code'      => 'required|digits:8',
                    'staff_number'      => 'required|digits:8',
                    'deploy'            => 'max:50',
                    'first_name'        => 'required|alpha|max:20',
                    'last_name'         => 'required|alpha|max:20',
                    'gender'            => 'required',
                    'email'             => 'required|email|max:100',
                    'password'          => 'required|alpha_num|min:8|max:12',
                ], $this->message);

        // To check that is there such company_code
        $verify_company_code = Client::where('company_code', $valid['company_code'])->first();
        $verify_staff_number_sql = "SELECT id ".
                                "FROM (SELECT * FROM tbl_staff Where staff_number != " . $request->self_staff_number . " ) as a ".
                                "WHERE a.staff_number = " . $valid['staff_number'];
        $verify_staff_number = DB::select($verify_staff_number_sql);

        $company_code = Staff::where('id', $request->id)->first('company_code');
        $staff_number = Staff::where('id', $request->id)->first('staff_number');

        if(!$verify_company_code){
            return redirect()->route('toAdminStaff')->with('error-message', '編集しようとしている会社コードが存在しません。 リトライ。');
        } else {
            if($verify_staff_number){
                return redirect()->route('toAdminStaff')->with('error-message', '編集しようとしているスタッフ番号はすでに存在します。再試行。');
            } else {
                Health::where('company_code', $company_code['company_code'])
                        ->where('staff_number', $staff_number['staff_number'])
                        ->update([
                            'company_code'          => $valid['company_code'],
                            'staff_number'          => $valid['staff_number'],
                            'height'                => $request->height == null ? '' : $request->height,
                            'weight'                => $request->weight == null ? '' :  $request->weight,
                            'blood_type'            => $request->blood_type == null ? '' : $request->blood_type,
                            'bmi'                   => $request->bmi  == null ? '' : $request->bmi,
                            'body_hole'             => $request->body_hole  == null ? '' : $request->body_hole,
                            'blood_pressure_over'   => $request->blood_pressure_over  == null ? '' : $request->blood_pressure_over,
                            'blood_pressure_down'   => $request->blood_pressure_down  == null ? '' : $request->blood_pressure_down,
                            'tp'                    => $request->tp  == null ? '' : $request->tp,
                            'alb'                   => $request->alb  == null ? '' : $request->alb,
                            'ast'                   => $request->ast  == null ? '' : $request->ast,
                            'alt'                   => $request->alt  == null ? '' : $request->alt,
                            'gtp'                   => $request->gtp  == null ? '' : $request->gtp,
                            'tc'                    => $request->tc  == null ? '' : $request->tc,
                            'hdl'                   => $request->hdl  == null ? '' : $request->hdl,
                            'ldl'                   => $request->ldl  == null ? '' : $request->ldl,
                            'tg'                    => $request->tg  == null ? '' : $request->tg,
                            'bun'                   => $request->bun  == null ? '' : $request->bun,
                            'cre'                   => $request->cre  == null ? '' : $request->cre,
                            'ua'                    => $request->ua  == null ? '' : $request->ua,
                            'glu'                   => $request->glu  == null ? '' : $request->glu,
                            'hba1c'                 => $request->hba1c  == null ? '' : $request->hba1c,
                            'sight_left'            => $request->sight_left  == null ? '' : $request->sight_left,
                            'sight_right'           => $request->sight_right  == null ? '' : $request->sight_right,

                ]);

                $result = Staff::where('id', $request->id)->update([
                            'company_code'          => $valid['company_code'],
                            'staff_number'          => $valid['staff_number'],
                            'deploy'                => $valid['deploy'] == '' ? '' : $valid['deploy'],
                            'first_name'            => $valid['first_name'],
                            'last_name'             => $valid['last_name'],
                            'gender'                => $valid['gender'],
                            'birth_year'            => $request->birth_year,
                            'birth_month'           => $request->birth_month,
                            'birth_day'             => $request->birth_day,
                            'email'                 => $valid['email'],
                            'password'              => $valid['password'],
                ]);

                if($result){
                    return redirect()->route('toAdminStaff');
                }
            }
        }
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // User Login
    public function toUserLogin(Request $request){
        $page_title = "ログインページ";
        return view('well_pedia.user.pages.login', ['page_title' => $page_title]);
    }

    // User Logout
    public function onUserLogout(){
        session_destroy();
        return redirect()->route('toUserLogin');
    }

    // The First Page
    public function toMyPage(Request $request){
        if(isset($_SESSION['isUser'])){
            $page_title = "マイページ";
            $result = Staff::where('id', $_SESSION['userID'])->first();
            $result->full_name = $result->first_name . ' ' . $result->last_name;
            $result->birthday = $result->birth_year . '年 ' . $result->birth_month . '月 ' . $result->birth_day . '日';

            $year = date("Y");
            $month = date("m");
            $current_month = $year . '-' . $month;
            $videohistory = VideoHistory::where('staff_number', $_SESSION['userID'])
                                        ->where('date', 'LIKE',  '%'.$current_month.'%')
                                        ->get();

            foreach($videohistory as $data){
                $timestamp = strtotime($data['date']);
                $d_year = date('Y', $timestamp);
                $d_month = date('n', $timestamp);
                $d_day = date('j', $timestamp);
                $data['date'] = $d_year . '年 ' . $d_month . '月 ' . $d_day . '日';
            }

            $getPoint = "SELECT sum(point) as point FROM tbl_video_history WHERE staff_number = ". $_SESSION['userID'] ." AND `date` LIKE '%". $current_month ."%'";
            $point = DB::select($getPoint);

            $logo_url = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');

            // to get health
            $user_id = $_SESSION['userID'];
            $health_sql =   "SELECT *
                    FROM tbl_health
                    WHERE company_code = (SELECT company_code FROM tbl_staff WHERE id = $user_id )
                    AND staff_number = (SELECT staff_number FROM tbl_staff WHERE id = $user_id )";
            $health = DB::select($health_sql);

            return view('well_pedia.user.pages.mypage', [
                    'result'        => $result,
                    'videos'        => $videohistory,
                    'point'         => $point[0],
                    'logo'          => $logo_url,
                    'page_title'    => $page_title,
                    'company_name'  => $_SESSION['company_name'],
                    'health'        => $health[0]
                ]);
        } else {
            return redirect()->route('toUserLogin')->with('error-message', "最初にログインする必要があります。");
        }
    }

    // User Edit
    public function toUserEdit(Request $request){
        if(isset($_SESSION['isUser'])){
            $page_title = "ユーザー編集";
            $result = Staff::where('id', $request->id)->first();
            $result->full_name = $result->first_name . ' ' . $result->last_name;
            $result->birthday = $result->birth_year . '年 ' . $result->birth_month . '月 ' . $result->birth_day . '日';

            $logo_url = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');

            // to get health
            $user_id = $_SESSION['userID'];
            $health_sql =   "SELECT *
                    FROM tbl_health
                    WHERE company_code = (SELECT company_code FROM tbl_staff WHERE id = $user_id )
                    AND staff_number = (SELECT staff_number FROM tbl_staff WHERE id = $user_id )";
            $health = DB::select($health_sql);

            return view('well_pedia.user.pages.edit',[
                            'health'        => $health[0],
                            'result'        => $result,
                            'logo'          => $logo_url,
                            'page_title'    => $page_title,
                            'company_name'  => $_SESSION['company_name']
            ]);
        } else {
            return redirect()->route('toUserLogin')->with('error-message', "最初にログインする必要があります。");
        }
    }

    public function onUserEdit(Request $request){
        // return $request;
        $valid = $request->validate([
                'deploy'            => 'required|max:100',
                'first_name'        => 'required|max:100',
                'last_name'         => 'required|max:100',
                'gender'            => 'required|size:1',
                'birth_year'        => 'required|max:4',
                'birth_month'       => 'required|max:4',
                'birth_day'         => 'required|max:4',
                'email'             => 'required|email|max:100',
        ], $this->message);

        $result = Staff::where('id', $request->id)->update([
                'deploy'            => $valid['deploy'],
                'first_name'        => $valid['first_name'],
                'last_name'         => $valid['last_name'],
                'gender'            => $valid['gender'],
                'birth_year'        => $valid['birth_year'],
                'birth_month'       => $valid['birth_month'],
                'birth_day'         => $valid['birth_day'],
                'email'             => $valid['email'],
        ]);

        if($result){
            return redirect()->route('toMyPage');
        }

    }

    // User Password Reset
    public function toUserResetPassword(Request $request){
        $page_title = "パスワードを再設定する";
        if(isset($_SESSION['isUser'])){
            $logo = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');
            $result = Staff::where('id', $request->id)->first();
            return view('well_pedia.user.pages.password', [
                        'result'        => $result,
                        'page_title'    => $page_title,
                        'logo'          => $logo,
                        'company_name'  => $_SESSION['company_name']
                ]);
        } else {
            return redirect()->route('toUserLogin')->with('error-message', "最初にログインする必要があります。");
        }
    }

    public function onResetPassword(Request $request){
        $valid = $request->validate([
                'password'  => 'required|alpha_num|min:8|max:12',
        ], $this->message);

        $result = Staff::where('id', $request->id)->update([
            'password' => $valid['password']
        ]);

        if($result){
            return redirect()->route('toMyPage');
        }
    }

    public function toConcept(){
        if(isset($_SESSION['isUser'])){
            $page_title = "Concept & Recommendation";
            $logo = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');

            $result = Staff::where('id', $_SESSION['userID'])->first();
            $concept = Content::first();
            return view('well_pedia.user.pages.concept', [
                        'result'        => $result,
                        'concept'       => $concept,
                        'page_title'    => $page_title,
                        'logo'          => $logo,
            ]);
        } else {
            return redirect()->route('toUserLogin')->with('error-message', "最初にログインする必要があります。");
        }
    }

    // The page to play video
    public function toPlayVideo(Request $request){
        if(isset($_SESSION['isUser'])){
            $page_title = "Exercise";
            $logo = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');

            $result =   Staff::where('id', $_SESSION['userID'])->first();
            $video  =   Video::where('id', $request->id)->first();
            return view('well_pedia.user.pages.movie',
                            [
                                'result'        => $result,
                                'video'         => $video,
                                'page_title'    => $page_title,
                                'logo'          => $logo
                            ]);
        } else {
            return redirect()->route('toUserLogin')->with('error-message', "最初にログインする必要があります。");
        }
    }

    public function onRegisterVideoHistory(Request $request){
        $y = date('Y');
        $m = date('m');
        $sort = $y . '年 ' . $m . '月';
        $video  =   Video::where('id', $request->id)->first();
        $result =   VideoHistory::create([
                        'staff_number'  => $_SESSION['userID'],
                        'point'         => $video['point'],
                        'video_id'      => $request->id,
                        'video_title'   => $video['video_title'],
                        'date'          => date("Y-m-d"),
                        'sort'          => $sort
                    ]);
    }


    public function toForget(){
        $page_title = "会員ログイン";
        $logo['logo_url'] = "";
        return view('well_pedia.user.pages.forgotten', ['page_title' => $page_title]);
    }

    public function toBasicInfo(){
        $page_title = "基本情報登録";

        if(isset($_SESSION['isUser'])){
            $result = Staff::where('id', $_SESSION['userID'])->first();
            return view('well_pedia.user.pages.basic', ['result' => $result, 'page_title' => $page_title]);

        } else {
            return redirect()->route('toForget');
        }
    }

    public function onRegisterBasic(Request $request){
        $valid = $request->validate([
            'deploy'        =>  'required|max:100',
            'first_name'    =>  'required|max:100',
            'last_name'     =>  'required|max:100',
            'email'         =>  'required|email|max:100',
            'password'      =>  'required|min:8'
        ]);

        $result = Staff::where('id', $request->id)
                        ->update([
                            'deploy'        => $valid['deploy'],
                            'first_name'    => $valid['first_name'],
                            'last_name'     => $valid['last_name'],
                            'gender'        => $request->gender,
                            'birth_year'    => $request->birth_year,
                            'birth_month'   => $request->birth_month,
                            'birth_day'     => $request->birth_day,
                            'email'         => $valid['email'],
                            'password'      => $valid['password']
                        ]);
        if($result){
            return redirect()->route('toMyPage');
        }
    }

    // Menu
    public function toUserMenu(){
        if(isset($_SESSION['isUser'])){
            $page_title = "メニュー";
            $logo = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');

            $result = Staff::where('id', $_SESSION['userID'])->first();
            return view('well_pedia.user.pages.menu', ['result' => $result, 'logo' => $logo, 'page_title' => $page_title]);
        } else {
            return redirect()->route('toUserLogin')->with('error-message', "最初にログインする必要があります。");
        }
    }

    public function toExercise(){
        if(isset($_SESSION['isUser'])){
            $page_title = "メニュー";
            $logo = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');

            $result = Staff::where('id', $_SESSION['userID'])->first();
            $exercises = Video::where('genre', 1)->get();
            return view('well_pedia.user.pages.exercise',
                        [
                            'result'        => $result,
                            'exercises'     => $exercises,
                            'logo'          => $logo,
                            'page_title'    => $page_title
                        ]);
        } else {
            return redirect()->route('toUserLogin')->with('error-message', "最初にログインする必要があります。");
        }
    }

    public function toRelax(){
        if(isset($_SESSION['isUser'])){
            $page_title = "Relax";
            $logo = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');

            $result = Staff::where('id', $_SESSION['userID'])->first();
            $relaxes = Video::where('genre', 2)->get();
            return view('well_pedia.user.pages.relax',
                        [
                            'result'        => $result,
                            'relaxes'       => $relaxes,
                            'page_title'    => $page_title,
                            'logo'          => $logo
                        ]);
        } else {
            return redirect()->route('toUserLogin')->with('error-message', "最初にログインする必要があります。");
        }
    }

    public function toKarada(){
        $page_title = "KARADA SOLUTION";



        if(isset($_SESSION['isUser'])){

            $logo = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');
            $result = Staff::where('id', $_SESSION['userID'])->first();

            return view('well_pedia.user.pages.karada', [
                    'page_title' => $page_title,
                    'logo'       => $logo,
                    'result'     => $result
            ]);
        } else {
            return redirect()->route('toUserLogin')->with('error-message', "最初にログインする必要があります。");
        }
    }

    public function toKokoro(){
        $page_title = "KOKORO SOLUTION";

        if(isset($_SESSION['isUser'])){
            $logo = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');
            $result = Staff::where('id', $_SESSION['userID'])->first();
            $kokoros = Kokoro::where('public', 1)->orderBy('created_at', 'DESC')->paginate(12);

            foreach($kokoros as $item){
                $item->content = substr($item->content, 0, 20);
            }
            // return $kokoros;
            return view('well_pedia.user.pages.kokoro', [
                    'page_title'    => $page_title,
                    'logo'          => $logo,
                    'result'        => $result,
                    'kokoros'       => $kokoros
            ]);
        } else {
            return redirect()->route('toUserLogin')->with('error-message', "最初にログインする必要があります。");
        }
    }

    public function toKokoroSolution($id){
        $page_title = "KOKORO SOLUTION";

        if(isset($_SESSION['isUser'])){

            $logo = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');
            $result = Staff::where('id', $_SESSION['userID'])->first();
            $kokoro = Kokoro::where('id', $id)->first();
            return view('well_pedia.user.pages.kokoro_solution', [
                    'page_title' => $page_title,
                    'logo'       => $logo,
                    'result'     => $result,
                    'kokoro'     => $kokoro,
            ]);
        } else {
            return redirect()->route('toUserLogin')->with('error-message', "最初にログインする必要があります。");
        }
    }

    public function toOnline(){
        $page_title = "オンライン診療";

        if(isset($_SESSION['isUser'])){

            $logo = Client::where('company_code', $_SESSION['company_code'])->first('logo_url');
            $result = Staff::where('id', $_SESSION['userID'])->first();

            return view('well_pedia.user.pages.online', [
                    'page_title' => $page_title,
                    'logo'       => $logo,
                    'result'     => $result
            ]);
        } else {
            return redirect()->route('toUserLogin')->with('error-message', "最初にログインする必要があります。");
        }
    }
}

