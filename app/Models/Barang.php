<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang', 
        'kode_barang',
        'kategori', // Menggantikan 'kategori' agar beralih ke sistem ID Relasi, // Ditambahkan agar bisa mencatat supplier penyedia barang
        'stok',
        'stok_minimum',
        'supplier_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
