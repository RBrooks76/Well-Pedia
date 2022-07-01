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
                <div class="kokoro_card_details">
                    <div class="row ">
                        <div class="col-12">
                            <div class="col_wrapper card_wrapper">
                                <div class="card_body">
                                    <span class="card_date">{{ $kokoro->date }}</span>

                                    <h4 class="pb_with_border mb_4">
                                        {{ $kokoro->title }}
                                    </h4>

                                    <p class="paragraph">
                                        {!! $kokoro->content !!}
                                    </p>
                                </div>
                                <div class="card_media">
                                    @if($kokoro->image_url == '')
                                        <div></div>
                                    @else
                                        <div class="media_wrapper">
                                            <img src="{{ $kokoro->image_url}}" style = 'width:100%; height:100%'>
                                        <div>
                                    @endif
                                </div>

                                <div class="card_footer">
                                    {{-- <div class="pagination_wrapper">
                                        <ul class="pagination_list list-unstyled d-flex flex-wrap">
                                            <li>
                                                <a href="#">
                                                    <i class="fas fa-angle-left    "></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fas fa-angle-right    "></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> --}}


                                    <h5 class="text-center extra_foot">
                                        <a href="{{ route('toKokoro') }}" class="text_48">
                                            <i class="fas fa-angle-left    "></i>
                                            <i class="fas fa-angle-left    "></i> 一覧へ戻る
                                        </a>
                                    </h5>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub section_title_mb title_padding title_border_bottom">
                    <h3 class="text_primary text_primary">
                        関連記事
                    </h3>
                </div>
            </div>
        </section>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="kokoro_card_wrapper">
                    <div class="row g-5">
                        @foreach($related as $item)
                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="col_wrapper card_wrapper">
                                    <div class="card_title">
                                    </div>
                                    <div class="card_body">
                                        <span class="card_date">{{$item->date}}</span>
                                        <h6>
                                            {{$item->title}}
                                        </h6>
                                        <p class="paragraph">
                                            {!! $item->content !!}
                                        </p>
                                        <div class="card_footer">
                                            <a href="{{ route('toKokoroSolution', ['id' => $item->id]) }}" class="btn_read_more">
                                                READ MORE
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
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
            </div>
        </section>
    </main>

    <script>
        function toMovieList(){
            history.back();
        }

        function toMenu(){
            window.location.href = "{{ route('toUserMenu') }}";
        }
    </script>
    @include('well_pedia.user.layout.after-login.footer')
@endsection('content')

