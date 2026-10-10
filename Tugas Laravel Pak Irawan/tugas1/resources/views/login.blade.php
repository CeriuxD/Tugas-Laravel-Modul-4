<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>
        body { font-family: sans-serif; max-width: 360px; margin: 60px auto; }
        input { width: 100%; padding: 8px; margin: 4px 0 12px; box-sizing: border-box; }
        .error { background: #fee2e2; color: #991b1b; padding: 8px; border-radius: 4px; margin-bottom: 12px; }
    </style>
</head>
<body>
    <h1>Login</h1>
    <p>Masuk untuk membuka dashboard</p>

    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="username">Username</label>
        <input id="username" name="username" value="{{ old('username') }}" autofocus>

        <label for="password">Password</label>
        <input id="password" type="password" name="password">

        <button type="submit">Masuk</button>
    </form>
</body>
</html>
