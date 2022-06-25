@extends('well_pedia.admin.layout.basic_layout')
@section('content')
    @include('well_pedia.admin.layout.after_login.navbar')
    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div
                    class="section_title section_title_sub title_sub_140 section_title_mb title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary  text_primary">
                            基本情報：{{ $client->company_name }}
                        </h3>
                    </div>
                </div>
                <form action="{{ route('onAdminClientReset') }}" method="post" class="">
                    @csrf
                    <input type="hidden" name="id" value="{{ $client->id }}">
                    <div class="form_container mb_lg table-responsive  pb-1">
                        <table class="table form_table_td_sizer form_table">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        企業名
                                    </td>
                                    <td>
                                        {{ $client->company_name }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        企業コード
                                    </td>
                                    <td>
                                        {{ $client->company_code }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        電話番号
                                    </td>
                                    <td>
                                        {{ $client->phone_number }}
                                    </td>
                                </tr>


                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        所在地
                                    </td>
                                    <td>
                                        {{ $client->location }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        ご担当者名1
                                    </td>
                                    <td>
                                        {{ $client->charger_1_first . ' ' . $client->charger_1_last }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        ご担当者名2
                                    </td>
                                    <td>
                                        {{ $client->charger_2_first . ' ' . $client->charger_2_last }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        ご担当者名3
                                    </td>
                                    <td>
                                        {{ $client->charger_3_first . ' ' . $client->charger_3_last }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        メールアドレス
                                    </td>
                                    <td>
                                        {{ $client->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        パスワード
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="password" value="{{ $client->password }}" style="{{ $errors->has('password') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        @if($errors->has('password'))
                                            <span class="error font-15rem">{{ $errors->first('password') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap" style="vertical-align: top">
                                        企業ロゴ
                                    </td>
                                    @if($client->logo_url != '')
                                    <td>
                                        <img class="client-view-logo" src="{{ $client->logo_url }}">
                                    </td>
                                    @endif
                                    @if($client->logo_url == '')
                                    <td style="color: blue">
                                        未登録
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form_control_action text-center">
                        <button class="btn_dark btn_green border-0 btn_mt btn_mb_2" type="submit">
                            更新する
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    @include('well_pedia.admin.layout.after_login.footer')
@endsection('content')
