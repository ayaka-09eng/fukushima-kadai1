@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header-button')
<div class="header__action-button">
    <a class="header__action-button-submit" href="/login">login</a>
</div>
@endsection

@section('content')
<div class="page">
    <div class="registration-page">
        <div class="page-title">
            <h2>Register</h2>
        </div>
        <form class="registration-form" action="{{ route('register') }}" method="post">
            @csrf
            <div class="registration-form__frame">
                <div class="registration-form__item">
                    <div class="registration-form__name">
                        <label class="registration-form__label" for="name">お名前</label>
                        <input class="registration-form__input" type="text" name="name" value="{{ old('name') }}" placeholder="例: 山田　太郎" name="name" id="name">
                    </div>
                    <div class="form__error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="registration-form__email">
                        <label class="registration-form__label" for="email">メールアドレス</label>
                        <input class="registration-form__input" type="text" name="email" value="{{ old('email') }}" placeholder="例: test@example.com" name="email" id="email">
                    </div>
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="registration-form__password">
                        <label class="registration-form__label" for="password">パスワード</label>
                        <input class="registration-form__input" type="text" name="password" placeholder="例: coachtech1106" name="password" id="password">
                    </div>
                    <div class="form__error">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="registration-form__button">
                        <button class="registration-form__button-submit" type="submit">登録</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection