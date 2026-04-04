<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    // Ini adalah daftar kolom yang BOLEH diisi dari form
    protected $fillable = [
        'nama_barang', 
        'kategori', 
        'stok'
    ];
}