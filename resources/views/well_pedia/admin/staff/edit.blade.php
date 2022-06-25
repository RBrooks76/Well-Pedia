@extends('well_pedia.admin.layout.basic_layout')
@section('content')
    @include('well_pedia.admin.layout.after_login.navbar')

    <main>
        <section>
            <div class="csv_content_wrapper">
                <div class="section_container container_left_helper container_right_helper">
                    <div class="section_title section_title_sub  title_padding ">
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
                                <button class="btn_primary min_sizer" onclick="onAdmiStaffRegisterUploadCSV()">
                                    インポートを実行する
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub section_title_mb title_padding title_border_bottom">
                    <h3 class="text_primary title_mb text_primary">
                        基本情報登録
                    </h3>
                </div>
            </div>
        </section>

        <form action="{{ route('staffEdit') }}" method="POST" class="">
            @csrf
            <input type="hidden" name="id" value="{{ $staff->id }}">
            <input type="hidden" name="self_staff_number" value="{{ $staff->staff_number}}">
            <div class="section_container container_left_helper container_right_helper">
                <div>
                    <div class="form_container mb-2 table-responsive  pb-1 ">
                        <table class="table form_table">
                            <tbody>
                                {{-- <tr>
                                    <td class="font-weight-bold">
                                        企業名 <span class="text_red ms-4"> ※ </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="company_name" value="{{ $staff->company_name }}" style="{{ $errors->has('company_name') ? 'border : 1px solid #D9214E!important; color:#D9214E!important' : '' }}">
                                        </div>
                                        @if($errors->has('company_name'))
                                            <span class="error">{{ $errors->first('company_name') }}</span>
                                        @endif
                                    </td>
                                </tr> --}}
                                <tr>
                                    <td class="font-weight-bold">
                                        企業コード <span class="text_red ms-4"> ※ </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="company_code"  id="company_code" value="{{ $staff->company_code }}" style="{{ $errors->has('company_code') ? 'border : 1px solid #D9214E!important; color:#D9214E!important' : '' }}">
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
                                            <input type="text" class="form-control" name="staff_number" id="staff_number" value="{{ $staff->staff_number }}"  style="{{ $errors->has('staff_number') ? 'border : 1px solid #D9214E!important; color:#D9214E!important' : '' }}">
                                        </div>
                                        @if($errors->has('staff_number'))
                                            <span class="error">{{ $errors->first('staff_number') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">
                                        部署
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="deploy" id="deploy" value="{{ $staff->deploy }}" style="{{ $errors->has('deploy') ? 'border : 1px solid #D9214E!important; color:#D9214E!important' : '' }}">
                                        </div>
                                        @if($errors->has('deploy'))
                                            <span class="error">{{ $errors->first('deploy') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">
                                        氏名
                                    </td>
                                    <td>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $staff->first_name }}" style="{{ $errors->has('first_name') ? 'border : 1px solid #D9214E!important; color:#D9214E!important' : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $staff->last_name }}" style="{{ $errors->has('last_name') ? 'border : 1px solid #D9214E!important; color:#D9214E!important' : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        @if($errors->has('first_name'))
                                            <span class="error">{{ $errors->first('first_name') }}</span>
                                        @endif
                                        @if($errors->has('last_name'))
                                            <span class="error">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">
                                        性別
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center" id="myForm">
                                            <div
                                                class="form-group me-3 d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" name="gender" id="form_checkbox1" class="" value="1">
                                                <label for="form_checkbox1" class="ms-2">男</label>
                                            </div>

                                            <div class="form-group d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" name="gender" id="form_checkbox2" class="" value="0">
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
                                                    <select name="birth_year" id="birth_year" class="form-control" onclick="changeYear()">

                                                    </select>
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
                                                    <select name="birth_month" id="birth_month" class="form-control" onclick="changeMonth()">
                                                    </select>
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
                                                    <select name="birth_day" id="birth_day" class="form-control">

                                                    </select>
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
                                        <span class="text_red ms-4">※</span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="email" id="email" value="{{ $staff->email }}" style="{{ $errors->has('email') ? 'border : 1px solid #D9214E!important; color:#D9214E!important' : '' }}">
                                        </div>
                                        @if($errors->has('email'))
                                            <span class="error">{{ $errors->first('email') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        パスワード
                                        <span class="text_red ms-4">※</span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="password" id="password" value="{{ $staff->password }}" style="{{ $errors->has('password') ? 'border : 1px solid #D9214E!important; color:#D9214E!important' : '' }}">
                                        </div>
                                        @if($errors->has('password'))
                                            <span class="error">{{ $errors->first('password') }}</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub section_title_mb  title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class=" text_primary">
                            健康ステータス情報編集
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
                                            <input type="text" class="table_input_control" name="height" value="{{ $health->height }}">
                                        </td>
                                        <td>
                                            体重
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="weight" value="{{ $health->weight }}">
                                        </td>
                                        <td>
                                            血液型
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="blood_type" value="{{ $health->blood_type }}">
                                        </td>
                                        <td>
                                            BMI
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="bmi" value="{{ $health->bmi }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            腹囲
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="body_hole" value="{{ $health->body_hole }}">
                                        </td>
                                        <td>
                                            ⾎圧値・上
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="blood_pressure_over" value="{{ $health->blood_pressure_over }}">
                                        </td>
                                        <td>
                                            ⾎圧値・下
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="blood_pressure_down" value="{{ $health->blood_pressure_down }}">
                                        </td>
                                        <td>
                                            総タンパク(TP)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="tp" value="{{ $health->tp }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            アルブミン(ALB)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="alb" value="{{ $health->alb }}">
                                        </td>
                                        <td>
                                            AST(GOT)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="ast" value="{{ $health->ast }}">
                                        </td>
                                        <td>
                                            ALT(GPT)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="alt" value="{{ $health->alt }}">
                                        </td>
                                        <td>
                                            γ-GT(γ-GTP)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="gtp" value="{{ $health->gtp }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            総コレステロール(TC)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="tc" value="{{ $health->tc }}">
                                        </td>
                                        <td>
                                            HDL-コレステロール
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="hdl" value="{{ $health->hdl }}">
                                        </td>
                                        <td>
                                            LDL-コレステロール
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="ldl" value="{{ $health->ldl }}">
                                        </td>
                                        <td>
                                            中性脂肪(TG)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="tg" value="{{ $health->tg }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            尿素窒素(BUN)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="bun" value="{{ $health->bun }}">
                                        </td>
                                        <td>
                                            クレアチニン(CRE)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="cre" value="{{ $health->cre }}">
                                        </td>
                                        <td>
                                            尿酸(UA)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="ua" value="{{ $health->ua }}">
                                        </td>
                                        <td>
                                            血糖(GLU)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="glu" value="{{ $health->glu }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ヘモグロビンA1c(HbA1c)
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="hba1c" value="{{ $health->hba1c }}">
                                        </td>
                                        <td>
                                            視力（左）
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="sight_left" value="{{ $health->sight_left }}">
                                        </td>
                                        <td>
                                            視力（右）
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="sight_right" value="{{ $health->sight_right }}">
                                        </td>
                                        <td>
                                            視力（右）
                                        </td>
                                        <td>
                                            <input type="text" class="table_input_control" name="" value="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form_control_action text-center">
                            <button class="btn_dark btn_green btn_mt border-0" type="submit">
                                更新する
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="content_list_wrapper ">
                    <h2 class="heading_title">
                        動画閲覧履歴
                    </h2>
                    <ul class="list-unstyled content_list">
                        @if(count($videos) <= 5)
                            @for($i = 0; $i < count($videos); $i++)
                                <li id="id{{ $videos[$i]->id }}">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="box">
                                            <h4>
                                                <b>{{ $videos[$i]->video_title }}</b>
                                            </h4>
                                            <div class="list_foot d-flex align-items-center">
                                                <span>閲覧日： {{ $videos[$i]->date }}</span>
                                                <a href="#" class="text_f7">CATEGORY</a>
                                            </div>
                                        </div>
                                        <div class="box">
                                            <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf"onclick="onDeleteVideoHistory({{ $videos[$i]->id }})">
                                                ×削除する
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            @endfor
                        @endif
                        @if(count($videos) > 5)
                            @for($i = 0; $i < 5; $i++)
                                <li id="id{{ $videos[$i]->id }}">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="box">
                                            <h4>
                                                <b>{{ $videos[$i]->video_title }}</b>
                                            </h4>
                                            <div class="list_foot d-flex align-items-center">
                                                <span>閲覧日： {{ $videos[$i]->date }}</span>
                                                <a href="#" class="text_f7">CATEGORY</a>
                                            </div>
                                        </div>
                                        <div class="box">
                                            <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf"onclick="onDeleteVideoHistory({{ $videos[$i]->id }})">
                                                ×削除する
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            @endfor
                            <div id="readme" class="collapse">
                                @for($i = 5; $i < count($videos); $i++)
                                    <li id="id{{ $videos[$i]->id }}">
                                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                                            <div class="box">
                                                <h4>
                                                    <b>{{ $videos[$i]->video_title }}</b>
                                                </h4>
                                                <div class="list_foot d-flex align-items-center">
                                                    <span>閲覧日： {{ $videos[$i]->date }}</span>
                                                    <a href="#" class="text_f7">CATEGORY</a>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf" onclick="onDeleteVideoHistory({{ $videos[$i]->id }})">
                                                    ×削除する
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                @endfor
                            </div>
                        @endif
                    </ul>
                </div>
                @if(count($videos) > 5)
                    <div class="btn_action text-center">
                        <button class="btn_action_more btn_mt btn_mb" type="button" data-mdb-toggle="collapse" data-mdb-target="#readme">
                            READ MORE
                        </button>
                    </div>
                @endif
                </div>
            </div>
        </section>

        <section>
            <div class="section_container container_left_helper container_right_helper mt-100">
                <div class="content_list_wrapper">
                    <h2 class="heading_title">
                        ポイント履歴
                    </h2>
                </div>
                <div class="section_body two_col_table_static_wrapper">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @foreach($points as $point)
                                    {{-- <tr id="id{{ $video->id }}">
                                        <td>
                                            {{ $video->date }}
                                        </td>
                                        <td class="text-center">
                                            {{ $video->point }}/100
                                        </td>
                                        <td class="text-end">
                                            <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf"onclick="onDeleteVideoHistory({{ $video->id }})">
                                                ×削除する
                                            </button>
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <td>
                                            {{ $point->date }}
                                        </td>
                                        <td class="text-center">
                                            {{ $point->point }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- <div class="form_control_action text-center">
                        <button class="btn_dark content_mb btn_green mt-3 mt-md-5 border-0">
                            更新する
                        </button>
                    </div> --}}
                </div>
            </div>
        </section>
    </main>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function YMD(p_year, p_month, p_day){
            var d = new Date();

            var date = d.getDate();
            var month = d.getMonth() + 1; // Since getMonth() returns month from 0-11 not 1-12
            var year = d.getFullYear();

            var html_year = "";
            var html_month = "";
            var html_day = "";

            for (var i = year; i > 1960; i--) {
                if (i == p_year) {
                    html_year += "<option value='" + i + "' selected>" + i + "</option>";
                } else {
                    html_year += "<option value='" + i + "'>" + i + "</option>";
                }
            }

            $('#birth_year').html(html_year);

            for (var i = 1; i <= 12; i++) {
                if (i == p_month) {
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
                if (i == p_day) {
                    html_day += "<option value='" + i + "'selected>" + (i < 10 ? "0" + i : i) + "</option>";
                } else {
                    html_day += "<option value='" + i + "'>" + (i < 10 ? "0" + i : i) + "</option>";
                }
            }
            $('#birth_day').html(html_day);
        }

        $(document).ready(function() {
            $('#myForm').find("input[value='{{ $staff->gender }}']").prop('checked', true);
            YMD("{{ $staff->birth_year }}", "{{ $staff->birth_month }}", "{{ $staff->birth_day }}");
        })


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

        function onDeleteVideoHistory(id){
            $.confirm({
                title: '確認!',
                content: '本当に削除しますか？',
                buttons: {
                    確認: {
                        text: '確認',
                        btnClass: 'btn-blue',
                        action: function(){
                            $.ajax({
                                url: "{{ route('onDeleteVideoHistory') }}",
                                type: 'POST',
                                data: {
                                    id: id
                                },
                                success: function(result) {
                                    $("li[id='id" + id + "']").hide(true);
                                    $("tr[id='id" + id + "']").hide(true);
                                    toastr.success("削除成功!");
                                }
                            })
                        }
                    },
                    キャンセル: function () {
                    },
                }
            });
        }

        function onAdmiStaffRegisterUploadCSV() {
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            var files = $('#file')[0].files;
            if (files.length > 0) {
                var fd = new FormData();

                // Append data
                fd.append('file', files[0]);
                fd.append('_token', CSRF_TOKEN);

                // AJAX request
                $.ajax({
                    url: "{{ route('onAdmiStaffRegisterUploadCSV') }}",
                    method: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(result) {
                        console.log(result);
                        $('#company_name').val(result['data'][0]['company_name']);
                        $('#company_code').val(result['data'][0]['company_code']);
                        $('#staff_number').val(result['data'][0]['staff_number']);
                        $('#deploy').val(result['data'][0]['deploy']);
                        $('#first_name').val(result['data'][0]['first_name']);
                        $('#last_name').val(result['data'][0]['last_name']);
                        $('#myForm').find("input[value='" + result['data'][0]['gender'] + "']").prop('checked', true);

                        $('#email').val(result['data'][0]['email']);
                        $('#password').val(result['data'][0]['password']);

                        YMD(result['data'][0]['birth_year'], result['data'][0]['birth_month'], result['data'][0]['birth_day']);
                    }
                });
            }
        }
    </script>

    @include('well_pedia.admin.layout.after_login.footer')
@endsection('content')
