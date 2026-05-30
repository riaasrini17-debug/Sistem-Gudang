<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // Tentukan nama tabel di database
    protected $table = 'supplier'; 

    // 👇 SESUAIKAN GERBANG FILLABLE DI SINI 👇
    protected $fillable = ['nama_supplier', 'nama_barang'];

    /**
     * Relasi: Satu supplier bisa menyuplai banyak barang (One to Many)
     */
    public function barangs()
    {
        return $this->hasMany(Barang::class, 'supplier_id');
    }
}