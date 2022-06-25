@extends('well_pedia.admin.layout.basic_layout')
@section('content')
    @include('well_pedia.admin.layout.after_login.navbar');

    <main>
        <section>
            <div class="section_container container_left_helper container_right_helper">
                <div class="section_title section_title_sub title_sub_140 section_title_mb title_padding title_border_bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="text_primary">
                            管理ユーザー編集
                        </h3>
                    </div>
                </div>
                <form action="{{ route('onAdminEdit') }}" method="post" class="">
                    @csrf
                    <input type="hidden" name="id" value="{{ $result->id }}">
                    <div class="form_container  table-responsive  pb-1">
                        <table class="table form_table_td_sizer sizer_sm form_table">
                            <tbody>

                                <tr>
                                    <td class="font-weight-bold text-nowrap width-20rem">
                                        管理ユーザー名
                                        <span class="text_red ms-2">※ </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="username" value="{{ $result->username }}" style="{{ $errors->has('username') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        @if($errors->has('username'))
                                            <span class="error font-15rem">{{ $errors->first('username') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap width-20rem">
                                        メールアドレス
                                        <span class="text_red ms-2"> ※ </span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="email" class="form-control" name="email" value="{{ $result->email }}" style="{{ $errors->has('email') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        @if($errors->has('email'))
                                            <span class="error font-15rem">{{ $errors->first('email') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-nowrap width-20rem">
                                        パスワード
                                        <span class="text_red ms-2"> ※</span>
                                    </td>
                                    <td>
                                        <div class="form-group w_200">
                                            <input type="text" class="form-control" name="password" value="{{ $result->password }}" style="{{ $errors->has('password') ? 'border : 1px solid #D9214E!important;' : '' }}">
                                        </div>
                                        @if($errors->has('password'))
                                            <span class="error font-15rem">{{ $errors->first('password') }}</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form_control_action text-center">
                        <button class="btn_dark btn_green   border-0 btn_mt btn_mb_2" type="submit">
                            更新する
                        </button>
                    </div>
                </form>
            </div>
        </section>

    </main>

    @include('well_pedia.admin.layout.after_login.footer');
@endsection('content')
