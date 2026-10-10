<?php

namespace App\Services;

use App\Models\Barang;
use Illuminate\Support\Collection;

/**
 * Keranjang disimpan di SESSION (server). Yang disimpan hanya [id_barang => jumlah].
 * Nama dan harga selalu diambil dari tabel barang.
 */
class KeranjangService
{
    private const KEY = 'keranjang';

    public function semua(): array
    {
        return session(self::KEY, []);
    }

    public function jumlahItem(): int
    {
        return array_sum($this->semua());
    }

    public function tambah(Barang $barang): void
    {
        $keranjang = $this->semua();
        $sekarang = $keranjang[$barang->id] ?? 0;

        if ($sekarang < $barang->stok) {
            $keranjang[$barang->id] = $sekarang + 1;
            session([self::KEY => $keranjang]);
        }
    }

    public function ubah(Barang $barang, int $selisih): void
    {
        $keranjang = $this->semua();

        if (! isset($keranjang[$barang->id])) {
            return;
        }

        $baru = min($keranjang[$barang->id] + $selisih, $barang->stok);

        if ($baru <= 0) {
            unset($keranjang[$barang->id]); // jumlah 0 -> item dihapus otomatis
        } else {
            $keranjang[$barang->id] = $baru;
        }

        session([self::KEY => $keranjang]);
    }

    public function hapus(Barang $barang): void
    {
        $keranjang = $this->semua();
        unset($keranjang[$barang->id]);
        session([self::KEY => $keranjang]);
    }

    public function kosongkan(): void
    {
        session()->forget(self::KEY);
    }

    public function items(): Collection
    {
        $keranjang = $this->semua();
        $barang = Barang::whereIn('id', array_keys($keranjang))->get()->keyBy('id');

        return collect($keranjang)
            ->filter(fn ($jumlah, $id) => $barang->has($id))
            ->map(fn ($jumlah, $id) => [
                'barang' => $barang[$id],
                'jumlah' => $jumlah,
                'subtotal' => $barang[$id]->harga * $jumlah,
            ])
            ->values();
    }

    public function total(Collection $items): int
    {
        return $items->sum('subtotal');
    }
}
