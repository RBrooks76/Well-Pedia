@extends('well_pedia.admin.layout.basic_layout')
@section('content')
    @include('well_pedia.admin.layout.after_login.navbar')

    <main>

        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub title_sub_140 section_title_mb title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary">
                            コンテンツ管理
                        </h3>
                    </div>
                </div>
                <form action="{{ route('editContent') }}" method="post" class="">
                    @csrf
                    <input type="hidden" name="id" value="{{ $result->id }}">
                    <div class="form_container  table-responsive  pb-1 align_baseline">
                        <table class="table form_table_td_sizer td_sizer_5 w_100 form_table ">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        Concept画像
                                    </td>
                                    <td>
                                        <div class="csv_content_wrapper">
                                            <div class="csv_upload_wrapper d-flex align-items-center flex-wrap">
                                                <h5 class="default_16 family_yugothib">
                                                    イメージファイル
                                                </h5>
                                                <div class="uploader">
                                                    <button class="csv_uploader_btn" type="button">
                                                        <label for="concept_file" class="w-100 h-100">ファイルを選択</label>
                                                    </button>
                                                    <input onchange="onCUpload(this)" class="d-none" type="file" name="concept_file" id="concept_file">
                                                    <input type="hidden" name="concept_image" id="concept_image" value="{{ $result->concept_image }}">
                                                    <input type="hidden" name="concept_filename" id="concept_filename" value="{{ $result->concept_filename}}">
                                                </div>
                                                <h5 class="concept_upload">{{ $result->concept_filename }}</h5>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        Conceptテキスト
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control textarea_height" name="concept_text" id="concept_text">{{ str_replace('<br />', '', $result->concept_text) }}</textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        Recommendation画像
                                    </td>
                                    <td>
                                        <div class="csv_content_wrapper">
                                            <div class="csv_upload_wrapper d-flex align-items-center flex-wrap">
                                                <h5 class="default_16 family_yugothib">
                                                    イメージファイル
                                                </h5>
                                                <div class="uploader">
                                                    <button class="csv_uploader_btn" type="button">
                                                        <label for="recommendation_file" class="w-100 h-100">ファイルを選択</label>
                                                    </button>
                                                    <input onchange="onRUpload(this)" class="d-none" type="file"  name="recommendation_file" id="recommendation_file">
                                                    <input type="hidden" name="recommendation_image" id="recommendation_image" value="{{ $result->recommendation_image }}">
                                                    <input type="hidden" name="recommendation_filename" id="recommendation_filename" value="{{ $result->recommendation_filename }}">
                                                </div>
                                                <h5 class="recommendation_upload">{{ $result->recommendation_filename }}</h5>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        Recommendationテキスト
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control textarea_height" name="recommendation_text" id="recommendation_text">{{ str_replace('<br />', '', $result->recommendation_text) }}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form_control_action text-center">
                        <button class="btn_dark btn_green btn_mt_4  content_mb_100 border-0" type="submit">
                            更新する
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    @include('well_pedia.admin.layout.after_login.footer')
    <script type="text/javascript">
        $(document).ready(function() {

        });

        function onCUpload(val) {
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            if($('#concept_filename').val() != ''){
                $.ajax({
                    url : "{{ route('onAvoidDuplicate') }}",
                    method : "post",
                    data : {
                        filename : $('#concept_filename').val(),
                        _token : CSRF_TOKEN
                    },
                    success:function(){

                    }
                })
            }

            var files = $('#concept_file')[0].files;
            if (files.length > 0) {
                var fd = new FormData();

                // Append data
                fd.append('file', files[0]);
                fd.append('_token', CSRF_TOKEN);

                // AJAX request
                $.ajax({
                    url: "{{ route('conceptUpload') }}",
                    method: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        $('#concept_image').val(response.filepath);
                        $('#concept_filename').val(response.filename);
                        $('.concept_upload').html(response.real_filename);
                    }
                });
            }
        }

        function onRUpload(val) {
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            if($('#recommendation_filename').val() != ''){
                $.ajax({
                    url : "{{ route('onAvoidDuplicate') }}",
                    method : "post",
                    data : {
                        filename : $('#recommendation_filename').val(),
                        _token : CSRF_TOKEN
                    },
                    success:function(){

                    }
                })
            }

            var files = $('#recommendation_file')[0].files;
            if (files.length > 0) {
                var fd = new FormData();

                // Append data
                fd.append('file', files[0]);
                fd.append('_token', CSRF_TOKEN);

                // AJAX request
                $.ajax({
                    url: "{{ route('recommendationUpload') }}",
                    method: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        $('#recommendation_image').val(response.filepath);
                        $('#recommendation_filename').val(response.filename);
                        $('.recommendation_upload').html(response.real_filename);
                    }
                });
            }
        }
    </script>
@endsection('content')
