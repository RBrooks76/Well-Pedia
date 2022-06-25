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
                            <div class="row gy-3 gy-lg-0">
                                <div class="col-lg-6">
                                    <div class="col_wrapper">
                                        <div class="form_container d-flex flex-wrap flex-sm-nowrap  align-items-center">
                                            <button class="btn_be_action mb-3 mb-sm-0 text-nowrap action_orange mr_3" onclick="toRegisterAdmin()">
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
                            </div>
                        </div>
                        <div class="table_body_wrapper">
                            <div class="table-responsive">
                                <table class="table staff_table no_border no_td_right_border table_td_last_p_0">
                                    <thead>
                                        <tr class="staff_table_sm_rows rows_resizer">
                                            <th>番号</th>
                                            <th>
                                                <input type="checkbox" name="" id="selectAll">
                                            </th>
                                            <th>
                                                管理ユーザー名
                                            </th>
                                            <th>
                                                メールアドレス
                                            </th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $key => $admin)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>
                                                @if(!$admin->role)
                                                    <input class="checkbox" type="checkbox" id="{{ $admin->id }}">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('toAdminEdit', 'id=' . $admin->id) }}">{{ $admin->username }}</a>
                                            </td>
                                            <td>
                                                {{ $admin->email }}
                                            </td>
                                            <td>
                                                <label class='{{ $admin->role ==1 ? "special-role" : "normal-role" }}'>{{ $admin->role ==1 ? "特別" : "正常" }}</label>
                                            </td>
                                            <td class="text-end">
                                                @if(!$admin->role)
                                                    <button class="btn btn-outline red-mint uppercase" data-toggle="confirmation" data-placement="top" data-title="Sure?"  data-nsfw-filter-status="swf" onclick="onDeleteAdmin({{ $admin->id }})">
                                                        <span>×削除する</span>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('well_pedia.admin.layout.after_login.footer')
    <script>
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


        function toRegisterAdmin(){
            window.location.href = "{{ route('toAdminRegister') }}";
        }

        function onDeleteAdmin(id){
            $.confirm({
                title: '確認!',
                content: '本当に削除しますか？',
                buttons: {
                    確認: {
                        text: '確認',
                        btnClass: 'btn-blue',
                        action: function(){
                            $.ajax({
                                type : 'POST',
                                url : "{{ route('onDeleteAdmin') }}",
                                data : {
                                    id : id
                                },
                                success:function(){
                                    $("#" + id).parents('tr').hide();
                                    toastr.success("削除成功!");
                                }
                            });
                        }
                    },
                    キャンセル: function () {
                    },
                }
            });
        }

        $('#onDeleteChecked').click(function(){
            $.confirm({
                title: '確認!',
                content: '本当に削除しますか？',
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
                                url : "{{ route('onCheckedDeleteAdmin') }}",
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
        });

        function onDeleteChecked(){

        }
    </script>
@endsection('content')
