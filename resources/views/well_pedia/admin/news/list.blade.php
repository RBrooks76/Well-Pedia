@extends('well_pedia.admin.layout.basic_layout')
@section('content')
    @include('well_pedia.admin.layout.after_login.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub title_sub_140 section_title_mb title_padding title_border_bottom"
                    style="margin-bottom: 3.2rem">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary">
                            ニュース管理
                        </h3>
                        <button class="btn_be_action mb-3 mb-sm-0 text-nowrap action_orange" onclick="toRegisterNews()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <g id="Group_196" data-name="Group 196" transform="translate(-191 -369)">
                                    <circle id="Ellipse_7" data-name="Ellipse 7" cx="8" cy="8" r="8"
                                        transform="translate(191 369)" fill="#fff" />
                                    <path id="Icon_awesome-plus" data-name="Icon awesome-plus"
                                        d="M7.429,5.393H4.857V2.821a.571.571,0,0,0-.571-.571H3.714a.571.571,0,0,0-.571.571V5.393H.571A.571.571,0,0,0,0,5.964v.571a.571.571,0,0,0,.571.571H3.143V9.679a.571.571,0,0,0,.571.571h.571a.571.571,0,0,0,.571-.571V7.107H7.429A.571.571,0,0,0,8,6.536V5.964A.571.571,0,0,0,7.429,5.393Z"
                                        transform="translate(195 370.75)" fill="#ff771e" />
                                </g>
                            </svg>
                            登録
                        </button>
                    </div>
                </div>
                {{-- <div class="section_body">
                    <div class="form_container">
                        <div class="row gx-3 gy-4 mb-3">
                            <div class="col-12">
                                <div class="d-flex flex-wrap flex-sm-nowrap align-items-center">
                                    <div class="form-group w-100 mb-3 mb-sm-0">
                                        <input type="text" class="form-control w-100 h_40_sizer" id="searchkey" name="searchkey">
                                    </div>
                                    <button class="btn_be_action client_action_primary sm_size ms-sm-3" onclick="onAdminSearchNews()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.999" height="18.002"
                                            viewBox="0 0 17.999 18.002">
                                            <path id="Icon_awesome-search" data-name="Icon awesome-search"
                                                d="M17.754,15.564l-3.505-3.505a.843.843,0,0,0-.6-.246h-.573a7.309,7.309,0,1,0-1.266,1.266v.573a.843.843,0,0,0,.246.6l3.505,3.505a.84.84,0,0,0,1.192,0l.995-.995a.848.848,0,0,0,0-1.2ZM7.313,11.813a4.5,4.5,0,1,1,4.5-4.5A4.5,4.5,0,0,1,7.313,11.813Z"
                                                fill="#fff"></path>
                                        </svg> 検索
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                {{-- <div class="section_title section_title_sub  title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary me-3">
                            ニュース一覧
                        </h3>
                    </div>
                </div> --}}
                <div class="section_body mt-100">
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
                                                    <a href="{{ route('toAdminNewsDetail', 'id=' . $item->id) }}">{{ $item->news_title }}</a>
                                                </td>
                                                <td>
                                                    <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf"onclick="onDeleteNews({{ $item->id }})">
                                                        ×削除する
                                                    </button>
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
                                                    {{ $item->news_title }}
                                                </td>
                                                <td>
                                                    <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf"onclick="onDeleteNews({{ $item->id }})">
                                                        ×削除する
                                                    </button>
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
                                                    {{ $item->news_title }}
                                                </td>
                                                <td>
                                                    <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf"onclick="onDeleteNews({{ $item->id }})">
                                                        ×削除する
                                                    </button>
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
    </main>
    @include('well_pedia.admin.layout.after_login.footer')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
        });

        function toRegisterNews() {
            window.location.href = "{{ route('toAdminNewsRegister') }}";
        }

        function toEdit(id) {
            window.location.href = "{{ route('toAdminVideoEdit') }}?id=" + id;
        }

        function onDeleteNews(id) {
            $.confirm({
                title: '確認!',
                content: '本当に削除しますか？',
                buttons: {
                    確認: {
                        text: '確認',
                        btnClass: 'btn-blue',
                        action: function(){
                            $.ajax({
                                url: "{{ route('onAdminDeleteNews') }}",
                                type: 'POST',
                                data: {
                                    id: id
                                },
                                success: function(result) {
                                    if(tab == 0){
                                        $('#li1' + id).hide(true);
                                        console.log('#li1' + id);
                                    } else if( tab == 1){
                                        $('#li2' + id).hide(true);
                                        console.log('#li2' + id);
                                    } else if(tab == 2){
                                        $('#li3' + id).hide(true);
                                        console.log('#li3' + id);
                                    }
                                     toastr.success("削除成功!");
                                }
                            })
                        }
                    },
                    キャンセル: function () {
                    },
                }
            });
        }

        function onAdminSearchNews(){
            console.log(tab);
            console.log($('#searchkey').val());
            $.ajax({
                type : "POST",
                url : "{{ route('onAdminSearchNews') }}",
                data :  {
                    tab : tab,
                    key : $('#searchkey').val()
                },success:function(result){
                    console.log(result);
                    var html = "";
                    if( tab == 0){
                        for(var i = 0; i < result.length; i++){
                            html += `<tr>`+
                                        `<td>`+ result[i]['date'] +`</td>`+
                                        `<td class="`+ (result[i]['genre'] == 1 ? '' : 'td_47') +`">`+ (result[i]['genre'] == 1 ? 'お知らせ' : 'メディア掲載') +`</td>`+
                                        `<td>`+ result[i]['news_title'] +`</td>`+
                                    `</tr>`;
                        }
                        tab = tab +1;
                        $('#tab'+tab).html(html);
                        $('#page1').html('');
                    } else if(tab == 1){
                        for(var i = 0; i < result.length; i++){
                            html += `<tr>`+
                                        `<td>`+ result[i]['date'] +`</td>`+
                                        `<td>お知らせ</td>`+
                                        `<td>`+ result[i]['news_title'] +`</td>`+
                                    `</tr>`;

                        }
                        tab = tab +1;
                        console.log(tab);
                        $('#tab'+tab).html(html);
                        $('#page2').html('');
                    } else if(tab == 2){
                        for(var i = 0; i < result.length; i++){
                            html += `<tr>`+
                                        `<td>`+ result[i]['date'] +`</td>`+
                                        `<td class="td_47">メディア掲載</td>`+
                                        `<td>`+ result[i]['news_title'] +`</td>`+
                                    `</tr>`;

                        }
                        tab = tab +1;
                        $('#tab'+tab).html(html);
                        $('#page3').html('');
                    }
                }
            })
        }

        var tab = 0;
        function tableTabFunc(val, i) {
            tab = i-1;
            Array.from(val.parentElement.children).forEach(v => {
                v.classList.remove('active_th');
            })
            val.classList.add('active_th');


            // tab content toggling
            // add all d-none
            document.querySelectorAll('.tableTabItem').forEach(v=> v.classList.add('d-none'));
            // single to remove class
            document.querySelector(`#tableTab${i}`).classList.remove('d-none');

            // window.location.href = "{{ route('toAdminNews') }}";

        }
    </script>
@endsection('content')
