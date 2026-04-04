<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang; // Pastikan ini ada

class BarangController extends Controller
{
    // Fungsi index HARUS di dalam kurung kurawal class
    public function index() 
    {
        $barangs = Barang::all();
        return view('gudang_index', compact('barangs'));
    }

    // Fungsi store juga HARUS di dalam sini
    public function store(Request $request) 
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori'    => 'required',
            'stok'        => 'required|numeric',
        ]);

        Barang::create($request->all());
        
        return redirect()->back()->with('success', 'Barang berhasil disimpan!');
    }
} // Kurung kurawal penutup class harus di paling bawah