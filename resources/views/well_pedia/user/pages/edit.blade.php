@extends('well_pedia.user.layout.user_layout')
@section('content')
    @include('well_pedia.user.layout.after-login.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub section_title_mb title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary title_mb text_primary">
                            基本情報編集
                        </h3>
                    </div>
                </div>
                <form action="{{ route('onUserEdit') }}" method="post" class="">
                    @csrf
                    <input type="hidden" name="id" value="{{ $result->id }}">
                    <div class="form_container mb_lg table-responsive  pb-1">
                        <table class="table form_table">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        企業コード
                                    </td>
                                    <td>
                                        {{ $result->company_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        社員番号
                                    </td>
                                    <td>
                                        {{ $result->staff_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        部署
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="deploy" value="{{ $result->deploy }}" style="{{ $errors->has('deploy') ? 'border : 1px solid #D9214E!important' : '' }}">
                                        </div>
                                        <div class="w-400">
                                            @if($errors->has('deploy'))
                                                <span class="error">{{ $errors->first('deploy') }}</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        氏名
                                    </td>
                                    <td>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" placeholder="姓" class="form-control" value="{{ $result->first_name }}" name="first_name" style="{{ $errors->has('first_name') ? 'border : 1px solid #D9214E!important' : '' }}">
                                                    @if($errors->has('first_name'))
                                                        <span class="error">{{ $errors->first('first_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" placeholder="名" class="form-control" value="{{ $result->last_name }}" name="last_name" style="{{ $errors->has('last_name') ? 'border : 1px solid #D9214E!important' : '' }}">
                                                    @if($errors->has('last_name'))
                                                        <span class="error">{{ $errors->first('last_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        性別
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center" id="gender">
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
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        生年月日
                                    </td>
                                    <td>
                                        <div class="row g-1 g-sm-2">
                                            <div class="col-4">
                                                <div class="form-group position-relative">
                                                    <select name="birth_year" class="form-control" id="birth_year" onchange="changeYear()">

                                                    </select>
                                                    <svg class="select_icon position-absolute"
                                                        style="top: 50%; transform: translateY(-50%); right: .8rem"
                                                        xmlns="http://www.w3.org/2000/svg" width="8.781" height="6.12"
                                                        viewBox="0 0 8.781 6.12">
                                                        <path id="Path_137" data-name="Path 137"
                                                            d="M7219.936,610.665l4.155,5,3.845-5"
                                                            transform="translate(-7219.551 -610.345)" fill="none"
                                                            stroke="#0d0101" stroke-width="1" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group position-relative">
                                                    <select name="birth_month" class="form-control" id="birth_month" onchange="changeMonth()">

                                                    </select>
                                                    <svg class="select_icon position-absolute"
                                                        style="top: 50%; transform: translateY(-50%); right: .8rem"
                                                        xmlns="http://www.w3.org/2000/svg" width="8.781" height="6.12"
                                                        viewBox="0 0 8.781 6.12">
                                                        <path id="Path_137" data-name="Path 137"
                                                            d="M7219.936,610.665l4.155,5,3.845-5"
                                                            transform="translate(-7219.551 -610.345)" fill="none"
                                                            stroke="#0d0101" stroke-width="1" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group position-relative">
                                                    <select name="birth_day" class="form-control" id="birth_day" onchange="changeDay()">

                                                    </select>
                                                    <svg class="select_icon position-absolute"
                                                        style="top: 50%; transform: translateY(-50%); right: .8rem"
                                                        xmlns="http://www.w3.org/2000/svg" width="8.781" height="6.12"
                                                        viewBox="0 0 8.781 6.12">
                                                        <path id="Path_137" data-name="Path 137"
                                                            d="M7219.936,610.665l4.155,5,3.845-5"
                                                            transform="translate(-7219.551 -610.345)" fill="none"
                                                            stroke="#0d0101" stroke-width="1" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        メールアドレス
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" value="{{ $result->email }}" name="email" style="{{ $errors->has('email') ? 'border : 1px solid #D9214E!important' : '' }}">
                                            @if($errors->has('email'))
                                                <span class="error">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        パスワード
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="d-flex align-items-center">
                                            {{ $result->password }}
                                            <a href="{{ route('toUserResetPassword'). '?id=' . $result->id }}" class="text_f7 font_14 ms-1 ms-sm-5 sm_less reset-password">
                                                →パスワードを変更する
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form_control_action text-center">
                            <button class="btn_dark btn_green btn_mt shadow-0 border-0" type="submit">
                                更新する
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section>
            <div class="section_container container_left_helper container_right_helper">

                <div class="section_title section_title_sub section_title_mb title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary title_mb text_primary">
                            健康ステータス情報
                        </h3>
                    </div>
                </div>

                <div class="section_body">
                    <div class="section_table_wrapper" style="background-color: white!important">
                        {{-- <h2 class="table_overlap">
                            管理者登録 <br>
                            ※ユーザー変更不可
                        </h2> --}}
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            身長
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->height }}
                                        </td>
                                        <td>
                                            体重
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->weight }}
                                        </td>
                                        <td>
                                            血液型
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->blood_type }}
                                        </td>
                                        <td>
                                            BMI
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->bmi }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            腹囲
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->body_hole }}
                                        </td>
                                        <td>
                                            ⾎圧値・上
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->blood_pressure_over }}
                                        </td>
                                        <td>
                                            ⾎圧値・下
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->blood_pressure_down }}
                                        </td>
                                        <td>
                                            総タンパク(TP)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->tp }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            アルブミン(ALB)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->alb }}
                                        </td>
                                        <td>
                                            AST(GOT)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->ast }}
                                        </td>
                                        <td>
                                            ALT(GPT)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->alt }}
                                        </td>
                                        <td>
                                            γ-GT(γ-GTP)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->gtp }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            総コレステロール(TC)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->tc }}
                                        </td>
                                        <td>
                                            HDL-コレステロール
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->hdl }}
                                        </td>
                                        <td>
                                            LDL-コレステロール
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->ldl }}
                                        </td>
                                        <td>
                                            中性脂肪(TG)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->tg }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            尿素窒素(BUN)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->bun }}
                                        </td>
                                        <td>
                                            クレアチニン(CRE)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->cre }}
                                        </td>
                                        <td>
                                            尿酸(UA)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->ua }}
                                        </td>
                                        <td>
                                            血糖(GLU)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->glu }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ヘモグロビンA1c(HbA1c)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->hba1c }}
                                        </td>
                                        <td>
                                            視力（左）
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->sight_left }}
                                        </td>
                                        <td>
                                            視力（右）
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->sight_right }}
                                        </td>
                                        <td>
                                            視力（右）
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('well_pedia.user.layout.after-login.footer')
    <script>
        $(document).ready(function() {
            $('#gender').find("input[value='{{ $result->gender }}']").prop('checked', true);
            var d = new Date();

            var date = d.getDate();
            var month = d.getMonth() + 1; // Since getMonth() returns month from 0-11 not 1-12
            var year = d.getFullYear();

            var html_year = "";
            var html_month = "";
            var html_day = "";

            for (var i = parseInt(year); i > 1960; i--) {
                if(i == "{{ $result->birth_year }}"){
                    html_year += "<option value='" + i + "' selected>" + i + "</option>";
                } else {
                    html_year += "<option value='" + i + "'>" + i + "</option>";
                }
            }
            $('#birth_year').html(html_year);

            for (var i = 1; i <= 12; i++) {
                if (i == "{{ $result->birth_month }}") {
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
                if (i == "{{ $result->birth_day }}") {
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
    </script>
@endsection('content')
