@extends('layout')

@section('content')
    <h2>Daftar barang</h2>

    @foreach ($daftarBarang as $barang)
        <div class="baris">
            <span>
                <span class="gambar">img</span>
                {{ $barang->nama }} &mdash; Rp {{ number_format($barang->harga, 0, ',', '.') }}
                <small>(stok {{ $barang->stok }})</small>
            </span>
            <form method="POST" action="{{ route('keranjang.tambah', $barang) }}">
                @csrf
                <button type="submit">Masukkan ke keranjang</button>
            </form>
        </div>
    @endforeach
@endsection
