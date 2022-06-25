@extends('well_pedia.user.layout.user_layout')
@section('content')
    @include('well_pedia.user.layout.after-login.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub section_title_mb mb_sm title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary title_mb text_primary">
                            マイページ
                        </h3>
                        <a href="{{ route('toUserEdit') . '?id=' . $result->id }}" class="text_f7 font_14 reset-password">→基本情報編集</a>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="d-flex align-items-center">
                    <h3 class="font-weight-bold" id="year">
                        2022年
                    </h3>
                    &nbsp;&nbsp;&nbsp;
                    <h1 class="font-weight-bold" id="month">1</h1>
                    <h3 class="font-weight-bold">
                        月の進捗度
                    </h3>
                </div>
                <div class="d-flex align-items-center my-5 flex-wrap">
                    <h4 class="me-5">
                        達成ポイント
                    </h4>
                    <div class="box d-flex align-items-center me-5">
                        <span style="font-size: 4rem;" class="text_red">
                            <b> {{ $point->point > 0 ? $point->point : 0}} </b>
                        </span>
                        <h4 class="my-0 align-bottom">
                            <sub> Pt</sub>
                        </h4>
                    </div>
                    <div class="box bg_d0 rounded-circle d-flex justify-content-center align-items-center"
                        style="width: 12rem; height: 12rem;">
                        <h4>
                            イラスト
                        </h4>
                    </div>
                </div>
                <div class="user_progress_box">
                    <div class="progress_box">
                        <div class="progress_limit" style="--limit-count: {{ $point->point > 0 ? $point->point : 0 }}%; max-width: 100%">
                            <div class="box d-flex align-items-center text-white font-weight-bold">
                                <span class="progress_count">
                                    <b>{{ $point->point > 0 ? $point->point : 0 }}</b>
                                </span>
                                <h4 class="my-0 align-bottom progress_count_name">
                                    <sub> Pt</sub>
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="progress_counter d-flex justify-content-between">
                        <span>0</span>
                        <span>50</span>
                        <span>100</span>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="content_list_wrapper">
                    <h2 class="heading_title">
                        動画閲覧履歴
                    </h2>
                    <ul class="list-unstyled content_list">
                        @if(count($videos) < 7)
                            @for($i = 0; $i < count($videos); $i++)
                                <li id="id{{ $videos[$i]->id }}">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="box">
                                            <h4>
                                                <b>{{ $videos[$i]->video_title }}</b>
                                            </h4>
                                            <div class="list_foot d-flex align-items-center">
                                                <span>閲覧日： {{ $videos[$i]->date }}</span>
                                                <a href="#" class="text_f7">CATEGORY</a>
                                            </div>
                                        </div>
                                        {{-- <div class="box">
                                            <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf"onclick="onDeleteVideoHistory({{ $videos[$i]->id }})">
                                                ×削除する
                                            </button>
                                        </div> --}}
                                    </div>
                                </li>
                            @endfor
                        @endif
                        @if(count($videos) >= 7)
                            @for($i = 0; $i < count($videos) - 5; $i++)
                                <li id="id{{ $videos[$i]->id }}">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="box">
                                            <h4>
                                                <b>{{ $videos[$i]->video_title }}</b>
                                            </h4>
                                            <div class="list_foot d-flex align-items-center">
                                                <span>閲覧日： {{ $videos[$i]->date }}</span>
                                                <a href="#" class="text_f7">CATEGORY</a>
                                            </div>
                                        </div>
                                        {{-- <div class="box">
                                            <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf"onclick="onDeleteVideoHistory({{ $videos[$i]->id }})">
                                                ×削除する
                                            </button>
                                        </div> --}}
                                    </div>
                                </li>
                            @endfor
                            <div id="readme" class="collapse">
                                @for($i = count($videos) - 5; $i < count($videos); $i++)
                                    <li id="id{{ $videos[$i]->id }}">
                                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                                            <div class="box">
                                                <h4>
                                                    <b>{{ $videos[$i]->video_title }}</b>
                                                </h4>
                                                <div class="list_foot d-flex align-items-center">
                                                    <span>閲覧日： {{ $videos[$i]->date }}</span>
                                                    <a href="#" class="text_f7">CATEGORY</a>
                                                </div>
                                            </div>
                                            {{-- <div class="box">
                                                <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf" onclick="onDeleteVideoHistory({{ $videos[$i]->id }})">
                                                    ×削除する
                                                </button>
                                            </div> --}}
                                        </div>
                                    </li>
                                @endfor
                            </div>
                        @endif
                    </ul>
                </div>
                @if(count($videos) >= 7)
                    <div class="btn_action text-center">
                        <button class="btn_action_more btn_mt btn_mb" type="button" data-mdb-toggle="collapse" data-mdb-target="#readme">
                            READ MORE
                        </button>
                    </div>
                @endif
            </div>
        </section>

        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub section_title_mb mb_sm  title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between align-items-center">
                        <h3 class="text_primary title_mb text_primary">
                            健康ステータス情報
                        </h3>
                        <a href="{{ route('toUserEdit') . '?id=' . $result->id }}" class="btn_dark">変更する</a>
                    </div>
                </div>
                <form action="" method="post" class="">
                    <div class="form_container mb_lg table-responsive  pb-1">
                        <table class="table form_table">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        企業名
                                    </td>
                                    <td>
                                        {{ $company_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        企業コード
                                    </td>
                                    <td>
                                        {{ $result->company_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        社員番号
                                    </td>
                                    <td>
                                        {{ $result->staff_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        部署
                                    </td>
                                    <td>
                                        {{ $result->deploy }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        氏名
                                    </td>
                                    <td>
                                        {{ $result->full_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        性別
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center" id="gender">
                                            <div
                                                class="form-group me-3 d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" name="gender" id="form_checkbox1" value='1'
                                                    class="">
                                                <label for="form_checkbox1" class="ms-2">男</label>
                                            </div>

                                            <div class="form-group d-flex align-items-center form_checkbox_label_group">
                                                <input type="radio" name="gender" id="form_checkbox2" value="0"
                                                    class="">
                                                <label for="form_checkbox2" class="ms-2">女</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        生年月日
                                    </td>
                                    <td>
                                        {{ $result->birthday }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        メールアドレス
                                    </td>
                                    <td>
                                        {{ $result->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        パスワード
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="d-flex align-items-center">
                                            {{ $result->password }}

                                            <a href="{{ route('toUserResetPassword'). '?id=' . $result->id }}" class="text_f7 font_14 ms-5 reset-password">→パスワードを変更する</a>

                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- <div class="form_control_action text-center">
                            <button class="btn_be_action sm_size action_mt_4">
                                登録する
                            </button>
                        </div> --}}
                    </div>
                </form>
            </div>
        </section>

        <section>
            <div class="section_container container_left_helper container_right_helper">

                <div class="section_title section_title_sub section_title_mb title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary title_mb text_primary">
                            健康ステータス情報
                        </h3>
                    </div>
                </div>

                <div class="section_body">
                    <div class="section_table_wrapper" style="background-color: white!important">
                        {{-- <h2 class="table_overlap">
                            管理者登録 <br>
                            ※ユーザー変更不可
                        </h2> --}}
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            身長
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->height }}
                                        </td>
                                        <td>
                                            体重
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->weight }}
                                        </td>
                                        <td>
                                            血液型
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->blood_type }}
                                        </td>
                                        <td>
                                            BMI
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->bmi }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            腹囲
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->body_hole }}
                                        </td>
                                        <td>
                                            ⾎圧値・上
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->blood_pressure_over }}
                                        </td>
                                        <td>
                                            ⾎圧値・下
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->blood_pressure_down }}
                                        </td>
                                        <td>
                                            総タンパク(TP)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->tp }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            アルブミン(ALB)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->alb }}
                                        </td>
                                        <td>
                                            AST(GOT)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->ast }}
                                        </td>
                                        <td>
                                            ALT(GPT)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->alt }}
                                        </td>
                                        <td>
                                            γ-GT(γ-GTP)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->gtp }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            総コレステロール(TC)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->tc }}
                                        </td>
                                        <td>
                                            HDL-コレステロール
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->hdl }}
                                        </td>
                                        <td>
                                            LDL-コレステロール
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->ldl }}
                                        </td>
                                        <td>
                                            中性脂肪(TG)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->tg }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            尿素窒素(BUN)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->bun }}
                                        </td>
                                        <td>
                                            クレアチニン(CRE)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->cre }}
                                        </td>
                                        <td>
                                            尿酸(UA)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->ua }}
                                        </td>
                                        <td>
                                            血糖(GLU)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->glu }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ヘモグロビンA1c(HbA1c)
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->hba1c }}
                                        </td>
                                        <td>
                                            視力（左）
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->sight_left }}
                                        </td>
                                        <td>
                                            視力（右）
                                        </td>
                                        <td class="text_bold">
                                            {{ $health->sight_right }}
                                        </td>
                                        <td>
                                            視力（右）
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        $(document).ready(function() {
            $('#gender').find("input[value='{{ $result->gender }}']").prop('checked', true);

            var date = new Date();
            var year = date.getFullYear();
            var month = date.getMonth() + 1;
            $('#year').html(year + '年');
            $('#month').html(month);
        })
    </script>
    @include('well_pedia.user.layout.after-login.footer')
@endsection('content')
