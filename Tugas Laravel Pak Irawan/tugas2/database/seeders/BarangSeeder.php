<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Buku Tulis', 'harga' => 5000, 'stok' => 50],
            ['nama' => 'Pulpen', 'harga' => 3000, 'stok' => 80],
            ['nama' => 'Penggaris', 'harga' => 4000, 'stok' => 40],
            ['nama' => 'Pensil 2B', 'harga' => 2500, 'stok' => 100],
            ['nama' => 'Penghapus', 'harga' => 1500, 'stok' => 60],
        ];

        foreach ($data as $barang) {
            Barang::create($barang);
        }
    }
}
