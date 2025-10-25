@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-button')
<div class="header__action-button">
    <a class="header__action-button-submit" href="/register">register</a>
</div>
@endsection

@section('content')
<div class="page">
    <div class="login-page">
        <div class="page-title">
            <h2>Login</h2>
        </div>
        <form class="login-form" action="/login" method="post">
            @csrf
            <div class="registration-form__frame">
                <div class="login-form__item">
                    <div class="login-form__email">
                        <label class="login-form__label" for="email">メールアドレス</label>
                        <input class="login-form__input" type="text" placeholder="例: test@example.com" name="email" value="{{ old('email') }}" id="email">
                    </div>
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="login-form__password">
                        <label class="login-form__label" for="password">パスワード</label>
                        <input class="login-form__input" type="text" placeholder="例: coachtech1106" name="password" id="password">
                    </div>
                    <div class="form__error">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="login-form__button">
                        <button class="login-form__button-submit" type="submit">ログイン</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection