@extends('well_pedia.user.layout.user_layout')
@section('content')
    @include('well_pedia.user.layout.after-login.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_mb title_padding title_border_bottom">
                    <h1 class="text_primary title_mb">
                        Concept & Recommendation
                    </h1>
                    <h5 class="text_48">
                        コンセプト＆レコメンデーション
                    </h5>
                </div>
            </div>
        </section>

        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="static_card_wrapper">
                    <h3 class="size_40 title_mb text_primary text-center family_yugothib">
                        Concept
                    </h3>
                    <div class="media_box">
                        <img src="{{ empty($concept->concept_image) ? '' : $concept->concept_image }}">
                    </div>
                    <h5 class="family_yugothib default_16 text-center">
                        {!! $concept->concept_text !!}
                    </h5>
                </div>
            </div>

            <div class="static_card_wrapper card_styles">
                <div class="section_container container_left_helper container_right_helper">
                    <h3 class="size_40 title_mb text_primary text-center family_yugothib">
                        Recommendation
                    </h3>
                    <div class="media_box">
                        <img src="{{ empty($concept->recommendation_image) ? '' : $concept->recommendation_image }}">
                    </div>
                    <h5 class="family_yugothib default_16 text-center">
                        {!! $concept->recommendation_text !!}
                    </h5>
                </div>
            </div>

            <div class="section_container container_left_helper container_right_helper">
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

    @include('well_pedia.user.layout.after-login.footer')
    <script>

        function toMenu(){
            window.location.href = "{{ route('toUserMenu') }}";
        }

    </script>
@endsection('content')
