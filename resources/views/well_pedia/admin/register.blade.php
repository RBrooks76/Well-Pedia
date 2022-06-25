@extends('well_pedia.admin.layout.basic_layout')
@section('content')

    <section class="main-content">
        <div class="register-title d-flex">
            <span>管理ユーザー登録</span>
        </div>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <form class="register-content" method="POST" action="{{ route('toAdminRegister') }}">
            @csrf
            <div class="regiser-input d-flex">
                <span>管理ユーザー名</span>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="regiser-input d-flex">
                <span>メールアドレス</span>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="regiser-input d-flex">
                <span>パスワード </span>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="regiser-button">
                <button class="btn btn-warning register-btn">登録する</button>
            </div>
        </form>
    </section>
@endsection('content')
