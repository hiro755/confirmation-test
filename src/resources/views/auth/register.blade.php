<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | FashionablyLate</title>
    <link rel="stylesheet" href="/public/css/register.css">
</head>
<body>
    <div class="container">
        <h1 class="logo">FashionablyLate</h1>
        <h2>Register</h2>

        <form method="POST" action="{{ route('register') }}" class="form-box">
            @csrf

            <div class="form-group">
                <label>お名前</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="例: 山田 太郎">
                @error('name') <div class="error">{{ $message }}</div> @enderror
            </div>

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

            <button type="submit" class="submit-btn">登録</button>
        </form>
    </div>
</body>
</html>