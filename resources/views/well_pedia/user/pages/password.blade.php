@extends('well_pedia.user.layout.user_layout')
@section('content')
    @include('well_pedia.user.layout.after-login.navbar')

    <section>
        <div class="section_container container_left_helper container_right_helper">
            <div class="section_title section_title_sub section_title_mb mb_sm  title_padding title_border_bottom">
                <div class="d-flex align-items-center justify-content-between align-items-center">
                    <h3 class="text_primary title_mb text_primary">
                        基本情報
                    </h3>

                    <a href="{{ route('toUserEdit') . '?id=' . $result->id }}" class="btn_dark">変更する</a>
                </div>
            </div>
            <form action="{{ route('onResetPassword') }}" method="post" class="">
                @csrf
                <input type="hidden" value="{{ $result->id }}" name="id">
                <div class="form_container mb_lg table-responsive  pb-1">
                    <table class="table form_table">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold text-nowrap">
                                    企業名
                                </td>
                                <td>
                                    {{ $company_name }}
                                </td>
                            </tr>
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
                                    {{ $result->deploy }}
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-nowrap">
                                    氏名
                                </td>
                                <td>
                                    {{ $result->first_name . ' ' . $result->last_name }}
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
                                            <input type="radio" name="gender" id="form_checkbox1" value='1'
                                                class="">
                                            <label for="form_checkbox1" class="ms-2">男</label>
                                        </div>

                                        <div class="form-group d-flex align-items-center form_checkbox_label_group">
                                            <input type="radio" name="gender" id="form_checkbox2" value="0"
                                                class="">
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
                                    {{ $result->birth_year . '年 ' . $result->birth_month . '月 ' . $result->birth_day . '日' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-nowrap">
                                    メールアドレス
                                </td>
                                <td>
                                    {{ $result->email }}
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-nowrap">
                                    パスワード
                                </td>
                                <td class="text-nowrap">
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" value="{{ $result->password }}" name="password" style="{{ $errors->has('password') ? 'border : 1px solid #D9214E!important' : '' }}">
                                        </div>
                                        <div class="w-400" style="{{ $errors->has('password') ? 'color:#D9214E!important' : '' }}">パスワードは8〜12文字である必要があります。</div>
                                        {{-- <a href="" class="text_f7 font_14 ms-5">→パスワードを変更する</a> --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form_control_action text-center">
                        <button class="btn_be_action sm_size action_mt_4" type="submit">
                            更新する
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    @include('well_pedia.user.layout.after-login.footer')
    <script>
        $(document).ready(function() {
            $('#gender').find("input[value='{{ $result->gender }}']").prop('checked', true);

        })
    </script>
@endsection('content')
