@extends('layouts.app')

@section('content')
<h1>Contact</h1>

<form method="POST" action="{{ route('contact.confirm') }}">
    @csrf

    <div class="form-group">
        <label>お名前 <span class="required">※</span></label>
        <div style="display: flex; gap: 10px; width: 100%;">
            <input type="text" name="last_name" placeholder="例: 山田">
            <input type="text" name="first_name" placeholder="例: 太郎">
        </div>
    </div>

    <div class="form-group">
        <label>性別 <span class="required">※</span></label>
        <div class="radio-group">
            <label><input type="radio" name="gender" value="男性" {{ old('gender', '男性') == '男性' ? 'checked' : '' }}> 男性</label>
<label><input type="radio" name="gender" value="女性" {{ old('gender') == '女性' ? 'checked' : '' }}> 女性</label>
<label><input type="radio" name="gender" value="その他" {{ old('gender') == 'その他' ? 'checked' : '' }}> その他</label>
        </div>
    </div>

    <div class="form-group">
        <label>メールアドレス <span class="required">※</span></label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
    </div>

    <div class="form-group">
        <label>電話番号 <span class="required">※</span></label>
        <div class="phone-input">
            <input type="text" name="tel1" value="{{ old('tel1') }}" placeholder="080">
<input type="text" name="tel2" value="{{ old('tel2') }}" placeholder="1234">
<input type="text" name="tel3" value="{{ old('tel3') }}" placeholder="5678">
        </div>
    </div>

    <div class="form-group">
        <label>住所 <span class="required">※</span></label>
        <input type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
    </div>

    <div class="form-group">
        <label>建物名</label>
    <input type="text" name="building" value="{{ old('building') }}" placeholder="例: 千駄ヶ谷マンション101">

    </div>

    <div class="form-group">
        <label>お問い合わせの種類 <span class="required">※</span></label>
        <select name="category_id">
            <option value="">選択してください</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
    {{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>お問い合わせ内容 <span class="required">※</span></label>
        <textarea name="content" placeholder="お問い合わせ内容をご記載ください">{{ old('content') }}</textarea>
    </div>

    <button type="submit">確認画面</button>
</form>
@endsection