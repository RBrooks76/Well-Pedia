@extends('well_pedia.admin.layout.basic_layout')
@section('content')
    @include('well_pedia.admin.layout.after_login.navbar')
    <main>

        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub title_sub_140 section_title_mb  title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary">
                            動画ー編集
                        </h3>
                    </div>
                </div>
                <form action="{{ route('updateVideo') }}" method="post" class="" id="form_data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $video->id }}">
                    <div class="form_container  table-responsive  pb-1 align_baseline">
                        <table class="table form_table_td_sizer td_sizer_5 w_100 form_table ">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        動画タイトル
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control form_control_600 h_40" name="video_title" value="{{ $video->video_title }}"  style="{{ $errors->has('video_title') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        @if($errors->has('video_title'))
                                            <span class="error">{{ $errors->first('video_title') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        動画アップロード
                                    </td>
                                    <td>
                                        <div class="csv_content_wrapper">
                                            <div class="csv_upload_wrapper d-flex align-items-center flex-wrap">
                                                <h5 class="default_16 family_yugothib">
                                                    動画ファイル
                                                </h5>
                                                <div class="uploader">
                                                    <button class="csv_uploader_btn" type="button"  style="{{ $errors->has('filename') ? 'border : 1px solid #D9214E!important; color:#D9214E!important' : '' }}">
                                                        <label for="file"  class="w-100 h-100" style="{{ $errors->has('filename') ? 'color:#D9214E!important' : '' }}">ファイルを選択</label>
                                                    </button>
                                                    <input  onchange="upload(this)" class="d-none" type="file" name="file" id="file" multiple>
                                                    <input type="hidden" name="video_url" id="video-url" value="{{ $video->video_url }}">
                                                    <input type="hidden" name="filename" id="filename" value="{{ $video->video_name }}">
                                                </div>
                                                <h5 class="csv_uploader_output">
                                                    {{ $video->video_name }}
                                                </h5>
                                                @if($errors->has('filename'))
                                                    <span class="error">{{ $errors->first('filename') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        ジャンル
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center" id="myForm">
                                            <div
                                                class="form-group me-3 d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" checked="" name="genre" id="form_checkbox1" value="1">
                                                <label for="form_checkbox1" class="ms-2">Exercise</label>
                                            </div>

                                            <div class="form-group  me-3  d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" name="genre" id="form_checkbox2" value="2">
                                                <label for="form_checkbox2" class="ms-2">relax</label>
                                            </div>
                                            <div class="form-group  d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" name="genre" id="form_checkbox3" value="3">
                                                <label for="form_checkbox3" class="ms-2">other</label>
                                            </div>
                                            <div class="form-group d-flex align-items-center form_checkbox_label_group">
                                                <button class=" text-nowrap"
                                                    style="background: transparent; color: #747474; margin-left: 4.8rem">
                                                    + カテゴリ追加
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        ポイント
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="form-group w_70 text-center d-flex align-items-center">
                                                <input type="text" class="form-control text-center h_40" name="point" value="{{ $video->point }}" style="{{ $errors->has('point') ? 'border : 1px solid #D9214E!important' : '' }}">
                                            </div>
                                            <span class="ms-3 ms-md-5"> pt</span>
                                        </div>
                                        @if($errors->has('point'))
                                            <span class="error">{{ $errors->first('point') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        キャプション
                                    </td>
                                    <td>
                                        @if($errors->has('caption'))
                                            <span class="error">{{ $errors->first('caption') }}</span>
                                        @endif
                                        <div class="form-group">
                                            <textarea class="form-control textarea_height" name="caption" id="caption" style="{{ $errors->has('caption') ? 'border : 1px solid #D9214E!important;' : '' }}"></textarea>
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
        $(document).ready(function() {
            $('#myForm').find("input[value='{{ $video->genre }}']").prop('checked', true);
            $('#caption').val("{{ $video->caption }}");
        })

        function upload(val) {
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            if($('#filename').val() != ''){
                $.ajax({
                    url : "{{ route('onAvoidDuplicate') }}",
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
                    url: "{{ route('videoUpload') }}",
                    method: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        document.querySelector('.csv_uploader_output').innerHTML = response.real_filename;
                        $('#video-url').val(response.filepath);
                        $('#filename').val(response.filename);
                    }
                });
            }
        }
    </script>
    @include('well_pedia.admin.layout.after_login.footer')
@endsection('content')
