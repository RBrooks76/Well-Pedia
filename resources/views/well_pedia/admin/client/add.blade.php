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
                            企業情報登録
                        </h3>
                        @if(Session::has('error-message'))
                            <div class="alert alert-danger text-center">
                                <b>{{ Session::get('error-message') }}</b>
                            </div>
                        @endif
                    </div>
                </div>
                <form action="{{ route('onAdminClientRegister') }}" method="post" class="">
                    @csrf
                    <div class="form_container  table-responsive  pb-1">
                        <table class="table form_table_td_sizer form_table">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        企業名 <span class="text_red ms-2">
                                            ※
                                        </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_220">
                                            <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" style="{{ $errors->has('company_name') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        @if($errors->has('company_name'))
                                            <span class="error font-15rem">{{ $errors->first('company_name') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        企業コード <span class="text_red ms-2"> ※ </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_220">
                                            <input type="text" class="form-control" name="company_code" value="{{ old('company_code') }}" style="{{ $errors->has('company_code') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        <div class="w-400" style="{{ $errors->has('company_code') ? 'color:#D9214E!important' : '' }}">企業コードは8桁である必要があります。</div>
                                        {{-- @if($errors->has('company_code'))
                                            <span class="error font-15rem">{{ $errors->first('company_code') }}</span>
                                        @endif --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        電話番号
                                        <span class="text_red ms-2"> ※ </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_220">
                                            <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" style="{{ $errors->has('phone_number') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        @if($errors->has('phone_number'))
                                            <span class="error font-15rem">{{ $errors->first('phone_number') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        所在地
                                        {{-- <span class="text_red ms-2"> ※ </span> --}}
                                    </td>
                                    <td>
                                        <div class="form-group w_220">
                                            <input type="text" class="form-control form_control_600" name="location" value="{{ old('location') }}" style="{{ $errors->has('location') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        @if($errors->has('location'))
                                            <span class="error font-15rem">{{ $errors->first('location') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        ご担当者名1
                                        {{-- <span class="text_red ms-2"> ※ </span> --}}
                                    </td>
                                    <td>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" class="form-control" name="charger_1_first" placeholder="姓" value="{{ old('charger_1_first') }}" style="{{ $errors->has('charger_1_first') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" class="form-control" name="charger_1_last" placeholder="名" value="{{ old('charger_1_last') }}" style="{{ $errors->has('charger_1_last') ? 'border : 1px solid #D9214E!important;' : '' }}">
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
                                        {{-- <span class="text_red ms-2"> ※ </span> --}}
                                    </td>
                                    <td>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" class="form-control" name="charger_2_first" placeholder="姓" value="{{ old('charger_2_first') }}" style="{{ $errors->has('charger_2_first') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" class="form-control" name="charger_2_last" placeholder="名" value="{{ old('charger_2_last') }}" style="{{ $errors->has('charger_2_last') ? 'border : 1px solid #D9214E!important;' : '' }}">
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
                                        {{-- <span class="text_red ms-2"> ※ </span> --}}
                                    </td>
                                    <td>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" class="form-control" name="charger_3_first" placeholder="姓" value="{{ old('charger_3_first') }}" style="{{ $errors->has('charger_3_first') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" class="form-control" name="charger_3_last" placeholder="名" value="{{ old('charger_3_last') }}"  style="{{ $errors->has('charger_3_last') ? 'border : 1px solid #D9214E!important;' : '' }}">
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
                                        <div class="form-group w_220">
                                            <input type="email" class="form-control"  name="email" value="{{ old('email') }}" style="{{ $errors->has('email') ? 'border : 1px solid #D9214E!important;' : '' }}">
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
                                            <input type="text" class="form-control"  name="password" value="{{ old('password') }}" style="{{ $errors->has('password') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        <div class="w-400" style="{{ $errors->has('password') ? 'color:#D9214E!important' : '' }}">パスワードは8〜12文字である必要があります。</div>
                                        {{-- @if($errors->has('password'))
                                            <span class="error font-15rem">{{ $errors->first('password') }}</span>
                                        @endif --}}
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
                            <div class="section_body " style="padding-bottom:10px">
                                <label>表示する際は <b>200px×50px</b> になるように、縦横の比率を維持したまま 自動でリサイズ されます。</label>
                            </div>
                            <div class="section_body">
                                <div class="csv_upload_wrapper d-flex align-items-center flex-wrap">
                                    <h5 class="default_16 family_yugothib">
                                        イメージファイル
                                    </h5>
                                    <div class="uploader">
                                        <button class="csv_uploader_btn" type="button">
                                            <label for="file" class="w-100 h-100">ファイルを選択</label>
                                        </button>
                                        <input class="d-none" type="file" name="file" id="file">
                                        <input type="hidden" name="logo_url" id="logo_url" >
                                        <input type="hidden" name="filename" id="filename">
                                    </div>
                                    <h5 class="real_filename"></h5>
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
                        <button class="btn_dark btn_orange  content_mb_100 border-0" type="submit">
                            登録する
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script>

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
                        $('.real_filename').html(response.real_filename);
                    }
                });
            }
        }
    </script>
    @include('well_pedia.admin.layout.after_login.footer')
@endsection('content')
