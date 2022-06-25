@extends('well_pedia.admin.layout.basic_layout')
@section('content')
    @include('well_pedia.admin.layout.after_login.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub title_sub_140 section_title_mb title_padding title_border_bottom"
                    style="margin-bottom: 3.2rem">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary">
                            動画管理
                        </h3>
                        <button class="btn_be_action mb-3 mb-sm-0 text-nowrap action_orange" onclick="toRegisterVideo()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <g id="Group_196" data-name="Group 196" transform="translate(-191 -369)">
                                    <circle id="Ellipse_7" data-name="Ellipse 7" cx="8" cy="8" r="8"
                                        transform="translate(191 369)" fill="#fff" />
                                    <path id="Icon_awesome-plus" data-name="Icon awesome-plus"
                                        d="M7.429,5.393H4.857V2.821a.571.571,0,0,0-.571-.571H3.714a.571.571,0,0,0-.571.571V5.393H.571A.571.571,0,0,0,0,5.964v.571a.571.571,0,0,0,.571.571H3.143V9.679a.571.571,0,0,0,.571.571h.571a.571.571,0,0,0,.571-.571V7.107H7.429A.571.571,0,0,0,8,6.536V5.964A.571.571,0,0,0,7.429,5.393Z"
                                        transform="translate(195 370.75)" fill="#ff771e" />
                                </g>
                            </svg>
                            登録
                        </button>
                    </div>
                </div>


                <div class="section_body">
                    <div class="form_container">
                        <div class="row gx-3 gy-4 mb-3">
                            <div class="col-12">
                                <div class="d-flex flex-wrap flex-sm-nowrap align-items-center">
                                    <div class="form-group w-100 mb-3 mb-sm-0">
                                        <input type="text" class="form-control w-100 h_40_sizer" id="searchkey" name="searchkey">
                                    </div>
                                    <button class="btn_be_action client_action_primary sm_size ms-sm-3" onclick="onSearchVideo()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.999" height="18.002"
                                            viewBox="0 0 17.999 18.002">
                                            <path id="Icon_awesome-search" data-name="Icon awesome-search"
                                                d="M17.754,15.564l-3.505-3.505a.843.843,0,0,0-.6-.246h-.573a7.309,7.309,0,1,0-1.266,1.266v.573a.843.843,0,0,0,.246.6l3.505,3.505a.84.84,0,0,0,1.192,0l.995-.995a.848.848,0,0,0,0-1.2ZM7.313,11.813a4.5,4.5,0,1,1,4.5-4.5A4.5,4.5,0,0,1,7.313,11.813Z"
                                                fill="#fff"></path>
                                        </svg> 検索
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub  title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary me-3">
                            動画一覧
                        </h3>
                        <div class="pagination_wrapper mb-0">
                            {!! $videos->links() !!}
                        </div>
                    </div>
                </div>
                <div class="content_list_wrapper">
                    <ul class="list-unstyled content_list" id="content-list">
                        @foreach ($videos as $video)
                            <li id="li{{ $video->id }}">
                                <div class="d-block d-lg-flex align-items-center flex-wrap justify-content-between">
                                    <div class="box me-3 mb-3 mb-lg-0">
                                        <h4>
                                            <b>{{ $video->video_title }}</b>
                                        </h4>
                                        <div class="list_foot d-flex align-items-center">
                                            <a href="#" class="text_df7">CATEGORY</a>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <button class="btn btn-outline green-sharp uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf" onclick="toEdit({{ $video->id }})">
                                            - 編集する
                                        </button>
                                        <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf"onclick="onDeleteVideo({{ $video->id }})">
                                            ×削除する
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="section_title pagination_wrapper my_sizer mt-5">
                    {!! $videos->links() !!}
                </div>
            </div>
        </section>
    </main>
    @include('well_pedia.admin.layout.after_login.footer')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
        });

        function toRegisterVideo() {
            window.location.href = "{{ route('toAdminVideoRegister') }}";
        }

        function toEdit(id) {
            window.location.href = "{{ route('toAdminVideoEdit') }}?id=" + id;
        }

        function onDeleteVideo(id) {
            $.confirm({
                title: '確認!',
                content: '本当に削除しますか？',
                buttons: {
                    確認: {
                        text: '確認',
                        btnClass: 'btn-blue',
                        action: function(){
                            $.ajax({
                                url: "{{ route('deleteVideo') }}",
                                type: 'POST',
                                data: {
                                    id: id
                                },
                                success: function(result) {
                                     $('#li' + id).hide(true);
                                     toastr.success("削除成功!");
                                }
                            })
                        }
                    },
                    キャンセル: function () {
                    },
                }
            });
        }

        function onSearchVideo(){
            $.ajax({
                type : "POST",
                url : "{{ route('onSearchVideo') }}",
                data :  {
                    key : $('#searchkey').val()
                },success:function(result){
                    var html = "";
                    $('#content-list').html(html);
                    for(var i = 0; i < result.length; i++){
                        html += `<li id="li`+ result[i]['id'] +`">`+
                                    `<div class="d-block d-lg-flex align-items-center flex-wrap justify-content-between">`+
                                        `<div class="box me-3 mb-3 mb-lg-0">`+
                                            `<h4><b>`+ result[i]['video_title'] +`</b></h4>`+
                                            `<div class="list_foot d-flex align-items-center">`+
                                                `<a href="#" class="text_df7">CATEGORY</a>`+
                                            `</div>`+
                                        `</div>`+
                                        `<div class="box">`+
                                            `<button class="btn btn-outline green-sharp uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf" onclick="toEdit(`+ result[i]['id'] +`)">`+
                                            ` - 編集する`+
                                            `</button>`+
                                            `<button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf"onclick="onDeleteVideo(`+ result[i]['id'] +`)">`+
                                                `×削除する`+
                                            `</button>`+
                                    ` </div>`+
                                    `</div>`+
                                `</li>`;
                    }
                    $('#content-list').html(html);
                }
            })
        }

    </script>
@endsection('content')
