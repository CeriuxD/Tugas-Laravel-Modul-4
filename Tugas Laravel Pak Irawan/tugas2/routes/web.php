<?php

use App\Http\Controllers\TokoController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/index');

Route::get('/index', [TokoController::class, 'index'])->name('index');
Route::get('/keranjang', [TokoController::class, 'keranjang'])->name('keranjang');

Route::post('/keranjang/kosongkan', [TokoController::class, 'kosongkan'])->name('keranjang.kosongkan');
Route::post('/keranjang/{barang}/tambah', [TokoController::class, 'tambah'])->name('keranjang.tambah');
Route::post('/keranjang/{barang}/ubah', [TokoController::class, 'ubah'])->name('keranjang.ubah');
Route::delete('/keranjang/{barang}', [TokoController::class, 'hapus'])->name('keranjang.hapus');
