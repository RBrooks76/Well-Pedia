@extends('well_pedia.service.layout.service_layout')
@section('content')
    @include('well_pedia.service.layout.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_mb title_padding title_border_bottom">
                    <h1 class="text_primary title_mb">
                        News
                    </h1>
                    <h5 class="text_48">
                        お知らせ
                    </h5>
                </div>
            </div>
        </section>

        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_body mt-40">
                    <div class="news_table_wrapper">
                        <!-- this is for table tab -->
                        <div class="table-responsive table_tab">
                            <table class="news-table">
                                <thead>
                                    <tr>
                                        <th onclick="tableTabFunc(this, 1)" class="active_th">
                                            すべてのニュース
                                        </th>
                                        <th onclick="tableTabFunc(this, 2)">
                                            お知らせ
                                        </th>
                                        <th onclick="tableTabFunc(this, 3)">
                                            メディア掲載
                                        </th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                        <div class="tableTabWrapper">
                            <div class="tableTabItem" id="tableTab1">
                                <!-- this is for main table -->
                                <div class="table-responsive">
                                    <table class="table news-table-tbody">
                                        <tbody id="tab0">
                                            @foreach($all as $key => $item)
                                            <tr id="li1{{ $item->id }}">
                                                <td>
                                                    {{ $item->date }}
                                                </td>
                                                <td class="{{ $item->genre == 1 ? '' : 'td_47' }}">
                                                    {{ $item->genre == 1 ? 'お知らせ' : 'メディア掲載'}}
                                                </td>
                                                <td>
                                                    <a href="{{ route('toServiceNewsDetail', 'id=' . $item->id) }}">{{ $item->news_title }}</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pagination_wrapper my_sizer" id="page1">
                                    {!! $all->links() !!}
                                </div>
                            </div>
                            <div class="tableTabItem d-none" id="tableTab2">
                                <!-- this is for main table -->
                                <div class="table-responsive">
                                    <table class="table news-table-tbody">
                                        <tbody id="tab1">
                                            @foreach($notices as $key => $item)
                                            <tr id="li2{{ $item->id }}">
                                                <td>
                                                    {{ $item->date }}
                                                </td>
                                                <td>
                                                    お知らせ
                                                </td>

                                                <td>
                                                    <a href="{{ route('toAdminNewsDetail', 'id=' . $item->id) }}">{{ $item->news_title }}</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- pagination -->
                                <div class="pagination_wrapper my_sizer" id="page2">
                                    {!! $notices->links() !!}
                                </div>
                            </div>
                            <div class="tableTabItem d-none" id="tableTab3">
                                <!-- this is for main table -->
                                <div class="table-responsive">
                                    <table class="table news-table-tbody">
                                        <tbody id="tab2">
                                            @foreach($publications as $key => $item)
                                            <tr id="li3{{ $item->id }}">
                                                <td>
                                                    {{ $item->date }}
                                                </td>
                                                <td class="td_47">
                                                    メディア掲載
                                                </td>
                                                <td>
                                                    <a href="{{ route('toAdminNewsDetail', 'id=' . $item->id) }}">{{ $item->news_title }}</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pagination_wrapper my_sizer" id="page3">
                                    {!! $publications->links() !!}
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
                                <img src="assets/img/mail_icon.png" alt=""> Contact
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
                                平日 &nbsp; &nbsp; 10:00〜17:00
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('well_pedia.service.layout.footer')
    <script>
        function tableTabFunc(val, i) {
            Array.from(val.parentElement.children).forEach(v => {
                v.classList.remove('active_th');
            })
            val.classList.add('active_th');


            // tab content toggling
            // add all d-none
            document.querySelectorAll('.tableTabItem').forEach(v=> v.classList.add('d-none'));
            // single to remove class
            document.querySelector(`#tableTab${i}`).classList.remove('d-none');

        }
    </script>
@endsection('content')
