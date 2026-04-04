<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

// Ubah halaman utama (/) agar langsung ke halaman gudang
Route::get('/', [BarangController::class, 'index']);

// Tambahkan ini jika belum ada
Route::get('/gudang', [BarangController::class, 'index']);
Route::post('/gudang/simpan', [BarangController::class, 'store'])->name('barang.simpan');