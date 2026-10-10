<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Alat Tulis</title>
    <style>
        body { font-family: sans-serif; max-width: 640px; margin: 24px auto; }
        header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ccc; }
        .baris { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #eee; }
        .gambar { width: 48px; height: 48px; background: #e5e7eb; display: inline-block; vertical-align: middle; margin-right: 8px; text-align: center; line-height: 48px; font-size: 11px; }
    </style>
</head>
<body>
    @php($jumlahKeranjang = app(\App\Services\KeranjangService::class)->jumlahItem())
    <header>
        <h1><a href="{{ route('index') }}" style="text-decoration:none;color:inherit">Toko Alat Tulis</a></h1>
        <a href="{{ route('keranjang') }}">Keranjang ({{ $jumlahKeranjang }})</a>
    </header>

    @yield('content')
</body>
</html>
