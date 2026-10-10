<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <style>
        body { font-family: sans-serif; max-width: 480px; margin: 60px auto; }
        header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ccc; }
    </style>
</head>
<body>
    <header>
        <h1>Dashboard</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </header>

    <h2>Selamat datang, {{ $user->nama_lengkap }}!</h2>
    <p>Halaman ini hanya bisa dibuka setelah login.</p>
    <p>Username: {{ $user->username }}</p>
</body>
</html>
