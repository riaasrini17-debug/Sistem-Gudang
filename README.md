# 🏭 Sistem Gudang — Aplikasi Manajemen Stok

> Sistem informasi manajemen gudang berbasis web yang dikembangkan untuk membantu proses operasional admin dan owner dalam mengelola stok barang, transaksi masuk/keluar, supplier, kategori, serta laporan inventaris secara real-time.

Project ini dibuat sebagai **Minimum Viable Product (MVP)** untuk Ujian Akhir Semester (UAS) mata kuliah **Rekayasa Perangkat Lunak Tahun Akademik 2025/2026**.

---

## 📋 Daftar Isi

1. [Deskripsi Project](#1-deskripsi-project)
2. [Informasi Project](#2-informasi-project)
3. [Anggota Kelompok dan Kontribusi](#3-anggota-kelompok-dan-kontribusi)
4. [Ruang Lingkup Sistem](#4-ruang-lingkup-sistem)
5. [Fitur MVP](#5-fitur-mvp)
6. [Tech Stack](#6-tech-stack)
7. [Arsitektur Sistem Layered Architecture](#7-arsitektur-sistem-layered-architecture)
8. [Design Patterns yang Digunakan](#8-design-patterns-yang-digunakan)
9. [Struktur Folder Project](#9-struktur-folder-project)
10. [Database dan ERD](#10-database-dan-erd)
11. [Cara Menjalankan Project Secara Lokal](#11-cara-menjalankan-project-secara-lokal)
12. [Testing, Linter, dan Formatting](#12-testing-linter-dan-formatting)
13. [GitFlow dan Conventional Commits](#13-gitflow-dan-conventional-commits)
14. [Dokumentasi Video Individu](#14-dokumentasi-video-individu)
15. [Dokumentasi Tambahan](#15-dokumentasi-tambahan)
16. [Status MVP](#16-status-mvp)
17. [Checklist Pengumpulan UAS](#17-checklist-pengumpulan-uas)
18. [Referensi Arsitektur dan Design Pattern](#18-referensi-arsitektur-dan-design-pattern)
19. [Lisensi](#19-lisensi)

---

## 1. Deskripsi Project

**Sistem Gudang** adalah aplikasi manajemen stok berbasis web yang dibangun menggunakan framework **Laravel (PHP)**. Sistem ini mendukung pengelolaan master data barang, pencatatan transaksi barang masuk dan keluar, manajemen supplier dan kategori, dashboard statistik real-time, serta laporan inventaris lengkap.

Sistem ini memiliki dua peran pengguna:
- **Admin** — bertugas mengelola operasional gudang sehari-hari
- **Owner** — memantau laporan dan mengelola akun pengguna sistem

---

## 2. Informasi Project

| Atribut | Detail |
|---------|--------|
| **Nama Project** | Sistem Gudang |
| **Repository** | [github.com/riaasrini17-debug/Sistem-Gudang](https://github.com/riaasrini17-debug/Sistem-Gudang) |
| **Framework** | Laravel (PHP >= 8.1) |
| **Database** | MySQL |
| **Arsitektur** | Layered Architecture (MVC) |
| **Design Patterns** | Strategy, Factory Method, Singleton |
| **Mata Kuliah** | Rekayasa Perangkat Lunak |
| **Tahun Akademik** | 2025/2026 |

---

## 3. Anggota Kelompok dan Kontribusi

| Nama | NIM | Peran | Fitur yang Dikerjakan | Link Video |
|------|-----|-------|-----------------------|------------|
| Ria | [NIM] | Frontend + Auth | Halaman Login, Dashboard Admin, Dashboard Owner | [▶ Tonton](https://youtube.com/...) |
| Nima | [NIM] | Backend | Barang Masuk, Barang Keluar (Admin) | [▶ Tonton](https://youtube.com/...) |
| Indri | [NIM] | Full-stack | Daftar Barang Admin & Owner, Kelola User | [▶ Tonton](https://youtube.com/...) |
| Dina | [NIM] | Backend | Manajemen Supplier, Manajemen Kategori | [▶ Tonton](https://youtube.com/...) |
| Nayge | [NIM] | Frontend + Backend | Laporan Barang Masuk, Keluar & Terlaris | [▶ Tonton](https://youtube.com/...) |

---

## 4. Ruang Lingkup Sistem

### Role Admin
- Mengelola data master barang (tambah, edit, hapus)
- Mencatat barang masuk dari supplier (auto-create supplier & kategori)
- Mencatat barang keluar dengan validasi stok otomatis
- Mengelola data supplier dan kategori barang
- Memantau dashboard statistik real-time

### Role Owner
- Memantau dashboard ringkasan aktivitas gudang
- Melihat daftar stok barang secara real-time (read-only)
- Mengakses laporan barang masuk, keluar, dan terlaris
- Mengelola akun Admin dan Staff

---

## 5. Fitur MVP

### ✅ Fitur Admin

| Fitur | Status |
|-------|--------|
| Login & Logout (role-based) | ✅ Selesai |
| Dashboard real-time (grafik 7 hari) | ✅ Selesai |
| Daftar Barang (CRUD) | ✅ Selesai |
| Barang Masuk (auto-create supplier & kategori) | ✅ Selesai |
| Barang Keluar (validasi stok) | ✅ Selesai |
| Manajemen Supplier | ✅ Selesai |
| Manajemen Kategori | ✅ Selesai |

### ✅ Fitur Owner

| Fitur | Status |
|-------|--------|
| Dashboard Owner (grafik + stok menipis) | ✅ Selesai |
| Daftar Barang (read-only + info supplier) | ✅ Selesai |
| Laporan Barang Masuk + Cetak | ✅ Selesai |
| Laporan Barang Keluar + Cetak | ✅ Selesai |
| Laporan Terlaris (filter Harian/Bulanan/Tahunan) | ✅ Selesai |
| Kelola User (tambah Admin/Staff) | ✅ Selesai |

---

## 6. Tech Stack

| Teknologi | Versi | Kegunaan |
|-----------|-------|----------|
| Laravel | >= 10.x | Backend framework (MVC) |
| PHP | >= 8.1 | Bahasa pemrograman utama |
| Blade | Built-in | Template engine (Presentation Layer) |
| Tailwind CSS | CDN | Styling komponen UI |
| Chart.js | CDN | Grafik dashboard & laporan terlaris |
| MySQL | >= 8.0 | Database relasional |
| Eloquent ORM | Built-in | Query database & relasi antar model |
| Laravel Pint | >= 1.x | PHP Linter — standarisasi format kode |
| GitHub Actions | - | CI/CD — otomatis jalankan linter setiap push |

---

## 7. Arsitektur Sistem Layered Architecture

Aplikasi ini menggunakan pola **Layered Architecture (MVC)** yang memisahkan tanggung jawab ke dalam tiga lapisan yang jelas dan tidak saling bergantung secara langsung.

```
┌──────────────────────────────────────────────────────┐
│                 PRESENTATION LAYER                   │
│           resources/views/ (Blade Templates)         │
│   Hanya menampilkan data — TIDAK ada logika bisnis   │
│   admin/dashboard, owner/laporan, auth/login, ...    │
└──────────────────────────┬───────────────────────────┘
                           │  HTTP Request / Response
                           ▼
┌──────────────────────────────────────────────────────┐
│             APPLICATION LOGIC LAYER                  │
│            app/Http/Controllers/                     │
│   AuthController  |  BarangController                │
│   OwnerDashboardController                           │
│   Validasi input, logika bisnis, koordinasi data     │
└──────────────────────────┬───────────────────────────┘
                           │  Eloquent ORM Query
                           ▼
┌──────────────────────────────────────────────────────┐
│                DATA ACCESS LAYER                     │
│        app/Models/ + database/migrations/            │
│   Barang | Supplier | Kategori | TransaksiKeluar     │
│   User — Definisi struktur data & relasi antar model │
└──────────────────────────────────────────────────────┘
```

### Bukti Pemisahan Layer di Kode

**Layer 1 — View hanya tampilkan data, tidak proses apapun:**

```php
// resources/views/admin/dashboard.blade.php
{{ number_format($totalBarang) }}   // ← hanya tampilkan
{{ $barangMasuk }} Item             // ← hanya tampilkan

@forelse($stokKritis as $item)
    <p>{{ $item->nama_barang }}</p> // ← hanya tampilkan
@empty
    <p>Semua Stok Aman!</p>
@endforelse
```

**Layer 2 — Controller yang proses logika bisnis:**

```php
// app/Http/Controllers/BarangController.php
$barang = Barang::findOrFail($request->barang_id);

// Logika bisnis: validasi stok sebelum pengurangan
if ($barang->stok < $request->jumlah) {
    return redirect()->back()->with('error', 'Stok tidak mencukupi.');
}
$barang->decrement('stok', $request->jumlah);

TransaksiKeluar::create([
    'barang_id'  => $request->barang_id,
    'jumlah'     => $request->jumlah,
    'keterangan' => $request->keterangan,
]);
```

**Layer 3 — Model hanya definisi struktur data dan relasi:**

```php
// app/Models/Barang.php
protected $fillable = ['nama_barang', 'kategori', 'stok', 'stok_minimum', 'supplier_id'];

public function supplier() {
    return $this->belongsTo(Supplier::class, 'supplier_id'); // ← hanya relasi
}
public function kategori() {
    return $this->belongsTo(Kategori::class, 'kategori_id'); // ← hanya relasi
}
```

---

## 8. Design Patterns yang Digunakan

### Pattern 1 — Strategy Pattern ⭐

| Atribut | Detail |
|---------|--------|
| **Nama Pattern** | Strategy (Behavioral) |
| **Lokasi File** | `app/Http/Controllers/AuthController.php` |
| **Method** | `login()` |

**Tujuan:** Menentukan strategi perilaku (halaman tujuan redirect) yang berbeda berdasarkan role pengguna, tanpa mengubah struktur kode autentikasi utama.

```php
// app/Http/Controllers/AuthController.php — method login()
if (Auth::attempt($credentials)) {
    $request->session()->regenerate();
    $user = Auth::user();

    //  role owner → dashboard owner
    if ($user->role === 'owner') {
        return redirect()->route('owner.dashboard');
    }

    //  role admin → dashboard admin
    elseif ($user->role === 'admin') {
        return redirect()->route('dashboard');
    }
}
```

**Kenapa Strategy Pattern?** Perilaku sistem (ke mana redirect) berubah tergantung kondisi (role) tanpa mengubah struktur kode autentikasi. Jika ada role baru (misal: `staff`), cukup tambahkan blok `elseif` tanpa merombak logika login.

---

### Pattern 2 — Factory Method Pattern ⭐

| Atribut | Detail |
|---------|--------|
| **Nama Pattern** | Factory Method (Creational) |
| **Lokasi File** | `app/Http/Controllers/BarangController.php` |
| **Method** | `simpanBarangMasuk()` |

**Tujuan:** Membuat objek Kategori dan Supplier secara otomatis tanpa perlu mengetahui apakah objek sudah ada atau belum di database.

```php
// app/Http/Controllers/BarangController.php — method simpanBarangMasuk()

// Factory Method: firstOrCreate()

$kategori = Kategori::firstOrCreate(
    ['nama_kategori' => $request->nama_kategori]
);
$supplier = Supplier::firstOrCreate(
    ['nama_supplier' => $request->nama_supplier]
);

Barang::create([
    'supplier_id' => $supplier->id,
    'kategori'    => $request->nama_kategori,
    'stok'        => $request->jumlah,
]);
```

**Kenapa Factory Method?** `firstOrCreate()` adalah implementasi Factory yang memisahkan logika pembuatan objek dari penggunaannya. Admin tidak perlu mendaftarkan supplier/kategori terpisah — sistem otomatis menanganinya.

---

### Pattern 3 — Singleton Pattern ⭐

| Atribut | Detail |
|---------|--------|
| **Nama Pattern** | Singleton (Creational) |
| **Lokasi File** | Dikelola Laravel Service Container (seluruh Controller & Model) |
| **Konteks** | Semua query Eloquent ORM dalam satu siklus request |

**Tujuan:** Memastikan hanya ada **satu instance koneksi database** yang digunakan sepanjang siklus request, mencegah pemborosan resource server.

```php
// app/Http/Controllers/BarangController.php — method dashboard()
// Semua query ini menggunakan SATU koneksi DB yang sama (Singleton)
$totalBarang  = Barang::count();
$stokKritis   = Barang::whereRaw('stok < stok_minimum')->get();
$barangMasuk  = Barang::whereDate('updated_at', today())->sum('stok');
$barangKeluar = TransaksiKeluar::whereDate('created_at', today())->sum('jumlah');

// Laravel Service Container memastikan tidak ada koneksi baru
// yang dibuka untuk setiap baris query di atas
```

**Kenapa Singleton?** Tanpa Singleton, setiap query akan membuka koneksi baru ke database yang menyebabkan overhead besar, terutama pada dashboard yang menjalankan banyak query sekaligus.

---

## 9. Struktur Folder Project

```
Sistem-Gudang/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AuthController.php              # [Strategy] Auth & role-based routing
│   │       ├── BarangController.php            # [Factory] CRUD barang, masuk, keluar
│   │       └── OwnerDashboardController.php    # Dashboard & laporan owner
│   └── Models/
│       ├── Barang.php                          # Model utama + relasi supplier & kategori
│       ├── Kategori.php                        # Model kategori barang
│       ├── Supplier.php                        # Model supplier
│       ├── Transaksi.php                       # Model transaksi umum
│       ├── TransaksiKeluar.php                 # Model transaksi keluar khusus
│       └── User.php                            # Model user dengan kolom role (enum)
│
├── database/
│   └── migrations/
│       ├── ..._create_users_table.php          # Tabel users (role: admin|owner)
│       ├── ..._create_barangs_table.php        # Tabel master barang
│       ├── ..._create_kategori_table.php       # Tabel kategori
│       ├── ..._create_supplier_table.php       # Tabel supplier
│       ├── ..._create_transaksis_table.php     # Tabel transaksi umum
│       ├── ..._create_transaksi_keluars.php    # Tabel transaksi keluar
│       └── ..._create_sessions_table.php       # Tabel sesi login
│
├── resources/
│   └── views/
│       ├── auth/
│       │   └── login.blade.php                 # Halaman login
│       ├── admin/
│       │   ├── dashboard.blade.php             # Dashboard admin + Chart.js
│       │   ├── gudang_index.blade.php          # Daftar barang + CRUD
│       │   ├── barang_masuk.blade.php          # Form & riwayat barang masuk
│       │   ├── barang_keluar.blade.php         # Form & riwayat barang keluar
│       │   ├── supplier_index.blade.php        # Manajemen supplier
│       │   └── kategori_index.blade.php        # Manajemen kategori
│       └── owner/
│           ├── dashboard.blade.php             # Dashboard owner + Chart.js
│           ├── barang_index.blade.php          # Daftar barang (read-only)
│           ├── laporan_masuk.blade.php         # Laporan barang masuk + cetak
│           ├── laporan_keluar.blade.php        # Laporan barang keluar + cetak
│           ├── laporan_terlaris.blade.php      # Laporan terlaris + grafik
│           └── user_index.blade.php            # Kelola akun user
│
├── routes/
│   └── web.php                                 # Semua route + middleware auth
│
├── .github/
│   └── workflows/
│       └── tests.yml                           # CI/CD: Linter check Laravel Pint
│
└── docs/
    └── arsitektur.png                          # Diagram arsitektur sistem
```

---

## 10. Database dan ERD

### Daftar Tabel

| Tabel | Deskripsi |
|-------|-----------|
| `users` | Data akun pengguna (role: admin, owner) |
| `barangs` | Master data barang beserta stok |
| `kategori` | Kategori pengelompokan barang |
| `supplier` | Data pemasok barang |
| `transaksis` | Riwayat transaksi umum (masuk/keluar) |
| `transaksi_keluars` | Riwayat transaksi keluar khusus |
| `sessions` | Sesi login pengguna |

### Relasi Antar Tabel

```
users
  └── (role: admin|owner)

barangs
  ├── belongsTo → supplier (supplier_id)
  └── belongsTo → kategori (kategori_id)

supplier
  └── hasMany → barangs

kategori
  └── hasMany → barangs

transaksi_keluars
  └── belongsTo → barangs (barang_id)
```

> Diagram ERD lengkap tersedia di folder `docs/`

---

## 11. Cara Menjalankan Project Secara Lokal

### Prasyarat

Pastikan sudah terinstall:
- PHP >= 8.1
- Composer >= 2.x
- MySQL >= 8.0
- Node.js & NPM >= 18.x

### Langkah Instalasi

```bash
# 1. Clone repositori
git clone https://github.com/riaasrini17-debug/Sistem-Gudang.git
cd Sistem-Gudang

# 2. Install dependensi PHP
composer install

# 3. Install dependensi JavaScript & build assets
npm install && npm run build

# 4. Salin file konfigurasi environment
cp .env.example .env

# 5. Generate application key
php artisan key:generate
```

### Konfigurasi Database

Edit file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem_gudang
DB_USERNAME=root
DB_PASSWORD=
```

```bash
# 6. Jalankan migrasi database
php artisan migrate

# 7. (Opsional) Isi data awal
php artisan db:seed

# 8. Jalankan server lokal
php artisan serve
```

✅ Akses aplikasi di: **`http://127.0.0.1:8000`**

### Akun Default

| Role | Email | Password |
|------|-------|----------|
| Owner | owner@gudang.com | password |
| Admin | admin@gudang.com | password |

---

## 12. Testing, Linter, dan Formatting

### Laravel Pint (PHP Linter)

Proyek ini menggunakan **Laravel Pint** untuk memastikan standarisasi format kode PHP.

```bash
# Install Pint
composer require laravel/pint --dev

# Cek error tanpa mengubah file
./vendor/bin/pint --test

# Auto-fix semua error linter
./vendor/bin/pint
```

### Konfigurasi Pint (`pint.json`)

```json
{
    "preset": "laravel",
    "rules": {
        "simplified_null_return": true,
        "blank_line_before_statement": true,
        "new_with_braces": true,
        "no_unused_imports": true,
        "single_quote": true
    }
}
```

### CI/CD — GitHub Actions

Setiap push dan pull request otomatis menjalankan linter via GitHub Actions:

```yaml
# .github/workflows/tests.yml
name: Linter Check — Laravel Pint
on:
  push:
    branches: [ main, develop, "feature/**" ]
  pull_request:
    branches: [ main, develop ]
jobs:
  lint:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      - uses: shivammathur/setup-php@v2
        with:
          php-version: '8.4'
      - run: composer install --no-progress --prefer-dist
      - run: ./vendor/bin/pint --test
```

---

## 13. GitFlow dan Conventional Commits

### Struktur Branch

```
main          ← Production (kode stabil final)
  └── develop ← Staging (integrasi semua fitur)
        ├── feature/login-dashboard        (Ria)
        ├── feature/barang-masuk-keluar    (Nima)
        ├── feature/daftar-barang-user     (Indri)
        ├── feature/supplier-kategori      (Dina)
        └── feature/laporan-owner          (Nayge)
```

### Aturan GitFlow

- ✅ Setiap fitur dikerjakan di branch `feature/nama-fitur`
- ✅ Merge ke `develop` wajib melalui Pull Request
- ✅ PR harus di-approve minimal 1 rekan tim sebelum di-merge

### Format Conventional Commits

```bash
feat(auth): tambah login dengan redirect berdasarkan role
fix(barang): perbaiki validasi stok minimum
docs(readme): update dokumentasi arsitektur sistem
style(controller): fix linter error dengan Laravel Pint
refactor(laporan): pisah logika filter periode
ci(workflow): update PHP version ke 8.4
chore(gitignore): tambah file shortcut Windows
```

---

## 14. Dokumentasi Video Individu

| Nama | Link Video | Durasi | Topik yang Dijelaskan |
|------|-----------|--------|----------------------|
| Ria | [▶ Tonton](https://youtube.com/...) | 5-7 menit | Login, Dashboard Admin & Owner, Strategy Pattern |
| Nima | [▶ Tonton](https://youtube.com/...) | 5-7 menit | Barang Masuk & Keluar, Factory Method Pattern |
| Indri | [▶ Tonton](https://youtube.com/...) | 5-7 menit | Daftar Barang, Kelola User, CRUD |
| Dina | [▶ Tonton](https://youtube.com/...) | 5-7 menit | Supplier, Kategori, Singleton Pattern |
| Nayge | [▶ Tonton](https://youtube.com/...) | 5-7 menit | Laporan Masuk, Keluar, Terlaris & Chart.js |

> Setiap video menampilkan wajah (webcam) + layar (screencast) sesuai ketentuan UAS.

---

## 15. Dokumentasi Tambahan

- 📁 Diagram arsitektur sistem tersedia di `docs/arsitektur.png`
- 📁 Diagram ERD database tersedia di `docs/erd.png`
- 📁 Diagram UML (dari UTS) tersedia di `docs/uml.png`

---

## 16. Status MVP

| Komponen | Status |
|----------|--------|
| Autentikasi & Otorisasi Role | ✅ Selesai |
| Dashboard Admin (grafik real-time) | ✅ Selesai |
| Dashboard Owner | ✅ Selesai |
| Manajemen Barang (CRUD) | ✅ Selesai |
| Barang Masuk (auto-create supplier & kategori) | ✅ Selesai |
| Barang Keluar (validasi stok) | ✅ Selesai |
| Manajemen Supplier | ✅ Selesai |
| Manajemen Kategori | ✅ Selesai |
| Laporan Barang Masuk | ✅ Selesai |
| Laporan Barang Keluar | ✅ Selesai |
| Laporan Barang Terlaris (filter periode) | ✅ Selesai |
| Kelola User (owner) | ✅ Selesai |
| Linter CI/CD (GitHub Actions) | ✅ Selesai |
| GitFlow & Pull Request | ✅ Selesai |

---

## 17. Checklist Pengumpulan UAS

### Kelompok
- [x] Repositori GitHub bersifat Public
- [x] Branch `main` dan `develop` sudah ada
- [x] Setiap fitur dikerjakan di branch `feature/`
- [x] Pull Request dari `feature/` ke `develop` sudah dibuat
- [x] CI/CD Linter (GitHub Actions) 
- [x] README lengkap (deskripsi, arsitektur, design pattern, kontribusi, video)
- [x] Kode terstruktur rapi sesuai Layered Architecture
- [ ] Folder `docs/` berisi diagram UML & ERD
- [ ] Link video individu diisi di README

### Individu (masing-masing anggota)
- [ ] Video 5-7 menit diunggah ke YouTube (Unlisted) atau Google Drive
- [ ] Video menampilkan wajah + layar
- [ ] Video mencakup: commit history, branch feature, PR, demo kode, arsitektur, design pattern, linter

---

## 18. Referensi Arsitektur dan Design Pattern

| Referensi | Link |
|-----------|------|
| Humadev Design Pattern Repository | https://github.com/humadev/design_pattern |
| MVC Pattern sebagai referensi pendukung arsitektur Laravel | https://github.com/humadev/design_pattern/tree/main/mvc |
| Factory Method (GoF) | [Refactoring.Guru — Factory Method](https://refactoring.guru/design-patterns/factory-method) |
| Singleton Pattern (GoF) | [Refactoring.Guru — Singleton](https://refactoring.guru/design-patterns/singleton) |
| Laravel Pint (Linter) | [Laravel Pint Docs](https://laravel.com/docs/pint) |
| Conventional Commits | [conventionalcommits.org](https://www.conventionalcommits.org) |
| GitFlow | [Atlassian GitFlow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) |

---

## 19. Lisensi

Proyek ini dibuat untuk keperluan **Ujian Akhir Semester (UAS) Rekayasa Perangkat Lunak**
Tahun Akademik 2025/2026 — [Nama Universitas]
