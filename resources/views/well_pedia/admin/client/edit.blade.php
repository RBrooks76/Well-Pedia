@extends('well_pedia.admin.layout.basic_layout')
@section('content')
    @include('well_pedia.admin.layout.after_login.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div
                    class="section_title section_title_sub title_sub_140 section_title_mb title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary">
                            企業情報編集
                        </h3>

                    </div>
                </div>
                <form action="{{ route('onAdminClientEdit') }}" method="post" class="">
                    @csrf
                    <input type="hidden" name="id" value="{{ $client->id }}">
                    <div class="form_container  table-responsive  pb-1">
                        <table class="table form_table_td_sizer form_table">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        企業名 <span class="text_red ms-2"> ※ </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="company_name" value="{{ $client->company_name }}" style="{{ $errors->has('company_name') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        @if($errors->has('company_name'))
                                            <span class="error font-15rem">{{ $errors->first('company_name') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        企業コード
                                        <span class="text_red ms-2"> ※ </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="company_code" value="{{ $client->company_code }}" style="{{ $errors->has('company_code') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        @if($errors->has('company_code'))
                                            <span class="error font-15rem">{{ $errors->first('company_code') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        電話番号
                                        <span class="text_red ms-2"> ※ </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="phone_number" value="{{ $client->phone_number }}" style="{{ $errors->has('phone_number') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        @if($errors->has('phone_number'))
                                            <span class="error font-15rem">{{ $errors->first('phone_number') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        所在地
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control form_control_600" name="location" value="{{ $client->location }}" style="{{ $errors->has('location') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        @if($errors->has('location'))
                                            <span class="error font-15rem">{{ $errors->first('location') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        ご担当者名1
                                    </td>
                                    <td>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" class="form-control" name="charger_1_first" value="{{ $client->charger_1_first }}" style="{{ $errors->has('charger_1_first') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" class="form-control" name="charger_1_last" value="{{ $client->charger_1_last }}" style="{{ $errors->has('charger_1_last') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        @if($errors->has('charger_1_first'))
                                            <span class="error font-15rem">{{ $errors->first('charger_1_first') }}</span>
                                        @endif
                                        @if($errors->has('charger_1_last'))
                                            <span class="error font-15rem">{{ $errors->first('charger_1_last') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        ご担当者名2
                                    </td>
                                    <td>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" class="form-control" name="charger_2_first" value="{{ $client->charger_2_first }}" style="{{ $errors->has('charger_2_first') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" class="form-control" name="charger_2_last" value="{{ $client->charger_2_last }}" style="{{ $errors->has('charger_2_last') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        @if($errors->has('charger_2_first'))
                                            <span class="error font-15rem">{{ $errors->first('charger_2_first') }}</span>
                                        @endif
                                        @if($errors->has('charger_2_last'))
                                            <span class="error font-15rem">{{ $errors->first('charger_2_last') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        ご担当者名3
                                    </td>
                                    <td>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" class="form-control" name="charger_3_first" value="{{ $client->charger_3_first }}" style="{{ $errors->has('charger_3_first') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" class="form-control" name="charger_3_last" value="{{ $client->charger_3_last }}" style="{{ $errors->has('charger_3_last') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        @if($errors->has('charger_3_first'))
                                            <span class="error font-15rem">{{ $errors->first('charger_3_first') }}</span>
                                        @endif
                                        @if($errors->has('charger_3_last'))
                                            <span class="error font-15rem">{{ $errors->first('charger_3_last') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        メールアドレス <span class="text_red ms-2"> ※ </span>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="email" value="{{ $client->email }}" style="{{ $errors->has('email') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        @if($errors->has('email'))
                                            <span class="error font-15rem">{{ $errors->first('email') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        パスワード <span class="text_red ms-2"> ※ </span>
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
                            </tbody>
                        </table>
                    </div>
                    <div class="csv_content_wrapper mb_64">
                        <div class="">
                            <div class="section_title section_title_sub  title_padding ">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h3 class="mb-0">
                                        企業ロゴ 登録
                                    </h3>
                                </div>
                            </div>
                            <div class="section_body">
                                <div class="csv_upload_wrapper d-flex align-items-center flex-wrap">
                                    <h5 class="default_16 family_yugothib">
                                        CSVファイル
                                    </h5>
                                    <div class="uploader">
                                        <button class="csv_uploader_btn" type="button">
                                            <label for="file" class="w-100 h-100">ファイルを選択</label>
                                        </button>
                                        <input onchange="csvUploaderFunc(this)" class="d-none" type="file"
                                            name="file" id="file">
                                        <input type="hidden" name="logo_url" id="logo_url" value="{{ $client->logo_url }}">
                                        <input type="hidden" name="filename" id="filename" value="{{ $client->filename }}">
                                    </div>
                                    <h5 class="filename"></h5>
                                </div>
                                <div class="csv_content_wrapper">
                                    <div class="content_footer">
                                        <button class="btn_primary min_sizer" type="button" onclick="onUpload()">
                                            ロゴを登録する
                                        </button>
                                        @if($errors->has('filename'))
                                            <span class="error font-15rem">{{ $errors->first('filename') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form_control_action text-center">
                        <button class="btn_dark btn_green  content_mb_100 border-0" type="submit">
                            編集する
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <script>

        $(document).ready(function(){
            $('.filename').html("{{ $client->filename }}");
        })

        function onUpload() {
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            var files = $('#file')[0].files;
            if (files.length > 0) {
                var fd = new FormData();

                // Append data
                fd.append('file', files[0]);
                fd.append('_token', CSRF_TOKEN);

                // AJAX request
                $.ajax({
                    url: "{{ route('uploadFile') }}",
                    method: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        $('#logo_url').val(response.filepath);
                        $('#filename').val(response.filename);
                        $('.filename').html(response.real_filename);
                    }
                });
            }
        }
    </script>
    @include('well_pedia.admin.layout.after_login.footer')
@endsection('content')
