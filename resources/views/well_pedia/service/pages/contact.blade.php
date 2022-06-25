@extends('well_pedia.service.layout.service_layout')
@section('content')
    @include('well_pedia.service.layout.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_mb title_padding title_border_bottom">
                    <h1 class="text_primary title_mb">
                        CONTACT
                    </h1>
                    <h5 class="text_48">
                        お問い合わせ
                    </h5>
                </div>
            </div>
        </section>
        <section class="jumbotron_user_info pd_sizer">
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_body">
                    <h4 class="text_primary font-weight-bold">
                        お電話でのお問い合わせ
                    </h4>

                    <h2 class="text_primary text_number">
                        <svg xmlns="http://www.w3.org/2000/svg" width="29.447" height="29.447"
                            viewBox="0 0 29.447 29.447">
                            <path id="Icon_awesome-phone-alt" data-name="Icon awesome-phone-alt"
                                d="M28.607,20.809l-6.442-2.761a1.38,1.38,0,0,0-1.61.4L17.7,21.93A21.318,21.318,0,0,1,7.511,11.739L11,8.887a1.377,1.377,0,0,0,.4-1.61L8.633.835a1.39,1.39,0,0,0-1.582-.8L1.07,1.416A1.38,1.38,0,0,0,0,2.761,26.684,26.684,0,0,0,26.687,29.447a1.38,1.38,0,0,0,1.346-1.07l1.38-5.981a1.4,1.4,0,0,0-.806-1.587Z"
                                transform="translate(0 0)" fill="#0b1f5b" />
                        </svg>
                        000-000-0000
                    </h2>
                    <p class="text_primary">
                        平日 &nbsp; &nbsp; 10:00〜17:00
                    </p>
                </div>
            </div>
        </section>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title text-center mb_md">
                    <h4 class="text_primary font-weight-bold mb_3">
                        メールフォームでのお問い合わせ
                    </h4>
                    <h5 class="default_16 text_01 ">
                        メールフォームでのご相談、お問い合わせは、以下の必要事項を入力のうえ、お問い合わせください。 <br>
                        2～3営業日以内に、担当よりメールにて返信させていただきます。 <br>
                        *が付いているものは必須です。 <br>
                    </h5>
                </div>
            </div>
        </section>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <form action="" method="post" class="">
                    <div class="form_container mb-2 table-responsive  pb-1 ">

                        <table class="table form_table policy_table_form">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">
                                        会社名 <span class="text_red ms-3">*</span>
                                    </td>
                                    <td>
                                        <div class="form-group w-100">
                                            <input type="text" placeholder="例）株式会社◯◯◯◯" class="form-control">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold">
                                        部署名 <span class="text_red ms-3">*</span>
                                    </td>
                                    <td>
                                        <div class="form-group w-100">
                                            <input type="text" placeholder="例）◯◯部" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">
                                        お名前
                                        <span class="text_red ms-3">*</span>
                                    </td>
                                    <td>
                                        <div class="form-group w-100">
                                            <input placeholder="例）山田 太郎" type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">
                                        電話番号
                                        <span class="text_red ms-3">*</span>

                                    </td>
                                    <td>
                                        <div class="form-group w-100">
                                            <input placeholder="000-0000-0000" type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">
                                        メールアドレス
                                        <span class="text_red ms-3">*</span>
                                    </td>
                                    <td>
                                        <div class="form-group w-100">
                                            <input placeholder="example@gmail.com" type="email" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">
                                        お問い合わせ種別
                                        <span class="text_red ms-3">*</span>
                                    </td>
                                    <td>
                                        <div class="d-block">
                                            <div
                                                class="form-group  d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" checked="" name="myradio" id="form_checkbox1"
                                                    class="">
                                                <label for="form_checkbox1" class="ms-2">サービスについて </label>
                                            </div>

                                            <div class="form-group d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" name="myradio" id="form_checkbox2" class="">
                                                <label for="form_checkbox2" class="ms-2">パスワードを忘れた方</label>
                                            </div>

                                            <div class="form-group d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" name="myradio" id="form_checkbox3" class="">
                                                <label for="form_checkbox3" class="ms-2">取材のご相談</label>
                                            </div>

                                            <div class="form-group d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" name="myradio" id="form_checkbox4" class="">
                                                <label for="form_checkbox4" class="ms-2">その他のお問い合わせ</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">
                                        お問い合わせ内容
                                        <span class="text_red ms-3">*</span>
                                    </td>
                                    <td>
                                        <div class="form-group w-100">
                                            <textarea class="form-control text_area_control"></textarea>

                                            <div class="d-flex align-items-center policy_checkbox_wrapper">
                                                <input type="checkbox" name="" id="policy_agree">
                                                <a href="#">
                                                    プライバシーポリシー
                                                </a>
                                                <label for="policy_agree" class="text_01">に同意する</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form_control_action text-center ">
                        <button class="btn_be_action lg_size_32 action_mt shadow-0 mb_10">
                            ログイン
                        </button>
                    </div>
                </form>
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
@endsection('content')
