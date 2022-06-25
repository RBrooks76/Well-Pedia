@extends('well_pedia.service.layout.service_layout')
@section('content')
    @include('well_pedia.service.layout.navbar')

    <main>
        <section class="top_section_content_wrapper">
            <div class="section_container container_left_helper container_right_helper">
                <div class="row gx-0">
                    <div class="col-lg-6 pe-lg-4 mb-5 mb-lg-0 order-2 order-lg-1">
                        <div class="col_wrapper col_content_wrapper">
                            <h2 class="size_46 mb_5">
                                ココロとカラダの <br>
                                健康を支える
                            </h2>
                            <img class="logo_inner" src="assets/img/well_pedia.png" alt="">
                            <h3 class="mb_4 position-relative mark_text_wrapper">
                                <span class="d-block">福利厚生向け</span>
                                <span class="d-block">オンライン・サービス</span>
                            </h3>
                            <a class="btn_member" href="{{ route('toUserLogin') }}">MEMBER</a>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5 mb-lg-0 order-1 order-lg-2">
                        <div class="col_wrapper">
                            <div class="top_section_img_box">
                                <img src="assets/img/section_top_img.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="health_support_content_wrapper">
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub title_padding ">
                    <div class="d-block">
                        <h3 class=" text-center text_48 mb_5">
                            <img src="assets/img/logo.png" alt="img"> で本質的な健康経営をサポート
                        </h3>
                        <h5 class="default_16 text-center max_width">
                            従業員の健康・安全を守る義務に加え、従業員とのエンゲージメントを高める事が企業に求められる昨今
                            Well-Pediaは本質的な健康経営の実践と更なる進化をサポートするオンライン・プログラム・サービスです。
                            潜在・顕在化された体調不良に伴う労働生産性損失を抑制・改善し、企業と従業員とより高いレベルのエンゲージメントを目指します。
                        </h5>
                    </div>
                </div>
                <div class="section_body">
                    <div class="health_support_row">
                        <div class="col_item">
                            <div class="col_wrapper h-100">
                                <div class="col_title">
                                    <img class="support_img1" src="assets/img/suport1.png" alt="suport1">
                                </div>
                                <div class="col_body">
                                    <h4 class="text-center text_48 font-weight-bold">
                                        従業員の安全 <br>
                                        健康を守る
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col_item">
                            <div class="col_wrapper h-100  d-flex flex-column justify-content-end align-items-center">
                                <div class="col_title">
                                    <img class="support_img2" src="assets/img/suport2.png" alt="suport2">
                                </div>
                                <div class="col_body">
                                    <h4 class="text-center text_48 font-weight-bold">
                                        労働生産性損失を <br>
                                        抑制
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col_item">
                            <div class="col_wrapper h-100  d-flex flex-column justify-content-end align-items-center">
                                <div class="col_title">
                                    <img class="support_img3" src="assets/img/suport3.png" alt="suport3">
                                </div>
                                <div class="col_body">
                                    <h4 class="text-center mt_6 text_48 font-weight-bold">
                                        ワーク・エンゲージメント <br>
                                        レベルUP
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="firmly_content_wrapper">
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub title_padding ">
                    <div class="d-block">
                        <h3 class=" text-center text_48 mb_5">
                            いつでも、どこでも、しっかりと <br>
                            人々の健康により添わせていただきたい
                        </h3>
                    </div>
                </div>
                <div class="section_body">
                    <div class="d-flex flex-wrap flex-xl-nowrap">
                        <div class="flex_box">
                            <div class="media_box">
                                <img src="assets/img/sm_md_device.png" alt="img">
                            </div>
                        </div>
                        <div class="flex_box flex_box_content">
                            <div class="content_title">
                                <h3 class="text_48 mb_35">
                                    <img src="assets/img/logo.png" alt="img"> とは？
                                </h3>
                            </div>
                            <div class="content_body">
                                <h5 class="default_16">
                                    39年の歴史でジュニアからシニアまでのべ100万人以上の人々にフィットネス・プログラムを提供してきた八千代スタジオと提携して『いつまでも自分のありたい姿を実現出来る』コンディショニング・プログラムを開発し、医療機関との提携によるメンタル・コンディショニングのみに留まらず、食のサポート、健康促進の為のツールのご提案により包括的に心身の健康をサポートするサービスとなります。
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="firmly_svg_body">
                    <img src="assets/img/firmly_svg.svg" alt="img">
                </div>
            </div>
        </section>

        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub title_padding ">
                    <div class="d-block">
                        <h3 class=" text-center text_48 mb_5">
                            <img src="assets/img/logo.png" alt="img"> が選ばれる理由
                        </h3>
                    </div>
                </div>
                <div class="section_body">
                    <ul class="list-unstyled list_content_wrapper">
                        <li class="list_item ">
                            <div class="d-flex justify-content-between flex-wrap flex-lg-nowrap">
                                <div class="flex_box">
                                    <div class="media_box">
                                        <img src="assets/img/stock_img1.png" alt="img">
                                    </div>
                                </div>
                                <div class="flex_box">
                                    <div class="content">
                                        <div class="content_title">
                                            <h3 class="text_48">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 14 14">
                                                    <circle id="Ellipse_20" data-name="Ellipse 20" cx="7" cy="7" r="7"
                                                        fill="#0b1f5b" />
                                                </svg>
                                                無料で始められる
                                            </h3>
                                        </div>
                                        <div class="content_body">
                                            <h5 class="default_6">
                                                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list_item">
                            <div class="d-flex justify-content-between flex-wrap flex-lg-nowrap">
                                <div class="flex_box">
                                    <div class="content">
                                        <div class="content_title">
                                            <h3 class="text_48">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 14 14">
                                                    <circle id="Ellipse_20" data-name="Ellipse 20" cx="7" cy="7" r="7"
                                                        fill="#0b1f5b" />
                                                </svg>
                                                無料で始められる
                                            </h3>
                                        </div>
                                        <div class="content_body">
                                            <h5 class="default_6">
                                                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex_box">
                                    <div class="media_box">
                                        <img src="assets/img/stock_img2.png" alt="img">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list_item">
                            <div class="d-flex justify-content-between flex-wrap flex-lg-nowrap">
                                <div class="flex_box">
                                    <div class="media_box">
                                        <img src="assets/img/stock_img3.png" alt="img">
                                    </div>
                                </div>
                                <div class="flex_box">
                                    <div class="content">
                                        <div class="content_title">
                                            <h3 class="text_48">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 14 14">
                                                    <circle id="Ellipse_20" data-name="Ellipse 20" cx="7" cy="7" r="7"
                                                        fill="#0b1f5b" />
                                                </svg>
                                                無料で始められる
                                            </h3>
                                        </div>
                                        <div class="content_body">
                                            <h5 class="default_6">
                                                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </section>

        <section class="works_card_wrapper">
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub sub_sm title_padding ">
                    <div class="d-block">
                        <h1 class="font-weight-bold text-center text_primary ">
                            Works
                        </h1>
                    </div>
                </div>
                <h3 class="text-center size_2">
                    導入実績
                </h3>


                <div class="works_card flex-wrap">
                    <div class="works_card_item mb-3 mb-lg-0 ">
                        <div class="card_media"></div>
                        <div class="card_body">
                            <h5 class="text_48">
                                株式会社●●●
                            </h5>

                            <a href="#" class="hyper_link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13.5" height="12" viewBox="0 0 13.5 12">
                                    <path id="Icon_awesome-external-link-alt" data-name="Icon awesome-external-link-alt"
                                        d="M13.5.562v3a.563.563,0,0,1-.96.4L11.7,3.123,6,8.83a.562.562,0,0,1-.8,0l-.53-.53a.562.562,0,0,1,0-.8L10.377,1.8,9.54.96a.563.563,0,0,1,.4-.96h3A.562.562,0,0,1,13.5.562ZM9.54,6.347l-.375.375a.562.562,0,0,0-.165.4V10.5H1.5V3H7.687a.563.563,0,0,0,.4-.165L8.46,2.46a.563.563,0,0,0-.4-.96H1.125A1.125,1.125,0,0,0,0,2.625v8.25A1.125,1.125,0,0,0,1.125,12h8.25A1.125,1.125,0,0,0,10.5,10.875V6.744A.562.562,0,0,0,9.54,6.347Z"
                                        fill="#6c747a" />
                                </svg>
                                http://●●●●●●
                            </a>
                        </div>
                    </div>
                    <div class="works_card_item mb-3 mb-lg-0 ">
                        <div class="card_media"></div>
                        <div class="card_body">
                            <h5 class="text_48">
                                株式会社●●●
                            </h5>

                            <a href="#" class="hyper_link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13.5" height="12" viewBox="0 0 13.5 12">
                                    <path id="Icon_awesome-external-link-alt" data-name="Icon awesome-external-link-alt"
                                        d="M13.5.562v3a.563.563,0,0,1-.96.4L11.7,3.123,6,8.83a.562.562,0,0,1-.8,0l-.53-.53a.562.562,0,0,1,0-.8L10.377,1.8,9.54.96a.563.563,0,0,1,.4-.96h3A.562.562,0,0,1,13.5.562ZM9.54,6.347l-.375.375a.562.562,0,0,0-.165.4V10.5H1.5V3H7.687a.563.563,0,0,0,.4-.165L8.46,2.46a.563.563,0,0,0-.4-.96H1.125A1.125,1.125,0,0,0,0,2.625v8.25A1.125,1.125,0,0,0,1.125,12h8.25A1.125,1.125,0,0,0,10.5,10.875V6.744A.562.562,0,0,0,9.54,6.347Z"
                                        fill="#6c747a" />
                                </svg>
                                http://●●●●●●
                            </a>
                        </div>
                    </div>
                    <div class="works_card_item mb-3 mb-lg-0 ">
                        <div class="card_media"></div>
                        <div class="card_body">
                            <h5 class="text_48">
                                株式会社●●●
                            </h5>

                            <a href="#" class="hyper_link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13.5" height="12" viewBox="0 0 13.5 12">
                                    <path id="Icon_awesome-external-link-alt" data-name="Icon awesome-external-link-alt"
                                        d="M13.5.562v3a.563.563,0,0,1-.96.4L11.7,3.123,6,8.83a.562.562,0,0,1-.8,0l-.53-.53a.562.562,0,0,1,0-.8L10.377,1.8,9.54.96a.563.563,0,0,1,.4-.96h3A.562.562,0,0,1,13.5.562ZM9.54,6.347l-.375.375a.562.562,0,0,0-.165.4V10.5H1.5V3H7.687a.563.563,0,0,0,.4-.165L8.46,2.46a.563.563,0,0,0-.4-.96H1.125A1.125,1.125,0,0,0,0,2.625v8.25A1.125,1.125,0,0,0,1.125,12h8.25A1.125,1.125,0,0,0,10.5,10.875V6.744A.562.562,0,0,0,9.54,6.347Z"
                                        fill="#6c747a" />
                                </svg>
                                http://●●●●●●
                            </a>
                        </div>
                    </div>
                    <div class="works_card_item mb-3 mb-lg-0 ">
                        <div class="card_media"></div>
                        <div class="card_body">
                            <h5 class="text_48">
                                株式会社●●●
                            </h5>

                            <a href="#" class="hyper_link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13.5" height="12" viewBox="0 0 13.5 12">
                                    <path id="Icon_awesome-external-link-alt" data-name="Icon awesome-external-link-alt"
                                        d="M13.5.562v3a.563.563,0,0,1-.96.4L11.7,3.123,6,8.83a.562.562,0,0,1-.8,0l-.53-.53a.562.562,0,0,1,0-.8L10.377,1.8,9.54.96a.563.563,0,0,1,.4-.96h3A.562.562,0,0,1,13.5.562ZM9.54,6.347l-.375.375a.562.562,0,0,0-.165.4V10.5H1.5V3H7.687a.563.563,0,0,0,.4-.165L8.46,2.46a.563.563,0,0,0-.4-.96H1.125A1.125,1.125,0,0,0,0,2.625v8.25A1.125,1.125,0,0,0,1.125,12h8.25A1.125,1.125,0,0,0,10.5,10.875V6.744A.562.562,0,0,0,9.54,6.347Z"
                                        fill="#6c747a" />
                                </svg>
                                http://●●●●●●
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="news_table_row_content d-block d-lg-flex flex-wrap flex-lg-nowrap">
                    <div class="flex_box news_table_first_row h-auto mb-4 mb-lg-0 ">

                        <div class="h-100 d-flex flex-column">
                            <div class="section_title">
                                <div class="d-block">
                                    <h1 class="font-weight-bold text_primary ">
                                        News
                                    </h1>
                                </div>
                            </div>
                            <h3 class="size_2">
                                お知らせ
                            </h3>
                            <div class="flex_foot pt-2 h-100 d-flex align-items-end">
                                <a href="#">
                                    <h5 class="text_48">
                                        お知らせを見る >>
                                    </h5>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="flex_box mb-4 mb-lg-0">
                        <div class="news_table_wrapper">
                            <!-- this is for table tab -->
                            <div class="table-responsive table_tab">
                                <table>
                                    <thead>
                                        <tr>
                                            <th onclick="tableTabFunc(this, 1)" class="active_th">
                                                すべてのニュース
                                            </th>
                                            <th onclick="tableTabFunc(this, 2)">
                                                お知らせ
                                            </th>
                                            <th onclick="tableTabFunc(this,3)">
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
                                        <table class="table">
                                            <tbody>
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
                                    <!-- pagination -->
                                    <div class="pagination_wrapper my_sizer">
                                        {!! $all->links() !!}
                                    </div>
                                </div>
                                <div class="tableTabItem d-none" id="tableTab2">
                                    <!-- this is for main table -->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
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
                                    <div class="pagination_wrapper my_sizer">
                                        {!! $notices->links() !!}
                                    </div>
                                </div>
                                <div class="tableTabItem d-none" id="tableTab3">
                                    <!-- this is for main table -->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
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
                                    <!-- pagination -->
                                    <div class="pagination_wrapper my_sizer">
                                        {!! $publications->links() !!}
                                    </div>
                                </div>
                            </div>
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
