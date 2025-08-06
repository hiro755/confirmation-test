@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact-confirm.css') }}">
@section('content')
<h1>内容確認</h1>

<form method="POST" action="{{ route('contact.send') }}">
    @csrf
    <dl>
        <dt>お名前</dt>
        <dd>{{ $inputs['last_name'] }} {{ $inputs['first_name'] }}</dd>

        <dt>性別</dt>
        <dd>{{ $inputs['gender'] }}</dd>

        <dt>メール</dt>
        <dd>{{ $inputs['email'] }}</dd>

        <dt>電話番号</dt>
        <dd>{{ $inputs['phone'] }}</dd>

        <dt>住所</dt>
        <dd>{{ $inputs['address'] }}</dd>

        <dt>建物名</dt>
        <dd>{{ $inputs['building'] }}</dd>

        <dt>お問い合わせの種類</dt>
        <dd>{{ $categoryName }}</dd>

        <dt>内容</dt>
        <dd>{{ $inputs['content'] }}</dd>
    </dl>

    @foreach ($inputs as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach

    <button type="submit" name="action" value="submit">送信する</button>
    <button type="submit" name="action" value="back">修正する</button>
</form>
@endsection

@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">

<h1>Confirm</h1>

<table class="confirm-table">
    <tr><th>お名前</th><td>{{ $inputs['last_name'] }}　{{ $inputs['first_name'] }}</td></tr>
    <tr><th>性別</th><td>{{ $inputs['gender'] }}</td></tr>
    <tr><th>メールアドレス</th><td>{{ $inputs['email'] }}</td></tr>
    <tr><th>電話番号</th><td>{{ $inputs['phone'] }}</td></tr>
    <tr><th>住所</th><td>{{ $inputs['address'] }}</td></tr>
    <tr><th>建物名</th><td>{{ $inputs['building'] }}</td></tr>
    <tr><th>お問い合わせの種類</th><td>{{ $categoryName }}</td></tr>
    <tr><th>お問い合わせ内容</th><td>{{ $inputs['content'] }}</td></tr>
</table>

<form method="POST" action="{{ route('contact.send') }}">
    @csrf
    @foreach($inputs as $name => $value)
        <input type="hidden" name="{{ $name }}" value="{{ $value }}">
    @endforeach

    <button type="submit" name="action" value="submit">送信</button>
    <button type="submit" name="action" value="back">修正</button>
</form>
@endsection