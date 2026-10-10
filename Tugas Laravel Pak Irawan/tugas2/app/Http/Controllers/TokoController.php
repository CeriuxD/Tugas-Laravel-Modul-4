<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Services\KeranjangService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TokoController extends Controller
{
    public function index(): View
    {
        return view('index', ['daftarBarang' => Barang::orderBy('id')->get()]);
    }

    public function keranjang(KeranjangService $keranjang): View
    {
        $items = $keranjang->items();

        return view('keranjang', [
            'items' => $items,
            'total' => $keranjang->total($items),
        ]);
    }

    public function tambah(Barang $barang, KeranjangService $keranjang): RedirectResponse
    {
        $keranjang->tambah($barang);

        return back();
    }

    public function ubah(Request $request, Barang $barang, KeranjangService $keranjang): RedirectResponse
    {
        $keranjang->ubah($barang, $request->input('aksi') === 'kurang' ? -1 : 1);

        return back();
    }

    public function hapus(Barang $barang, KeranjangService $keranjang): RedirectResponse
    {
        $keranjang->hapus($barang);

        return back();
    }

    public function kosongkan(KeranjangService $keranjang): RedirectResponse
    {
        $keranjang->kosongkan();

        return back();
    }
}
