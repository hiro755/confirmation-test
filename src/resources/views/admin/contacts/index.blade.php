@extends('layouts.app') 

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@section('content')
<div class="container">

    <h1 class="logo">FashionablyLate</h1>
    <h2>Admin</h2>

    <!-- 🔍 検索フォーム -->
    <form method="GET" action="{{ route('admin.contacts.index') }}" class="search-form">
        <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
        <select name="gender">
            <option value="">性別</option>
            <option value="男性" {{ request('gender') == '男性' ? 'selected' : '' }}>男性</option>
            <option value="女性" {{ request('gender') == '女性' ? 'selected' : '' }}>女性</option>
            <option value="その他" {{ request('gender') == 'その他' ? 'selected' : '' }}>その他</option>
        </select>
        <select name="inquiry_type">
            <option value="">お問い合わせの種類</option>
            <option value="商品について">商品について</option>
            <option value="交換について">商品の交換について</option>
        </select>
        <input type="date" name="date" value="{{ request('date') }}">
        <button type="submit">検索</button>
        <a href="{{ route('admin.contacts.index') }}">リセット</a>
    </form>

    <!-- 📄 エクスポートボタン -->
    <form method="GET" action="{{ route('admin.contacts.export') }}">
        <button type="submit">エクスポート</button>
    </form>

    <!-- 📊 テーブル表示 -->
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->gender }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->inquiry_type }}</td>
                    <td>
                        <button class="detail-btn" data-id="{{ $contact->id }}">詳細</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- 🔄 ページネーション -->
    {{ $contacts->links() }}

</div>

<!-- 🧾 モーダルウィンドウ -->
<div id="detail-modal" style="display:none; position:fixed; top:10%; left:30%; background:white; padding:20px; border:1px solid #ccc;">
    <button onclick="document.getElementById('detail-modal').style.display='none'">×</button>
    <h3>お問い合わせ詳細</h3>
    <p>名前: <span id="modal-name"></span></p>
    <p>性別: <span id="modal-gender"></span></p>
    <p>メールアドレス: <span id="modal-email"></span></p>
    <p>お問い合わせの種類: <span id="modal-inquiry"></span></p>

    <form id="delete-form" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">削除</button>
    </form>
</div>

<!-- 💻 JS -->
<script>
document.querySelectorAll('.detail-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        const contactId = this.dataset.id;

        fetch(`/admin/contacts/${contactId}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('modal-name').textContent = data.name;
                document.getElementById('modal-gender').textContent = data.gender;
                document.getElementById('modal-email').textContent = data.email;
                document.getElementById('modal-inquiry').textContent = data.inquiry_type;
                document.getElementById('delete-form').action = `/admin/contacts/${contactId}`;
                document.getElementById('detail-modal').style.display = 'block';
            });
    });
});
</script>
@endsectio