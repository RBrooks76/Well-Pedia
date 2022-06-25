@extends('well_pedia.admin.layout.basic_layout')
@section('content')
    @include('well_pedia.admin.layout.after_login.navbar')
    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub title_sub_140 title_padding ">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="mb-0">
                            管理ユーザー一覧
                        </h3>
                    </div>
                </div>
                <div class="section_body">
                    <div class="staff_list_table_wrapper mb_foot">
                        <div class="table_header_wrapper mb-1_4">
                            @if(Session::has('error-message'))
                                <div class="alert alert-danger text-center">
                                    <b>{{ Session::get('error-message') }}</b>
                                </div>
                            @endif
                            <div class="row gy-3 gy-lg-0">
                                <div class="col-lg-6">
                                    <div class="col_wrapper">
                                        <div class="form_container d-flex flex-wrap flex-sm-nowrap  align-items-center">
                                            <button class="btn_be_action mb-3 mb-sm-0 text-nowrap action_orange mr_3" onclick="toAdminClientRegister()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16">
                                                    <g id="Group_196" data-name="Group 196"
                                                        transform="translate(-191 -369)">
                                                        <circle id="Ellipse_7" data-name="Ellipse 7" cx="8" cy="8" r="8"
                                                            transform="translate(191 369)" fill="#fff" />
                                                        <path id="Icon_awesome-plus" data-name="Icon awesome-plus"
                                                            d="M7.429,5.393H4.857V2.821a.571.571,0,0,0-.571-.571H3.714a.571.571,0,0,0-.571.571V5.393H.571A.571.571,0,0,0,0,5.964v.571a.571.571,0,0,0,.571.571H3.143V9.679a.571.571,0,0,0,.571.571h.571a.571.571,0,0,0,.571-.571V7.107H7.429A.571.571,0,0,0,8,6.536V5.964A.571.571,0,0,0,7.429,5.393Z"
                                                            transform="translate(195 370.75)" fill="#ff771e" />
                                                    </g>
                                                </svg>
                                                登録
                                            </button>

                                            <button class="btn_be_action action_primary mb-3 mb-sm-0 text-nowrap ml_6" id="onDeleteChecked" onclick="onDeleteChecked()">
                                                削除
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    {!! $clients->links() !!}
                                </div>
                            </div>
                        </div>
                        <div class="table_body_wrapper">
                            <div class="table-responsive">
                                <table class="table staff_table no_border no_td_right_border table_td_last_p_0">
                                    <thead>
                                        <tr class="staff_table_sm_rows rows_resizer">
                                            {{-- <th>番号</th> --}}
                                            <th style="width:10rem">
                                                <input type="checkbox" name="" id="selectAll">
                                            </th>
                                            <th style="width:70rem">
                                                企業コード
                                            </th>
                                            <th style="width:70rem">
                                                パスワード
                                            </th>
                                            <th style="width: 70rem">
                                                社名
                                            </th>
                                            <th style="width: 10rem">

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($clients as $key => $client)
                                        <tr>
                                            {{-- <td>{{ ++$key }}</td> --}}
                                            <td>
                                                <input type="checkbox" name="" id="{{ $client->id }}">
                                            </td>
                                            <td>
                                                {{ $client->company_code }}
                                            </td>
                                            <td>
                                                {{ $client->password }}
                                            </td>
                                            <td>
                                                <a href="{{ route('toAdminClientView', 'id=' . $client->id) }}">{{ $client->company_name }}</a>
                                            </td>
                                            <td class="text-end">
                                                <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-nsfw-filter-status="swf" onclick="onDeleteClient({{ $client->id }})" >
                                                   ×削除する
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            {!! $clients->links() !!}
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

        $("#selectAll").click(function() {
            $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
        });

        $("input[type=checkbox]").click(function() {
            if (!$(this).prop("checked")) {
                $("#selectAll").prop("checked", false);
            }
        });

        function toAdminClientRegister(){
            window.location.href = "{{ route('toAdminClientRegister') }}";
        }

        function onDeleteChecked(){
            $.confirm({
                title: '確認!',
                content: 'クライアントを削除すると、それに関連付けられているスタッフも削除されます。<br>削除してもよろしいですか？',
                buttons: {
                    確認: {
                        text: '確認',
                        btnClass: 'btn-blue',
                        action: function(){
                            var items = $("input[type=checkbox]:checked");
                            var ids = [];
                            var cnt = 0;
                            for(var i = 0; i < items.length; i++){
                                if(items[i].id != 'selectAll'){
                                    ids[cnt] = items[i].id;
                                    cnt++;
                                }
                            }
                            $.ajax({
                                type : 'POST',
                                url : "{{ route('onDeleteCheckedClient') }}",
                                data : {
                                    ids : ids
                                },
                                success:function(){
                                    for(var j = 0; j < cnt; j++){
                                        $("input[type=checkbox]:checked").parents('tr').hide();
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

        function onDeleteClient(id){
            $.confirm({
                title: '確認!',
                content: 'クライアントを削除すると、それに関連付けられているスタッフも削除されます。<br>削除してもよろしいですか？',
                buttons: {
                    確認: {
                        text: '確認',
                        btnClass: 'btn-blue',
                        action: function(){
                            $.ajax({
                                type : 'POST',
                                url : "{{ route('onDeleteClient') }}",
                                data : {
                                    id : id
                                },
                                success:function(){
                                    $("#" + id).parents('tr').hide();
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
    </script>

@endsection('content')
