@extends('well_pedia.client.layout.client_layout')
@section('content')
    @include('well_pedia.client.layout.after.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub section_title_mb title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary">
                            基本情報編集
                        </h3>
                    </div>
                </div>
                <form action="{{ route('onClientViewEdit') }}" method="post" class="">
                    @csrf
                    <input type="hidden" name="id" value="{{ $client->id }}">
                    <div class="form_container  table-responsive  pb-1">
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
                                        {{-- <span class="text_red ms-2"> ※ </span> --}}
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input value="{{ $client->phone_number }}" type="text" name="phone_number" class="form-control" style="{{ $errors->has('phone_number') ? 'border : 1px solid #D9214E!important;' : '' }}">
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
                                            <input value="{{ $client->location }}" type="text" name="location"  class="form-control form_control_600" style="{{ $errors->has('location') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        <div class="w-400">
                                            @if($errors->has('location'))
                                                <span class="error font-15rem">{{ $errors->first('location') }}</span>
                                            @endif
                                        </div>
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
                                                    <input type="text" name="charger_1_first" value="{{ $client->charger_1_first }}" class="form-control" style="{{ $errors->has('charger_1_first') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                                    @if($errors->has('location'))
                                                        <span class="error font-15rem">{{ $errors->first('charger_1_first') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" name="charger_1_last" value="{{ $client->charger_1_last }}" class="form-control" style="{{ $errors->has('charger_1_last') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                                    @if($errors->has('location'))
                                                        <span class="error font-15rem">{{ $errors->first('charger_1_last') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
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
                                                    <input type="text" name="charger_2_first" value="{{ $client->charger_2_first }}" class="form-control" style="{{ $errors->has('charger_2_first') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                                    @if($errors->has('location'))
                                                        <span class="error font-15rem">{{ $errors->first('charger_2_first') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" name="charger_2_last" value="{{ $client->charger_2_last }}" class="form-control" style="{{ $errors->has('charger_2_last') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                                    @if($errors->has('location'))
                                                        <span class="error font-15rem">{{ $errors->first('charger_2_last') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
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
                                                    <input type="text" name="charger_3_first" value="{{ $client->charger_3_first }}" class="form-control" style="{{ $errors->has('charger_3_first') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                                    @if($errors->has('location'))
                                                        <span class="error font-15rem">{{ $errors->first('charger_3_first') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group w-100">
                                                    <input type="text" name="charger_3_last" value="{{ $client->charger_3_last }}" class="form-control" style="{{ $errors->has('charger_3_last') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                                    @if($errors->has('location'))
                                                        <span class="error font-15rem">{{ $errors->first('charger_3_last') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        メールアドレス
                                        {{-- <span class="text_red ms-2"> ※ </span> --}}
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="form-group w_220">
                                            <input type="email" class="form-control"  name="email" value="{{ $client->email }}" style="{{ $errors->has('email') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        @if($errors->has('email'))
                                            <span class="error font-15rem">{{ $errors->first('email') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        パスワード
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="d-flex align-items-center" name="password">
                                            {{ $client->password }}
                                            {{-- <a href="#" class="text_f7 font_14 ms-1 ms-sm-5 sm_less">
                                                →パスワードを変更する
                                            </a> --}}
                                        </div>

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
                                        <input type="hidden" name="logo_url" id="logo_url" value="{{ $client->logo_url }}">
                                        <input type="hidden" name="filename" id="filename" value="{{ $client->filename }}">
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
                        <button class="btn_dark btn_green  content_mb_100 border-0">
                            更新する
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    @include('well_pedia.client.layout.after.footer')
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
@endsection('content')
