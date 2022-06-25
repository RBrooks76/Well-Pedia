@extends('well_pedia.client.layout.client_layout')
@section('content')
    @include('well_pedia.client.layout.after.navbar')

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
                                    <label for="csv_input_upload" class="w-100 h-100">ファイルを選択</label>
                                </button>
                                <input onchange="csvUploaderFunc(this)" class="d-none" type="file"
                                    name="csv_input_upload" accept=".csv" id="csv_input_upload">
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
                                    <div></div>
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
                                <button class="btn_primary min_sizer">
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

        <form class="" action="{{ route('onClientStaffEdit') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $staff->id }}">
            <section>
                <div class="section_container container_left_helper container_right_helper">
                    <div class="form_container mb-2 table-responsive  pb-1 ">
                        <table class="table form_table">
                            <tbody>
                                {{-- <tr>
                                    <td class="font-weight-bold">
                                        企業名 <span class="text_red ms-4"> ※ </span>
                                    </td>
                                    <td>
                                        {{ $staff->company_name }}
                                    </td>
                                </tr> --}}
                                <tr>
                                    <td class="font-weight-bold">
                                        企業コード
                                        {{-- <span class="text_red ms-4"> ※ </span> --}}
                                    </td>
                                    <td>
                                        {{ $staff->company_code }}
                                        <input  type="hidden" class="form-control hidden" name="company_code" value = "{{ $staff->company_code }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">
                                        社員番号
                                        <span class="text_red ms-4"> ※ </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="staff_number" value="{{ $staff->staff_number }}">
                                        </div>
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td class="font-weight-bold">
                                        電話番号
                                        <span class="text_red ms-4"> ※ </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="phone_number" value="{{  $staff->phone_number }}">
                                        </div>
                                    </td>
                                </tr> --}}
                                <tr>
                                    <td class="font-weight-bold">
                                        部署
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="deploy" value="{{ $staff->deploy }}">
                                        </div>
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
                                                    <input type="text" class="form-control" name="first_name" value="{{ $staff->first_name }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" class="form-control" name="last_name" value="{{ $staff->last_name }}">
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
                                        <div class="d-flex align-items-center" id="myForm">
                                            <div
                                                class="form-group me-3 d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" checked="" name="gender" id="form_checkbox1" value="1">
                                                <label for="form_checkbox1" class="ms-2">男</label>
                                            </div>

                                            <div class="form-group d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" name="gender" id="form_checkbox2" value="0">
                                                <label for="form_checkbox2" class="ms-2">女</label>
                                            </div>
                                        </div>
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
                                        <span class="text_red ms-4"> ※ </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="email" value="{{ $staff->email }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        パスワード
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="d-flex align-items-center">
                                            {{ $staff->password }}
                                            <input  type="hidden" class="form-control" name="password" value = "{{ $staff->password }}"/>
                                            <a href="{{ route('toClientStaffResetPassword', 'id='.$staff->id) }}" class="text_f7 font_14 ms-1 ms-sm-5 sm_less reset-password">
                                                →パスワードを変更する
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <section>
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
                                <button class="btn_dark btn_green btn_mt border-0" button="submit">
                                    更新する
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>

        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="content_list_wrapper ">
                    <h2 class="heading_title">
                        動画閲覧履歴
                    </h2>
                    <ul class="list-unstyled content_list">
                        @if(count($videos) < 7)
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
                        @if(count($videos) >= 7)
                            @for($i = 0; $i < count($videos) - 5; $i++)
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
                                @for($i = count($videos) - 5; $i < count($videos); $i++)
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
                @if(count($videos) >= 7)
                    <div class="btn_action text-center">
                        <button class="btn_action_more btn_mt btn_mb" type="button" data-mdb-toggle="collapse" data-mdb-target="#readme">
                            READ MORE
                        </button>
                    </div>
                @endif

                {{-- <div class="form_control_action text-center">
                    <button class="btn_dark content_mb btn_green btn_mt border-0">
                        更新する
                    </button>
                </div> --}}
            </div>
        </section>





    </main>

    @include('well_pedia.client.layout.after.footer')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#gender').find("input[value='{{ $staff->gender }}']").prop('checked', true);
            var d = new Date();

            var date = d.getDate();
            var month = d.getMonth() + 1; // Since getMonth() returns month from 0-11 not 1-12
            var year = d.getFullYear();

            var html_year = "";
            var html_month = "";
            var html_day = "";

            for (var i = parseInt(year); i > 1960; i--) {
                if(i == "{{ $staff->birth_year }}"){
                    html_year += "<option value='" + i + "' selected>" + i + "</option>";
                } else {
                    html_year += "<option value='" + i + "'>" + i + "</option>";
                }
            }
            $('#birth_year').html(html_year);

            for (var i = 1; i <= 12; i++) {
                if (i == "{{ $staff->birth_month }}") {
                    html_month += "<option value='" + i + "' selected>" + (i < 10 ? "0" + i : i) + "</option>";
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
                if (i == "{{ $staff->birth_day }}") {
                    html_day += "<option value='" + i + "' selected>" + (i < 10 ? "0" + i : i) + "</option>";
                } else {
                    html_day += "<option value='" + i + "'>" + (i < 10 ? "0" + i : i) + "</option>";
                }
            }
            $('#birth_day').html(html_day);

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
    </script>
@endsection('content')
