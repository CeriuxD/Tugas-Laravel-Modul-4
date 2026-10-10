@extends('layout')

@section('content')
    <h2>Keranjang belanja (tanpa login)</h2>

    @forelse ($items as $item)
        <div class="baris">
            <span>
                <strong>{{ $item['barang']->nama }}</strong><br>
                Rp {{ number_format($item['barang']->harga, 0, ',', '.') }} x {{ $item['jumlah'] }}
                = Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
            </span>
            <span style="display:flex; gap:6px; align-items:center;">
                <form method="POST" action="{{ route('keranjang.ubah', $item['barang']) }}">
                    @csrf
                    <input type="hidden" name="aksi" value="kurang">
                    <button type="submit">-</button>
                </form>
                {{ $item['jumlah'] }}
                <form method="POST" action="{{ route('keranjang.ubah', $item['barang']) }}">
                    @csrf
                    <input type="hidden" name="aksi" value="tambah">
                    <button type="submit">+</button>
                </form>
                <form method="POST" action="{{ route('keranjang.hapus', $item['barang']) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">hapus</button>
                </form>
            </span>
        </div>
    @empty
        <p>Keranjang masih kosong.</p>
    @endforelse

    @if ($items->isNotEmpty())
        <h3>Total Rp {{ number_format($total, 0, ',', '.') }}</h3>
        <form method="POST" action="{{ route('keranjang.kosongkan') }}">
            @csrf
            <button type="submit">Kosongkan keranjang</button>
        </form>
    @endif

    <p><a href="{{ route('index') }}">&laquo; Kembali ke daftar barang</a></p>
@endsection
