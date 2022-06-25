@extends('well_pedia.admin.layout.basic_layout')
@section('content')
    @include('well_pedia.admin.layout.after_login.navbar')
    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub title_sub_140 section_title_mb  title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary">
                            ニュースー登録
                        </h3>
                    </div>
                </div>
                <form action="{{ route('onAdminEditNews') }}" method="post" class="" id="form_data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $news->id }}">
                    <div class="form_container  table-responsive  pb-1 align_baseline">
                        <table class="table form_table_td_sizer td_sizer_5 w_100 form_table ">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        ニュースタイトル
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control h_40" name="news_title"  value="{{ $news->news_title }}" style="{{ $errors->has('news_title') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        @if($errors->has('news_title'))
                                            <span class="error">{{ $errors->first('news_title') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        画像アップロード
                                    </td>
                                    <td>
                                        <div class="csv_content_wrapper">
                                            <div class="csv_upload_wrapper d-flex align-items-center flex-wrap">
                                                <h5 class="default_16 family_yugothib" style="{{ $errors->has('filename') ? 'color:#D9214E!important' : '' }}">
                                                    画像ファイル
                                                </h5>
                                                <div class="uploader">
                                                    <button class="csv_uploader_btn" type="button" style="{{ $errors->has('filename') ? 'border : 1px solid #D9214E!important; color:#D9214E!important' : '' }}">
                                                        <label for="file"  class="w-100 h-100"  style="{{ $errors->has('filename') ? 'color:#D9214E!important' : '' }}">ファイルを選択</label>
                                                    </button>
                                                    <input  onchange="upload(this)" class="d-none" type="file" name="file" id="file" multiple>
                                                    <input type="hidden" name="news_url" id="news_url" value="{{ $news->news_url }}">
                                                    <input type="hidden" name="filename" id="filename" value="{{ $news->news_name }}">
                                                </div>
                                                <h5 class="csv_uploader_output">{{ $news->news_name }}</h5>
                                            </div>
                                            @if($errors->has('filename'))
                                                <span class="error">{{ $errors->first('filename') }}</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr> --}}
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        ジャンル
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center" id="myForm">
                                            <div class="form-group me-3 d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" name="genre" id="form_checkbox1" value="1">
                                                <label for="form_checkbox1" class="ms-2">お知らせ</label>
                                            </div>
                                            <div class="form-group  me-3  d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" name="genre" id="form_checkbox2" value="2">
                                                <label for="form_checkbox2" class="ms-2">メディア掲載</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        キャプション
                                    </td>
                                    <td>
                                        @if($errors->has('news_caption'))
                                            <span class="error">{{ $errors->first('news_caption') }}</span>
                                        @endif
                                        <div class="form-group">
                                            <textarea class="form-control textarea_height" id="news_caption" name="news_caption" style="{{ $errors->has('news_caption') ? 'border : 1px solid #D9214E!important;' : '' }}">{{ str_replace('<br />', '', $news->news_caption) }}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form_control_action text-center">
                        <button class="btn_dark btn_green btn_mt_4  content_mb border-0" type="submit">
                            更新する
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script>
        $(document).ready(function(){
            $('#myForm').find("input[value='{{ $news->genre }}']").prop('checked', true);
        })

        function upload(val) {
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            if($('#filename').val() != ''){
                $.ajax({
                    url : "{{ route('onAvoidDuplicateNews') }}",
                    method : "post",
                    data : {
                        filename : $('#filename').val(),
                        _token : CSRF_TOKEN
                    },
                    success:function(){

                    }
                })
            }

            var files = $('#file')[0].files;
                if (files.length > 0) {
                    var fd = new FormData();

                    // Append data
                    fd.append('file', files[0]);
                    fd.append('_token', CSRF_TOKEN);

                    // AJAX request
                    $.ajax({
                        url: "{{ route('onAdminNewsUpload') }}",
                        method: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            document.querySelector('.csv_uploader_output').innerHTML = response.real_filename;
                            $('#news_url').val(response.filepath);
                            $('#filename').val(response.filename);
                        }
                    });
                }
        }
    </script>
    @include('well_pedia.admin.layout.after_login.footer')
@endsection('content')
