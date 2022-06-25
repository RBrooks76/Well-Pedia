@extends('well_pedia.user.layout.user_layout')
@section('content')
    @include('well_pedia.user.layout.after-login.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_mb title_padding title_border_bottom">
                    <h1 class="text_primary title_mb">
                        MOVIE
                    </h1>
                    <h5 class="text_48">
                        動画
                    </h5>
                </div>
            </div>
        </section>
        <section class="section_container container_left_helper container_right_helper">
            <div class="row g-5 video_card_wrapper">
                <div class="col-12">
                    <div class="col_wrapper">
                        <div class="video_card_content video_card_details">
                            <div class="card_title">
                                <div class="video_control">
                                    <video width="100%" height="100%" controls onended="onEnded()" onclick="onPlay()">
                                        <source src="{{ $video->video_url }}" >
                                    </video>
                                    <!-- play button -->
                                    {{-- <button class="play_btn" onclick="onPlayVideo()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="79" height="79"
                                            viewBox="0 0 79 79">
                                            <g id="Group_109" data-name="Group 109" transform="translate(0.078 -0.067)">
                                                <g id="Ellipse_5" data-name="Ellipse 5"
                                                    transform="translate(-0.078 0.067)" fill="none" stroke="#fff"
                                                    stroke-width="5">
                                                    <circle cx="39.5" cy="39.5" r="39.5" stroke="none" />
                                                    <circle cx="39.5" cy="39.5" r="37" fill="none" />
                                                </g>
                                                <path id="Polygon_1" data-name="Polygon 1" d="M11.5,0,23,20H0Z"
                                                    transform="translate(49.922 28.067) rotate(90)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </button> --}}
                                </div>

                            </div>
                            <div class="card_body">
                                <!--
                                    <h4 class="font-weight-bold">
                                        <a href="#" class="text_48 video_name">
                                            動画タイトル動画タイトル動画タイトル
                                        </a>
                                    </h4>
                                -->
                                <div class="d-flex video_tages flex-wrap">
                                    <a href="#" class="text_f7">EXERCISE</a>
                                    <a href="#" class="text_f7">RELAX</a>
                                </div>
                                <p class="paragraph">
                                    {{ $video->video_title }}
                                </p>
                            </div>
                            <div class="card_footer">
                                <div class="text-end card_counter">
                                    {{ $video->point }}
                                    <span class="counter_box text_primary">
                                        P
                                    </span>
                                </div>
                                <p class="paragraph text-center">
                                    動画を見てトレーニングが完了したらクリックください。
                                </p>
                                <button class="btn_return video_details_return mb_xl" disabled onclick="onFinishPlayingVideo({{ $video->id }})" id='finish_video_btn'>
                                    完了
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col_wrapper">
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn_light_2 me-3">
                                前の動画
                            </button>

                            <button class="btn_light_2">
                                次の動画
                            </button>
                        </div>
                        <div class="border_line lg_size"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button class="btn_list_return" onclick="toMovieList()">
                        動画一覧ページに戻る
                    </button>
                </div>
                <div class="col-12">
                    <button class="btn_return mb_xl" onclick="toMenu()">
                        メニューページに戻る
                    </button>
                </div>
            </div>
        </section>
    </main>

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function toMovieList(){
            history.back();
        }

        function toMenu(){
            window.location.href = "{{ route('toUserMenu') }}";
        }

        function onPlay(){

        }

        function onEnded(){
            $('#finish_video_btn').prop('disabled', false);
            toastr.success("この動画の再生は終了しました。");

        }

        var cnt = 0;
        function onFinishPlayingVideo(id){

            if(cnt == 0){
                $.ajax({
                    type : 'POST',
                    url : "{{ route('onRegisterVideoHistory') }}",
                    data : {
                        id : id,
                    },
                    success:function(result){
                        // window.location.href="{{ route('toUserMenu') }}";
                        history.back();
                    }
                })
            }
            cnt++;
        }

    </script>
@endsection('content')
