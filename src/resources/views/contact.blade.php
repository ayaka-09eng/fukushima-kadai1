@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="page">
    <div class="contact-page">
        <div class="page-title">
            <h2>Contact</h2>
        </div>
        <form class="contact-form" action="/confirm" method="post">
            @csrf
            <div class="contact-form__group">
                <div class="contact-form__item">
                    <fieldset>
                        <legend class="contact-form__legend">
                            お名前<span class="contact-form__required">※</span>
                        </legend>
                        <div class="contact-form__group-content">
                            <div class="contact-form__name-input">
                                <input type="text" name="last_name" value="{{ old('last_name', session('contact_input.last_name')) }}" placeholder="例: 山田">
                            </div>
                            <div class="form__error">
                                @error('last_name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="contact-form__group-content">
                            <div class="contact-form__name-input">
                                <input type="text" name="first_name" value="{{ old('first_name', session('contact_input.first_name')) }}" placeholder="例: 太郎">
                            </div>
                            <div class="form__error">
                                @error('first_name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="contact-form__item">
                    <fieldset>
                        <legend class="contact-form__legend">
                            性別<span class="contact-form__required">※</span>
                        </legend>
                        <div class="contact-form__group-content">
                            <label>
                                <input class="contact-form__radio" type="radio" name="gender" value="0" {{ old('gender', session('contact_input.gender')) == '0' ? 'checked' : '' }}>
                                男性
                            </label>
                            <label>
                                <input class="contact-form__radio" type="radio" name="gender" value="1" {{ old('gender', session('contact_input.gender')) == '1' ? 'checked' : '' }}>
                                女性</label>
                            <label>
                                <input class="contact-form__radio" type="radio" name="gender" value="2" {{ old('gender', session('contact_input.gender')) == '2' ? 'checked' : '' }}>
                                その他
                            </label>
                            <div class="form__error">
                                @error('gender')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="contact-form__item">
                    <label class="contact-form__label" for="email">
                        メールアドレス<span class="contact-form__required">※</span>
                    </label>
                    <div class="contact-form__group-content">
                        <div class="contact-form__input">
                            <input type="text" name="email" value="{{ old('email', session('contact_input.email')) }}" id="email" placeholder="例: test@example.com">
                        </div>
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="contact-form__item">
                    <fieldset>
                        <legend class="contact-form__legend">
                            電話番号<span class="contact-form__required">※</span>
                        </legend>
                        <div class="contact-form__group-content">
                            <div class="contact-form__tel-input">
                                <input type="text" name="tel[]" value="{{ old('tel.0', session('contact_input.tel.0')) }}" maxlength="3" placeholder="080">
                                <span class="contact-form__tel-separator">-</span>
                                <input type="text" name="tel[]" value="{{ old('tel.1', session('contact_input.tel.1')) }}" maxlength="4" placeholder="1234">
                                <span class="contact-form__tel-separator">-</span>
                                <input type="text" name="tel[]" value="{{ old('tel.2', session('contact_input.tel.2')) }}" maxlength="4" placeholder="5678">
                            </div>
                            @foreach (range(0, 2) as $i)
                            @error("tel.$i")
                            <div class="form__error">
                                {{ $message }}
                            </div>
                            @break
                            @enderror
                            @endforeach
                        </div>
                    </fieldset>

                </div>
                <div class="contact-form__item">
                    <label class="contact-form__label" for="address">
                        住所<span class="contact-form__required">※</span>
                    </label>
                    <div class="contact-form__group-content">
                        <div class="contact-form__input">
                            <input type="text" name="address" value="{{ old('address', session('contact_input.address')) }}" id="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
                        </div>
                        <div class="form__error">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="contact-form__item">
                    <label class="contact-form__label" for="building">建物名</label>
                    <div class="contact-form__input">
                        <input type="text" name="building" value="{{ old('building', session('contact_input.building')) }}" id="building" placeholder="例: 千駄ヶ谷マンション101">
                    </div>
                </div>
                <div class="contact-form__item">
                    <label class="contact-form__label" for="category">
                        お問い合わせの種類<span class="contact-form__required">※</span>
                    </label>
                    <div class="contact-form__group-content">
                        <div class="contact-form__select">
                            <select class="contact-form__category-select" name="category_id" id="category">
                                <option value="">選択してください</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}" {{ old('category_id', session('contact_input.category_id')) == $category['id'] ? 'selected' : '' }}>{{ $category['content'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form__error">
                            @error('category_id')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="contact-form__item__detail">
                    <label class="contact-form__label" for="detail">
                        お問い合わせ内容<span class="contact-form__required">※</span>
                    </label>
                    <div class="contact-form__group-content">
                        <div class="contact-form__textarea">
                            <textarea name="detail" id="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail', session('contact_input.detail')) }}</textarea>
                        </div>
                        <div class="form__error">
                            @error('detail')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="contact-form__button">
                    <button class="contact-form__button-submit" type="submit">確認画面</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection