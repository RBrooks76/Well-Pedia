@extends('well_pedia.admin.layout.basic_layout')
@section('content')
    @include('well_pedia.admin.layout.after_login.navbar')

    <main>
        {{-- <section>
            <div class="csv_content_wrapper">
                <div class="section_container container_left_helper container_right_helper">
                    <div class="section_title section_title_sub title_sub_140  title_padding ">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0">
                                CSVインポート
                            </h3>
                        </div>
                    </div>
                    <div class="section_body">
                        <div class="csv_upload_wrapper d-flex align-items-center flex-wrap">
                            <h5 class="default_16 family_yugothib">
                                CSVファイル
                            </h5>
                            <div class="uploader">
                                <button class="csv_uploader_btn">
                                    <label for="file" class="w-100 h-100">ファイルを選択</label>
                                </button>
                                <input onchange="csvUploaderFunc(this)" class="d-none" type="file"
                                    name="file" accept=".csv" id="file">
                            </div>
                            <h5 class="csv_uploader_output">
                                Sample.csv（ファイル名）
                            </h5>
                            <script>
                                function csvUploaderFunc(val) {
                                    document.querySelector('.csv_uploader_output').innerHTML = val.value;
                                }
                            </script>
                        </div>
                        <div class="csv_content_wrapper">
                            <div class="content_title">
                                <h3 class="size_2 mb-0">
                                    CSVデータを指定したカテゴリーにインポートまたは上書きします。
                                </h3>
                            </div>
                            <div class="content_body">
                                <ul class="list-unstyled">
                                    <li>
                                        ・CSV形式のファイル（カンマ区切りデータ）をエントリーと、エントリーのカスタムフィールドに変換してインポートします。
                                    </li>
                                    <li>
                                        ・CSVファイルに、カスタムフィールドの情報のみが含まれる場合は、エントリー情報は自動で作成されます。
                                    </li>
                                    <li>
                                        ・CSVにidをしているすことで既存のエントリーに上書きすることができます。
                                    </li>
                                </ul>
                            </div>
                            <div class="content_footer">
                                <button class="btn_primary min_sizer" onclick="onDownload()">
                                    インポートを実行する
                                </button>
                                <a href="javascript:void(0)" id="dlbtn" style="display: none;">
                                    <button type="button" id="mine">Export</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub section_title_mb title_padding title_border_bottom">
                    <h3 class="text_primary title_mb text_primary">
                        基本情報登録
                    </h3>
                </div>
                @if(Session::has('error-message'))
                    <div class="alert alert-danger text-center">
                        <b>{{ Session::get('error-message') }}</b>
                    </div>
                @endif
            </div>
        </section>
        <form action="{{ route('onStaffRegister') }}" method="post" class="">
            @csrf
            <div class="section_container container_left_helper container_right_helper">
                <div class="form_container mb-2 table-responsive  pb-1 ">
                    <table class="table form_table">
                        <tbody>
                            {{--
                            <tr>
                                <td class="font-weight-bold">
                                    企業名 <span class="text_red ms-4"> ※ </span>
                                </td>
                                <td>
                                    <div class="form-group w_200">
                                        <input type="text"  id="company_name" class="form-control" name="company_name" value="{{ old('company_name') }}" style="{{ $errors->has('company_name') ? 'border : 1px solid #D9214E!important' : '' }}">
                                    </div>
                                    @if($errors->has('company_name'))
                                        <span class="error">{{ $errors->first('company_name') }}</span>
                                    @endif
                                </td>
                            </tr>
                             --}}
                            <tr>
                                <td class="font-weight-bold">
                                    企業コード <span class="text_red ms-4"> ※ </span>
                                </td>
                                <td>
                                    <div class="form-group w_200">
                                        <input type="text" class="form-control" name="company_code" value="{{ old('company_code') }}" id="company_code" style="{{ $errors->has('company_code') ? 'border : 1px solid #D9214E!important' : '' }}">
                                    </div>
                                    @if($errors->has('company_code'))
                                        <span class="error">{{ $errors->first('company_code') }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">
                                    社員番号 <span class="text_red ms-4"> ※ </span>
                                </td>
                                <td>
                                    <div class="form-group w_200">
                                        <input type="text" class="form-control" name="staff_number" value="{{ old('staff_number') }}" id="staff_number" style="{{ $errors->has('staff_number') ? 'border : 1px solid #D9214E!important' : '' }}">
                                    </div>
                                    <div class="w-400" style="{{ $errors->has('staff_number') ? 'color:#D9214E!important' : '' }}">社員番号は8桁である必要があります。</div>
                                    {{--
                                        @if($errors->has('staff_number'))
                                            <span class="error">{{ $errors->first('staff_number') }}</span>
                                        @endif
                                    --}}
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">
                                    部署
                                    {{-- <span class="text_red ms-4"> ※ </span> --}}
                                </td>
                                <td>
                                    <div class="form-group w_200">
                                        <input type="text" class="form-control" name="deploy" value="{{ old('deploy') }}" id="deploy" style="{{ $errors->has('deploy') ? 'border : 1px solid #D9214E!important' : '' }}">
                                    </div>
                                    @if($errors->has('deploy'))
                                        <span class="error">{{ $errors->first('deploy') }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">
                                    氏名
                                    <span class="text_red ms-4"> ※ </span>
                                </td>
                                <td>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <div class="form-group w-100">
                                                <input type="text" placeholder="姓" class="form-control" name="first_name" value="{{ old('first_name') }}" id="first_name" style="{{ $errors->has('first_name') ? 'border : 1px solid #D9214E!important' : '' }}">
                                                @if($errors->has('first_name'))
                                                    <span class="error">{{ $errors->first('first_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group w-100">
                                                <input type="text" placeholder="名" class="form-control" name="last_name" value="{{ old('last_name') }}" id="last_name" style="{{ $errors->has('last_name') ? 'border : 1px solid #D9214E!important' : '' }}">
                                                @if($errors->has('last_name'))
                                                    <span class="error">{{ $errors->first('last_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">
                                    性別
                                </td>
                                <td>
                                    <div class="d-flex align-items-center" id="gender">
                                        <div
                                            class="form-group me-3 d-flex align-items-center form_checkbox_label_group">
                                            <input type="radio" name="gender" id="form_checkbox1" value="1">
                                            <label for="form_checkbox1" class="ms-2">男</label>
                                        </div>
                                        <div class="form-group d-flex align-items-center form_checkbox_label_group">
                                            <input type="radio" name="gender" id="form_checkbox2" value="0">
                                            <label for="form_checkbox2" class="ms-2">女</label>
                                        </div>
                                    </div>
                                    @if($errors->has('gender'))
                                        <span class="error">{{ $errors->first('gender') }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">
                                    生年月日
                                </td>
                                <td>
                                    <div class="row g-2">
                                        <div class="col-4">
                                            <div class="form-group position-relative">
                                                <select name="birth_year" id="birth_year" class="form-control" id="birth_year" onclick="changeYear()"></select>
                                                <svg class="select_icon position-absolute"
                                                    style="top: 50%; transform: translateY(-50%); right: .8rem"
                                                    xmlns="http://www.w3.org/2000/svg" width="8.781" height="6.12"
                                                    viewBox="0 0 8.781 6.12">
                                                    <path id="Path_137" data-name="Path 137"
                                                        d="M7219.936,610.665l4.155,5,3.845-5"
                                                        transform="translate(-7219.551 -610.345)" fill="none"
                                                        stroke="#0d0101" stroke-width="1"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group position-relative">
                                                <select name="birth_month" id="birth_month" class="form-control" id="birth_month" onclick="changeMonth()"></select>
                                                <svg class="select_icon position-absolute"
                                                    style="top: 50%; transform: translateY(-50%); right: .8rem"
                                                    xmlns="http://www.w3.org/2000/svg" width="8.781" height="6.12"
                                                    viewBox="0 0 8.781 6.12">
                                                    <path id="Path_137" data-name="Path 137"
                                                        d="M7219.936,610.665l4.155,5,3.845-5"
                                                        transform="translate(-7219.551 -610.345)" fill="none"
                                                        stroke="#0d0101" stroke-width="1"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group position-relative">
                                                <select name="birth_day" id="birth_day" class="form-control" name="birth_day"></select>
                                                <svg class="select_icon position-absolute"
                                                    style="top: 50%; transform: translateY(-50%); right: .8rem"
                                                    xmlns="http://www.w3.org/2000/svg" width="8.781" height="6.12"
                                                    viewBox="0 0 8.781 6.12">
                                                    <path id="Path_137" data-name="Path 137"
                                                        d="M7219.936,610.665l4.155,5,3.845-5"
                                                        transform="translate(-7219.551 -610.345)" fill="none"
                                                        stroke="#0d0101" stroke-width="1"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-nowrap">
                                    メールアドレス
                                    <span class="text_red ms-4"> ※ </span>
                                </td>
                                <td>
                                    <div class="form-group w_200">
                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="email" style="{{ $errors->has('email') ? 'border : 1px solid #D9214E!important' : '' }}">
                                    </div>
                                    @if($errors->has('email'))
                                        <span class="error">{{ $errors->first('email') }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-nowrap">
                                    パスワード <span class="text_red ms-4"> ※ </span>
                                </td>
                                <td>
                                    <div class="form-group w_200">
                                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password" style="{{ $errors->has('password') ? 'border : 1px solid #D9214E!important' : '' }}">
                                    </div>
                                    <div class="w-400" style="{{ $errors->has('password') ? 'color:#D9214E!important' : '' }}">パスワードは8〜12文字である必要があります。</div>
                                    {{-- @if($errors->has('password'))
                                        <span class="error">{{ $errors->first('password') }}</span>
                                    @endif --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub section_title_mb  title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class=" text_primary">
                            健康ステータス情報登録
                        </h3>
                    </div>
                </div>
                <div class="section_body">
                    <div class="section_table_wrapper" style="background: transparent">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            身長
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="height">
                                        </td>
                                        <td>
                                            体重
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="weight">
                                        </td>
                                        <td>
                                            血液型
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="blood_type">
                                        </td>
                                        <td>
                                            BMI
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="bmi">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            腹囲
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="body_hole">
                                        </td>
                                        <td>
                                            ⾎圧値・上
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="blood_pressure_over">
                                        </td>
                                        <td>
                                            ⾎圧値・下
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="blood_pressure_down">
                                        </td>
                                        <td>
                                            総タンパク(TP)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="tp">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            アルブミン(ALB)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="alb">
                                        </td>
                                        <td>
                                            AST(GOT)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="ast">
                                        </td>
                                        <td>
                                            ALT(GPT)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="alt">
                                        </td>
                                        <td>
                                            γ-GT(γ-GTP)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="gtp">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            総コレステロール(TC)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="tc">
                                        </td>
                                        <td>
                                            HDL-コレステロール
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="hdl">
                                        </td>
                                        <td>
                                            LDL-コレステロール
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="ldl">
                                        </td>
                                        <td>
                                            中性脂肪(TG)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="tg">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            尿素窒素(BUN)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="bun">
                                        </td>
                                        <td>
                                            クレアチニン(CRE)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="cre">
                                        </td>
                                        <td>
                                            尿酸(UA)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="ua">
                                        </td>
                                        <td>
                                            血糖(GLU)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="glu">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ヘモグロビンA1c(HbA1c)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="hba1c">
                                        </td>
                                        <td>
                                            視力（左）
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="sight_left">
                                        </td>
                                        <td>
                                            視力（右）
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="sight_right">
                                        </td>
                                        <td>
                                            視力（右）
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form_control_action text-center">
                            <button class="btn_dark btn_orange btn_mt border-0" type="submit">
                                更新する
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <script type="text/javascript">

        $(document).ready(function() {
            $('#gender').find("input[value='1']").prop('checked', true);

            var d = new Date();

            var date = d.getDate();
            var month = d.getMonth() + 1; // Since getMonth() returns month from 0-11 not 1-12
            var year = d.getFullYear();

            var html_year = "";
            var html_month = "";
            var html_day = "";

            for (var i = parseInt(year); i > 1960; i--) {
                html_year += "<option value='" + i + "'>" + i + "</option>";
            }

            $('#birth_year').html(html_year);

            for (var i = 1; i <= 12; i++) {
                if (i == month) {
                    html_month += "<option value='" + i + "'selected>" + (i < 10 ? "0" + i : i) + "</option>";
                } else {
                    html_month += "<option value='" + i + "'>" + (i < 10 ? "0" + i : i) + "</option>";
                }
            }
            $('#birth_month').html(html_month);

            var days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            if (year % 4 == 0) {
                days[1] = 29;
            }

            for (var i = 1; i <= days[month - 1]; i++) {
                if (i == date) {
                    html_day += "<option value='" + i + "'selected>" + (i < 10 ? "0" + i : i) + "</option>";
                } else {
                    html_day += "<option value='" + i + "'>" + (i < 10 ? "0" + i : i) + "</option>";
                }
            }
            $('#birth_day').html(html_day);

        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var miss = 0;

        function changeYear() {
            miss = $('#birth_year').val();
        }

        function changeMonth() {
            var d = new Date();

            var days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            if (miss % 4 == 0) {
                days[1] = 29;
            }
            var html_day = "";
            $('#birth_day').html('');
            for (var i = 1; i <= days[$('#birth_month').val() - 1]; i++) {
                html_day += "<option value='" + i + "'>" + (i < 10 ? "0" + i : i) + "</option>";
            }
            $('#birth_day').html(html_day);
        }

        function onAdmiStaffRegisterUploadCSV() {
            // var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            // var files = $('#file')[0].files;
            // if (files.length > 0) {
            //     var fd = new FormData();

            //     // Append data
            //     fd.append('file', files[0]);
            //     fd.append('_token', CSRF_TOKEN);

            //     // AJAX request
            //     $.ajax({
            //         url: "{{ route('onAdmiStaffRegisterUploadCSV') }}",
            //         method: 'post',
            //         data: fd,
            //         contentType: false,
            //         processData: false,
            //         dataType: 'json',
            //         success: function(result) {
            //             console.log(result);
            //             $('#company_name').val(result['data'][0]['company_name']);
            //             $('#company_code').val(result['data'][0]['company_code']);
            //             $('#staff_number').val(result['data'][0]['staff_number']);
            //             $('#deploy').val(result['data'][0]['deploy']);
            //             $('#first_name').val(result['data'][0]['first_name']);
            //             $('#last_name').val(result['data'][0]['last_name']);
            //             $('#gender').find("input[value='" + result['data'][0]['gender'] + "']").prop('checked', true);
            //             $('#birth_year').val(result['data'][0]['birth_year']);
            //             $('#birth_month').val(result['data'][0]['birth_month']);
            //             $('#birth_day').val(result['data'][0]['birth_day']);
            //             $('#email').val(result['data'][0]['email']);
            //             $('#password').val(result['data'][0]['password']);
            //         }
            //     });
            // }
        }

        function onDownload(){
            $.ajax({
                url: "{{ route('onDownloadCSV') }}",
                type : "POST",
                success:function(result){
                    console.log(result);
                    setTimeout(function() {
                        var dlbtn = document.getElementById("dlbtn");
                        var file = new Blob([result], {type: 'text/csv'});
                        dlbtn.href = URL.createObjectURL(file);

                        const d = new Date();
                        var year = d.getFullYear();
                        var month = d.getMonth() + 1 > 10 ? d.getMonth() + 1 : '0' + (d.getMonth() + 1);
                        var day = d.getDate() > 10 ? d.getDate() : '0' + d.getDate();
                        dlbtn.download = year + "-" + month + "-" + day + '.csv';
                        $( "#mine").click();
                    }, 1000);
                }
            })
        }

    </script>
    @include('well_pedia.admin.layout.after_login.footer')
@endsection('content')
