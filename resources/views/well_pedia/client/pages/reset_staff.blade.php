@extends('well_pedia.client.layout.client_layout')
@section('content')
    @include('well_pedia.client.layout.after.navbar')

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub section_title_mb title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary title_mb text_primary">
                            基本情報編集
                        </h3>
                    </div>
                </div>
                <form action="{{ route('onClientStaffReset') }}" method="post" class="">
                    @csrf
                    <input type="hidden" name="id" value="{{ $staff->id }}" >
                    <div class="form_container mb_lg table-responsive  pb-1">
                        <table class="table form_table">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        企業名
                                    </td>
                                    <td>
                                        {{ $staff->company_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        企業コード
                                    </td>
                                    <td>
                                        {{ $staff->company_code }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        社員番号
                                    </td>
                                    <td>
                                        {{ $staff->staff_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        部署
                                    </td>
                                    <td>
                                        {{ $staff->deploy }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        氏名
                                    </td>
                                    <td>
                                       {{ $staff->first_name . ' ' . $staff->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        性別
                                    </td>
                                    <td>
                                        {{ $staff->gender == 1 ? '男' : '女' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        生年月日
                                    </td>
                                    <td>
                                        {{ $staff->birth_year . '年 ' .  $staff->birth_month . '月 ' .  $staff->birth_day . '日'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        メールアドレス
                                    </td>
                                    <td>
                                        {{ $staff->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap">
                                        パスワード
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="form-group w_200">
                                            <input name="password" value="{{ $staff->password }}" type="text" class="form-control">
                                        </div>
                                        @if($errors->has('password'))
                                            <div class="alert alert-danger">
                                                <b>{{ $errors->first('password') }}</b>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form_control_action text-center">
                        <button class="btn_dark btn_green content_mb_100 shadow-0 border-0" type="submit">
                            リセット
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    @include('well_pedia.client.layout.after.footer')
    <script>
        function toEdit(id){
            window.location.href = "{{ route('toClientViewEdit') }}?id=" + id;
        }
    </script>
@endsection('content')

