<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika Laravel salah menebak jamak (plural) nya
    protected $table = 'kategori';

    // Kolom yang diizinkan untuk diisi massal
    protected $fillable = ['nama_kategori'];

    /**
     * Relasi: Satu kategori memiliki banyak barang (One to Many)
     */
    public function barangs()
    {
        return $this->hasMany(Barang::class, 'kategori_id');
    }
}
