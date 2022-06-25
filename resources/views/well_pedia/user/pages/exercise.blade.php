@extends('well_pedia.user.layout.user_layout')
@section('content')
    @include('well_pedia.user.layout.after-login.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_mb title_padding title_border_bottom">
                    <h1 class="text_primary title_mb">
                        EXERCISE
                    </h1>
                    <h5 class="text_48">
                        エクササイズ
                    </h5>
                </div>
            </div>
        </section>
        <section class="section_container container_left_helper container_right_helper">
            <div class="row justify-content-center">
                <div class="col-11 col-xl-10">
                    <div class="row g-5 video_card_wrapper">
                        @foreach($exercises as $exercise)
                            <div class="col-md-6">
                                <div class="col_wrapper">
                                    <div class="video_card_content">
                                        <div class="card_title">
                                            <div class="video_control">
                                                <video id="bgvid" width="100%" height="100%">
                                                    <source src="{{ $exercise->video_url }}" type="video/mp4">
                                                </video>
                                                <!-- play button -->
                                                <button class="play_btn" onclick="onPlayVideo({{ $exercise->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="79" height="79"
                                                        viewBox="0 0 79 79">
                                                        <g id="Group_109" data-name="Group 109"
                                                            transform="translate(0.078 -0.067)">
                                                            <g id="Ellipse_5" data-name="Ellipse 5"
                                                                transform="translate(-0.078 0.067)" fill="none"
                                                                stroke="#fff" stroke-width="5">
                                                                <circle cx="39.5" cy="39.5" r="39.5" stroke="none" />
                                                                <circle cx="39.5" cy="39.5" r="37" fill="none" />
                                                            </g>
                                                            <path id="Polygon_1" data-name="Polygon 1" d="M11.5,0,23,20H0Z"
                                                                transform="translate(49.922 28.067) rotate(90)"
                                                                fill="#fff" />
                                                        </g>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card_body">
                                            <h4 class="font-weight-bold">
                                                <a href="{{ route('toPlayVideo') . '?id=' . $exercise->id }}" class="text_48 video_name">
                                                    {{ $exercise->video_title }}
                                                </a>
                                            </h4>
                                            <div class="d-flex video_tages flex-wrap">
                                                <a href="#" class="text_f7">EXERCISE</a>
                                                <a href="#" class="text_f7">RELAX</a>
                                            </div>
                                            <p class="paragraph">
                                                {{ $exercise->caption }}
                                            </p>
                                        </div>
                                        <div class="card_footer">
                                            <div class="text-end card_counter">
                                                {{ $exercise->point }}
                                                <span class="counter_box text_primary">
                                                    P
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button class="btn_return mb_xl" onclick="toMenu()">
                        メニューページに戻る
                    </button>
                </div>
            </div>
        </section>
    </main>

    @include('well_pedia.user.layout.after-login.footer')
    <script>

        function toMenu(){
            window.location.href = "{{ route('toUserMenu') }}";
        }

        function onPlayVideo(id){
            window.location.href = "{{ route('toPlayVideo')}}" + '?id=' + id;
        }

    </script>
@endsection('content')
