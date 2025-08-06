<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="logo">FashionablyLate</h1>
        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}" class="form-box">
            @csrf

            <div class="form-group">
                <label>メールアドレス</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>パスワード</label>
                <input type="password" name="password" placeholder="例: coachtech06">
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="submit-btn">ログイン</button>
        </form>
    </div>
</body>
</html>