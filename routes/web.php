<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\OwnerDashboardController;
use Illuminate\Support\Facades\Route;

// --- RUTE OTENTIKASI & TAMU ---
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect()->route('login');
});

// --- RUTE MIDDLEWARE (WAJIB LOGIN) ---
Route::middleware(['auth', 'verified'])->group(function () {

    // ==========================================
    //          -- KHUSUS ROLE: OWNER --
    // ==========================================

    // Dashboard Utama Owner
    Route::get('/owner/dashboard', [OwnerDashboardController::class, 'index'])->name('owner.dashboard');

    // Daftar Semua Stok Barang Gudang
    Route::get('/owner/barang', [OwnerDashboardController::class, 'daftarBarang'])->name('owner.barang');

    // Laporan Mutasi Barang Masuk (Singkron dengan OwnerDashboardController)
    Route::get('/owner/laporan/masuk', [OwnerDashboardController::class, 'laporanMasuk'])->name('owner.laporan.masuk');

    // Laporan Mutasi Barang Keluar
    Route::get('/owner/laporan/keluar', [OwnerDashboardController::class, 'laporanKeluar'])->name('owner.laporan.keluar');

    // Laporan Produk Terlaris / Sering Keluar
    Route::get('/owner/laporan/terlaris', [OwnerDashboardController::class, 'laporanTerlaris'])->name('owner.laporan.terlaris');

    // Manajemen Kelola Akun User (Admin & Staff) oleh Owner
    Route::get('/owner/users', [OwnerDashboardController::class, 'kelolaUser'])->name('owner.users');
    Route::post('/owner/users/tambah', [OwnerDashboardController::class, 'storeUser'])->name('owner.users.store');
    Route::put('/owner/users/edit/{id}', [OwnerDashboardController::class, 'updateUser'])->name('owner.users.update');
    Route::patch('/owner/users/toggle/{id}', [OwnerDashboardController::class, 'toggleAktifUser'])->name('owner.users.toggle');


    // ==========================================
    //          -- KHUSUS ROLE: ADMIN --
    // ==========================================

    // Dashboard Utama Admin
    Route::get('/admin/dashboard', [BarangController::class, 'dashboard'])->name('dashboard');

    // Manajemen Master Barang (CRUD Gudang)
    Route::get('/gudang', [BarangController::class, 'index'])->name('barang.index');
    Route::post('/gudang/simpan', [BarangController::class, 'store'])->name('barang.simpan');
    Route::put('/gudang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/gudang/hapus/{id}', [BarangController::class, 'destroy'])->name('barang.hapus');

    // Fitur Alur Cepat Barang Masuk (Otomatis Tambah Kategori & Supplier)
    Route::get('/admin/barang-masuk', [BarangController::class, 'indexMasuk'])->name('barang.masuk');
    Route::post('/admin/barang-masuk', [BarangController::class, 'simpanBarangMasuk'])->name('barang.masuk.simpan');

    // Fitur Barang Keluar
    // Fitur Barang Keluar
    Route::get('/admin/barang-keluar', [BarangController::class, 'barangKeluar'])->name('barang.keluar');
    Route::post('/admin/barang-keluar/simpan', [BarangController::class, 'simpanBarangKeluar'])->name('barang.keluar.simpan');

    // Manajemen Manual Kategori & Supplier Admin
    Route::get('/admin/supplier', [BarangController::class, 'indexSupplier'])->name('supplier.index');
    Route::get('/admin/kategori', [BarangController::class, 'indexKategori'])->name('kategori.index');

    Route::post('/admin/supplier/simpan', [BarangController::class, 'simpanSupplier'])->name('supplier.simpan');
    Route::post('/admin/kategori/simpan', [BarangController::class, 'simpanKategori'])->name('kategori.simpan');
    Route::delete('/admin/kategori/hapus/{id}', [BarangController::class, 'hapusKategori'])->name('kategori.hapus');
});
