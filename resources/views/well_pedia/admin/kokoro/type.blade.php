@extends('well_pedia.admin.layout.basic_layout')
@section('content')
@include('well_pedia.admin.layout.after_login.navbar')
<main>
    <section>
        <div class="section_container container_left_helper container_right_helper">
            <div class="section_title section_title_sub title_sub_140 section_title_mb title_padding title_border_bottom">
                <div>

                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="text_primary">
                        KOKOROタイプを追加
                    </h3>
                </div>
            </div>
            @if(Session::has('success-message'))
                <div class="alert alert-success text-center">
                    <b>{{ Session::get('success-message') }}</b>
                </div>
            @endif
            <form action="{{ route('onAdminAddKokoroType') }}" method="post" class="">
                @csrf
                <div class="form_container  table-responsive  pb-1">
                    <table class="table form_table_td_sizer sizer_sm form_table">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold text-nowrap width-20rem">
                                    タイプを名 <span class="text_red ms-2"> ※ </span>
                                </td>
                                <td>
                                    <div class="form-group w_220">
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" onchange="onChangeName(this)" style="{{ $errors->has('name') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                    </div>
                                    @if($errors->has('name'))
                                        <div class="w-400" style="{{ $errors->has('name') ? 'color:#D9214E!important' : '' }}">{{ $errors->first('name') }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-nowrap width-20rem">
                                    メ優先順位 <span class="text_red ms-2"> ※ </span>
                                </td>
                                <td>
                                    <div class="form-group w_220">
                                        <input type="text" class="form-control" name="priority" value="{{ old('priority') }}" onchange="onChangeEmail(this)" style="{{ $errors->has('priority') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                    </div>
                                    <div class="w-400" style="{{ $errors->has('priority') ? 'color:#D9214E!important' : '' }}">FROM 3 ~~~~~</div>
                                    @if($errors->has('priority'))
                                        <div class="w-400" style="{{ $errors->has('priority') ? 'color:#D9214E!important' : '' }}">{{ $errors->first('priority') }}</div>
                                    @endif
                                </td>
                            </tr>
                            {{-- <tr>
                                <td class="font-weight-bold text-nowrap width-20rem">
                                    パスワード <span class="text_red ms-2"> ※ </span>
                                </td>
                                <td>
                                    <div class="form-group w_200">
                                        <input type="text" class="form-control" name="password" value="{{ old('password') }}" style="{{ $errors->has('password') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                    </div>
                                    <div class="w-400" style="{{ $errors->has('password') ? 'color:#D9214E!important' : '' }}">パスワードは8〜12文字である必要があります。</div>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <div class="form_control_action text-center">
                    <button class="btn_dark btn_orange   border-0 btn_mt btn_mb_2" type="submit">
                        登録する
                    </button>
                </div>
            </form>
            <div>
                <div class="section_title section_title_sub title_sub_140 title_padding ">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="mb-0">
                            KOKOROタイプをー一覧
                        </h3>
                    </div>
                </div>
                <div class="section_body">
                    <div class="staff_list_table_wrapper mb_foot">
                        <div class="table_body_wrapper">
                            <div class="table-responsive">
                                <table class="table staff_table no_border no_td_right_border table_td_last_p_0">
                                    <thead>
                                        <tr class="staff_table_sm_rows rows_resizer kokoro_list">
                                            <th>
                                                <input type="checkbox" name="" id="selectAll">
                                            </th>
                                            <th>
                                                優先順位
                                            </th>
                                            <th width="100px">
                                                タイプを名
                                            </th>
                                            <th>

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($types as $item)
                                            <tr id="type{{$item->id}}">
                                                <td></td>
                                                <td>{{$item->priority}}</td>
                                                <td>{{$item->name}}</td>
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
                            <div class="col-lg-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
                            url: "{{ route('onAdminDeleteKokoroType') }}",
                            type: 'POST',
                            data: {
                                id: id
                            },
                            success: function(result) {
                                $('#type' + id).hide(true);
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
@include('well_pedia.admin.layout.after_login.footer')
@endsection('content')
