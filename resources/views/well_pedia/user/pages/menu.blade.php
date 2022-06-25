@extends('well_pedia.user.layout.user_layout')
@section('content')
    @include('well_pedia.user.layout.after-login.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_mb title_padding title_border_bottom">
                    <h1 class="text_primary title_mb">
                        MENU
                    </h1>
                    <h5 class="text_48">
                        メニュー
                    </h5>
                </div>
            </div>
        </section>
        <section class="section_container container_left_helper container_right_helper">
            <div class="row g-5 menu_card_wrapper">
                <div class="col-md-6">
                    <div class="col_wrapper">
                        <div class="menu_card_content">
                            <div class="card_title">
                                <img alt="Concept & Recommendation" src="" >
                            </div>
                            <div class="card_body">
                                <h4 class="font-weight-bold">
                                    <a href="{{ route('toConcept') }}" class="text_primary">
                                        Concept & Recommendation
                                    </a>
                                </h4>
                                <p class="paragraph">
                                    テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                </p>
                            </div>
                            <div class="card_footer">
                                <a href="#" class="btn_more">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col_wrapper">
                        <div class="menu_card_content">
                            <div class="card_title">

                            </div>
                            <div class="card_body">
                                <h4 class="font-weight-bold">
                                    <a href="{{ route('toExercise') }}" class="text_primary">
                                        EXERCISE
                                    </a>
                                </h4>
                                <p class="paragraph">
                                    テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                </p>
                            </div>
                            <div class="card_footer">
                                <a href="#" class="btn_more">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col_wrapper">
                        <div class="menu_card_content">
                            <div class="card_title">

                            </div>
                            <div class="card_body">
                                <h4 class="font-weight-bold">
                                    <a href="{{ route('toRelax') }}" class="text_primary">
                                        RELAX
                                    </a>
                                </h4>
                                <p class="paragraph">
                                    テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                </p>
                            </div>
                            <div class="card_footer">
                                <a href="#" class="btn_more">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col_wrapper">
                        <div class="menu_card_content">
                            <div class="card_title">

                            </div>
                            <div class="card_body">
                                <h4 class="font-weight-bold">
                                    <a href="{{ route('toKarada') }}" class="text_primary">
                                        KARADA SOLUTION
                                    </a>
                                </h4>
                                <p class="paragraph">
                                    テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                </p>
                            </div>
                            <div class="card_footer">
                                <a href="#" class="btn_more">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col_wrapper">
                        <div class="menu_card_content">
                            <div class="card_title">

                            </div>
                            <div class="card_body">
                                <h4 class="font-weight-bold">
                                    <a href="{{ route('toKokoro') }}" class="text_primary">
                                        KOKORO SOLUTION
                                    </a>
                                </h4>
                                <p class="paragraph">
                                    テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                </p>
                            </div>
                            <div class="card_footer">
                                <a href="#" class="btn_more">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col_wrapper">
                        <div class="menu_card_content">
                            <div class="card_title">

                            </div>
                            <div class="card_body">
                                <h4 class="font-weight-bold">
                                    <a href="{{ route('toOnline') }}" class="text_primary">
                                        オンライン診療
                                    </a>
                                </h4>
                                <p class="paragraph">
                                    テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                </p>
                            </div>
                            <div class="card_footer">
                                <a href="#" class="btn_more">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('well_pedia.user.layout.after-login.footer')
@endsection('content')
