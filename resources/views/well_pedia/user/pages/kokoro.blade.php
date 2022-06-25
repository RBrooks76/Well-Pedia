@extends('well_pedia.user.layout.user_layout')
@section('content')
    @include('well_pedia.user.layout.after-login.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_mb title_padding title_border_bottom">
                    <h1 class="text_primary title_mb">
                        KOKORO SOLUTION
                    </h1>
                    <h5 class="text_48">
                        カラダソリューション
                    </h5>
                </div>
            </div>
        </section>

        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="kokoro_card_wrapper">
                    <div class="row g-5">
                        @foreach($kokoros as $key => $item)
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="col_wrapper card_wrapper">
                                <div class="card_title">
                                    @if($item->image_url != '')
                                        <img src = "{{$item->image_url}}"  style="width: 100%; height: 100%">
                                    @endif
                                </div>
                                <div class="card_body">
                                    <span class="card_date">{{ $item->date }}</span>
                                    <h6>
                                        {{ $item->title }}
                                    </h6>
                                    <p class="paragraph">
                                        {{ $item->content . '...' }}
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
                <div class="pagination_wrapper">
                    {!! $kokoros->links() !!}
                </div>
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
