@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

@section('header-button')
<form class="header__action-button" action="{{ route('logout') }}" method="post">
    @csrf
    <button class="header__action-button-submit">logout</button>
</form>
@endsection

@section('content')
<div class="page">
    <div class="admin-page">
        <div class="page-title">
            <h2>Admin</h2>
        </div>
        <div class="action-list">
            <form class="search__action" action="/admin/search" method="get">
                @csrf
                <input class="search-form__keyword" type="text" name="keyword" value="{{ request()->input('keyword') }}" placeholder="名前やメールアドレスを入力してください">
                <select class="search-button__gender" name="gender">
                    <option value="" disabled selected>性別</option>
                    <option value="all" {{ request()->input('genders') == 'all' ? 'selected' : '' }}>全て</option>
                    <option value="0" {{ request()->input('genders') == 0 ? 'selected' : '' }}>男性</option>
                    <option value="1" {{ request()->input('genders') == 1 ? 'selected' : '' }}>女性</option>
                    <option value="2" {{ request()->input('genders') == 2 ? 'selected' : '' }}>その他</option>
                </select>
                <select class=" search-button__category" name="category">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}" {{ request()->input('category') == $category['id'] ? 'selected' : '' }}>{{ $category['content'] }}</option>
                    @endforeach
                </select>
                <input class="search-button__date" type="date" name="date" value="{{ request()->input('date') }}">
                <button class="search-button__all">検索</button>
            </form>
            <form class="reset__action" action="/admin">
                @csrf
                <button class="reset__action-button">リセット</button>
            </form>
        </div>
        <div class="list-controls">
            <form class="list-controls__export" action="" method="">
                @csrf
                <button>エクスポート</button>
            </form>
            <div class="list-controls__pagination">
                {{ $contacts->links('vendor.pagination.simple-custom') }}
            </div>
        </div>
        <div class="admin-table">
            <table class="admin-table__inner">
                <tr class="admin-table__row">
                    <th class="admin-table__header">
                        <span class="admin-table__header-title">お名前</span>
                    </th>
                    <th class="admin-table__header">
                        <span class="admin-table__header-title">性別</span>
                    </th>
                    <th class="admin-table__header">
                        <span class="admin-table__header-title">メールアドレス</span>
                    </th>
                    <th class="admin-table__header">
                        <span class="admin-table__header-title">お問い合わせの種類</span>
                    </th>
                </tr>
                @foreach ($contacts as $contact)
                <tr class="admin-table__row">
                    <td class="admin-table__item">
                        <input type="text" value="{{ $contact['last_name'].'　'.$contact['first_name'] }}" disabled>
                    </td>
                    <td class="admin-table__item">
                        <input type="text" value="{{ $contact['gender'] === 0 ? '男性' : ($contact['gender'] === 1 ? '女性' : 'その他') }}" disabled>
                    </td>
                    <td class="admin-table__item">
                        <input type="text" value="{{ $contact['email'] }}" disabled>
                    </td>
                    <td class="admin-table__item">
                        <div class="admin-table__item__detail">
                            <input type="text" value="{{ $contact['category']['content'] }}" disabled>
                            <button class="admin-table__item__detail-button">詳細</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="modal" id="easyModal">
        <div class="modal-content">
            <span class="modalEnd">&#9447;</span>
            <div class="details-screen">
                <div class="details-screen__item">
                    <span>お名前</span>
                    <input class="details-screen__item-input" type="text">
                </div>
                <div class="details-screen__item">
                    <span>性別</span>
                    <input class="details-screen__item-input" type="text">
                </div>
                <div class="details-screen__item">
                    <span>メールアドレス</span>
                    <input class="details-screen__item-input" type="text">
                </div>
                <div class="details-screen__item">
                    <span>電話番号</span>
                    <input class="details-screen__item-input" type="text">
                </div>
                <div class="details-screen__item">
                    <span>住所</span>
                    <input class="details-screen__item-input" type="text">
                </div>
                <div class="details-screen__item">
                    <span>建物名</span>
                    <input class="details-screen__item-input" type="text">
                </div>
                <div class="details-screen__item">
                    <span>お問い合わせの種類</span>
                    <input class="details-screen__item-input" type="text">
                </div>
                <div class="details-screen__item">
                    <span>お問い合わせ内容</span>
                    <textarea class="details-screen__item-textarea" name="" id=""></textarea>
                </div>
                <form class="delete-form__button" action="" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="delete-form__button">
                        <button class="delete-form__button-submit"></button>
                        <input type="hidden" name="" id="">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection