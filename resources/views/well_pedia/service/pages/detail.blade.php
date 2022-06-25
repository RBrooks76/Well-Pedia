@extends('well_pedia.service.layout.service_layout')
@section('content')
    @include('well_pedia.service.layout.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_mb title_padding title_border_bottom d-flex justify-content-between">
                    <div>
                        <h1 class="text_primary title_mb">
                            News
                        </h1>
                        <h5 class="text_48">
                            お知らせ
                        </h5>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="kokoro_card_details">
                    <div class="row ">
                        <div class="col-12">
                            <div class="col_wrapper card_wrapper">
                                <div class="card_body">
                                    <div class="d-flex align-items-center card_date">
                                        <span class="font_14" style="margin-right: 4rem">{{ $news->date }}</span>
                                        <span class="font_14 {{ $news->genre == 1 ? 'color-f2' : 'color-47' }}" >{{ $news->genre == 1 ? 'お知らせ' : 'メディア掲載' }}</span>
                                    </div>

                                    <h4 class="pb_with_border_2 mb_4 text_48">
                                        {{ $news->news_title }}
                                    </h4>

                                    <p class="paragraph">
                                        {!! $news->news_caption !!}
                                    </p>
                                </div>
                                @if($news->news_url != null)
                                <div class="card_media">
                                    <div class="media_wrapper">
                                        <img src="{{ $news->news_url }}" width="100%" height="100%">
                                    </div>
                                </div>
                                @endif
                                <div class="card_footer">
                                    <div class="pagination_wrapper">
                                        {{-- <ul class="pagination_list list-unstyled d-flex flex-wrap">
                                            <li>
                                                <a href="#">
                                                    <i class="fas fa-angle-left"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fas fa-angle-right"></i>
                                                </a>
                                            </li>
                                        </ul> --}}
                                    </div>
                                    <h5 class="text-center extra_foot">
                                        <a href="{{ route('toServiceNews') }}" class="text_48">
                                            <i class="fas fa-angle-left"></i>
                                            <i class="fas fa-angle-left "></i> 一覧へ戻る
                                        </a>
                                    </h5>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <section id="contact_section">
            <div class="section_container container_left_helper container_right_helper">
                <div class="row justify-content-center section_title_content">
                    <div class="col-md-10 text-center">
                        <h3>
                            ココロとカラダの健康を支えるためにはじめてみましょう。
                        </h3>
                        <div class="content text-center">
                            <a href="#" class="btn_light">
                                <img src="../assets/img/mail_icon.png" alt=""> Contact
                            </a>
                            <h2>
                                <svg xmlns="http://www.w3.org/2000/svg" width="29.447" height="29.447"
                                    viewBox="0 0 29.447 29.447">
                                    <path id="Icon_awesome-phone-alt" data-name="Icon awesome-phone-alt"
                                        d="M28.607,20.809l-6.442-2.761a1.38,1.38,0,0,0-1.61.4L17.7,21.93A21.318,21.318,0,0,1,7.511,11.739L11,8.887a1.377,1.377,0,0,0,.4-1.61L8.633.835a1.39,1.39,0,0,0-1.582-.8L1.07,1.416A1.38,1.38,0,0,0,0,2.761,26.684,26.684,0,0,0,26.687,29.447a1.38,1.38,0,0,0,1.346-1.07l1.38-5.981a1.4,1.4,0,0,0-.806-1.587Z"
                                        transform="translate(0 0)" fill="#fff" />
                                </svg>
                                000-000-0000
                            </h2>
                            <p>
                                平日  &nbsp; &nbsp; 10:00〜17:00
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('well_pedia.service.layout.footer')
@endsection('content')
