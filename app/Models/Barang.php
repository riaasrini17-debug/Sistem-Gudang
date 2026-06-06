<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika di database namanya bukan 'barangs'
    // protected $table = 'barangs';

    // 👇 GERBANG DIUBAH DAN DITAMBAH UNTUK MENAMPUNG ID RELASI 👇
    protected $fillable = [
        'nama_barang', 
        'kode_barang',
        'kategori', // Menggantikan 'kategori' agar beralih ke sistem ID Relasi, // Ditambahkan agar bisa mencatat supplier penyedia barang
        'stok',
        'stok_minimum',
        'supplier_id',
    ];

    /**
     * Relasi ke Model Kategori (Banyak Barang termasuk dalam Satu Kategori)
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    /**
     * Relasi ke Model Supplier (Banyak Barang disuplai oleh Satu Supplier)
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}