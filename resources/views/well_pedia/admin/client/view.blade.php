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
                <form action="" method="post" class="">
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
                                        <div class="d-flex align-items-center">
                                            {{ $client->password }}
                                            <a href="{{ route('toAdminClientReset', 'id=' . $client->id) }}" class="text_df7 font_14 ms-1 ms-sm-5 sm_less">
                                                →パスワードを変更する
                                            </a>
                                        </div>

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
                        <button class="btn_dark content_mb_100 shadow-0 border-0" onclick="toAdminClientEdit({{ $client->id }})" type="button">
                            編集する
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script>
        function toAdminClientEdit(id){
            window.location.href = "{{ route('toAdminClientEdit') }}?id=" + id;
        }
    </script>
    @include('well_pedia.admin.layout.after_login.footer')
@endsection('content')
