@extends('well_pedia.user.layout.user_layout')
@section('content')
    @include('well_pedia.user.layout.after-login.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_mb title_padding title_border_bottom">
                    <h1 class="text_primary title_mb">
                        KARADA SOLUTION
                    </h1>
                    <h5 class="text_48">
                        カラダソリューション
                    </h5>
                </div>
            </div>
        </section>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <ul class="list-unstyled card_listing_wrapper">
                    <li>
                        <div class="d-flex flex-wrap flex-lg-nowrap">

                            <div class="media_box">

                            </div>
                            <div class="content_box">
                                <h2 class="text_48 mb_2">
                                    SOLUTION 01
                                </h2>

                                <p class="paragraph">
                                    テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                </p>
                                <div class="text-end">
                                    <a href="#" class="link_read_more">
                                        READ MORE >
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex flex-wrap flex-lg-nowrap">

                            <div class="media_box">

                            </div>
                            <div class="content_box">
                                <h2 class="text_48 mb_2">
                                    SOLUTION 02
                                </h2>

                                <p class="paragraph">
                                    テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                </p>
                                <div class="text-end">
                                    <a href="#" class="link_read_more">
                                        READ MORE >
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex flex-wrap flex-lg-nowrap">

                            <div class="media_box">

                            </div>
                            <div class="content_box">
                                <h2 class="text_48 mb_2">
                                    SOLUTION 03
                                </h2>

                                <p class="paragraph">
                                    テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                </p>
                                <div class="text-end">
                                    <a href="#" class="link_read_more">
                                        READ MORE >
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-12">
                        <button class="btn_return mb_xl" onclick="toMenu()">
                            メニューページに戻る
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
         function toMenu(){
            window.location.href = "{{ route('toUserMenu') }}";
        }
    </script>
    @include('well_pedia.user.layout.after-login.footer')
@endsection('content')
