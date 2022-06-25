@extends('well_pedia.user.layout.user_layout')
@section('content')
    @include('well_pedia.user.layout.before-login.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub section_title_mb title_padding title_border_bottom">
                    <h3 class="text_primary title_mb text_primary">
                        基本情報登録
                    </h3>
                </div>
            </div>
        </section>

        <section>
            <div class="section_container container_left_helper container_right_helper">
                <form action="{{ route('onRegisterBasic') }}" method="post" class="">
                    @csrf
                    <input type="hidden" name="id" value="{{ $result->id }}">
                    <div class="form_container mb_lg table-responsive  pb-1 ">

                        <table class="table form_table">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">
                                        企業名
                                    </td>
                                    <td>
                                        {{ $result->company_name }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold">
                                        企業コード
                                    </td>
                                    <td>
                                        {{ $result->company_code }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold">
                                        社員番号
                                    </td>
                                    <td>
                                        {{ $result->staff_number }}
                                    </td>
                                </tr>


                                <tr>
                                    <td class="font-weight-bold">
                                        部署
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="deploy" value="{{ $result->deploy }}">
                                        </div>
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
                                                    <input type="text" placeholder="姓" class="form-control" name="first_name" value="{{ $result->first_name }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" placeholder="名" class="form-control" name="last_name" value="{{ $result->last_name }}">
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
                                    <td class="font-weight-bold">
                                        氏名
                                    </td>
                                    <td>
                                        <div class="row g-2">
                                            <div class="col-4">
                                                <div class="form-group position-relative">
                                                    <select name="birth_year" id="birth_year" class="form-control" onclick="changeYear()">
                                                        <option value="年">年</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
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
                                                    <select name="birth_month" id="birth_month" class="form-control" onclick="changeMonth()">
                                                        <option value="年">月</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
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
                                                    <select name="birth_day" id="birth_day" class="form-control" onclick="changeDay()">
                                                        <option value="年">日</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
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
                                        メールアドレス <span class="text_red ms-4">
                                            ※
                                        </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        パスワード <span class="text_red ms-4">
                                            ※
                                        </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="password">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form_control_action text-center">
                            <button class="btn_be_action sm_size action_mt_4" type="submit">
                                登録する
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>

    @include('well_pedia.user.layout.before-login.footer')
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
