<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div style="text-align: right; margin: 10px;">
    <a href="{{ route('register') }}">register</a> |
    <a href="{{ route('login') }}">login</a>
</div>

    <title>Dashboard</title>
</head>
<body>
    <h1>ようこそ、{{ Auth::user()->name }}さん！</h1>
    <p>これは管理画面です。</p>
</body>
</html>