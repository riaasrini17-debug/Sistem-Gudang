<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\TransaksiKeluar;
use App\Models\Supplier;
use App\Models\Kategori;

class BarangController extends Controller
{
    public function dashboard()
    {
        $totalBarang  = Barang::count();
        $stokKritis   = Barang::whereRaw('stok < stok_minimum')->get();

        // Masuk hari ini: jumlah stok yang ditambah hari ini
        $barangMasuk  = Barang::whereDate('updated_at', today())->sum('stok');

        // Keluar hari ini: dari tabel transaksi_keluars
        $barangKeluar = TransaksiKeluar::whereDate('created_at', today())->sum('jumlah');

        // Data chart 7 hari terakhir
        $chartMasuk  = [];
        $chartKeluar = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = now()->subDays($i)->toDateString();
            $chartMasuk[]  = Barang::whereDate('updated_at', $tanggal)->sum('stok');
            $chartKeluar[] = TransaksiKeluar::whereDate('created_at', $tanggal)->sum('jumlah');
        }

        return view('admin.dashboard', compact(
            'totalBarang', 'stokKritis', 'barangMasuk', 'barangKeluar', 'chartMasuk', 'chartKeluar'
        ));
    }

    public function index()
    {
        $barangs = Barang::latest()->get();
        return view('admin.gudang_index', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori'    => 'required|string|max:255',
            'stok'        => 'required|numeric|min:0',
        ]);
        Barang::create([
            'nama_barang'  => $request->nama_barang,
            'kategori'     => $request->kategori,
            'stok'         => $request->stok,
            'stok_minimum' => $request->stok_minimum ?? 5,
        ]);
        return redirect()->back()->with('success', 'Data master barang berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori'    => 'required|string|max:255',
            'stok'        => 'required|numeric|min:0',
        ]);
        $barang = Barang::findOrFail($id);
        $barang->update([
            'nama_barang'  => $request->nama_barang,
            'kategori'     => $request->kategori,
            'stok'         => $request->stok,
            'stok_minimum' => $request->stok_minimum ?? 5,
        ]);
        return redirect()->back()->with('success', 'Data master barang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Barang::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data master barang berhasil dihapus!');
    }

    // BARANG MASUK
    public function indexMasuk()
    {
        $transaksiMasuk = Barang::latest()->get();
        $barangs        = Barang::latest()->get();
        $suppliers      = Supplier::latest()->get();
        return view('admin.barang_masuk', compact('transaksiMasuk', 'barangs', 'suppliers'));
    }

    public function simpanBarangMasuk(Request $request)
    {
        $request->validate([
            'nama_barang'   => 'required|string|max:255',
            'nama_kategori' => 'required|string|max:255',
            'nama_supplier' => 'required|string|max:255',
            'jumlah'        => 'required|numeric|min:1',
        ]);

        // Auto-simpan Kategori jika belum ada
        $kategori = Kategori::firstOrCreate(['nama_kategori' => $request->nama_kategori]);

        // Auto-simpan Supplier jika belum ada
        $supplier = Supplier::firstOrCreate(['nama_supplier' => $request->nama_supplier]);

        // Cari atau buat barang
        $barangTerpilih = Barang::where('nama_barang', $request->nama_barang)->first();

        if ($barangTerpilih) {
            $barangTerpilih->increment('stok', $request->jumlah);
            $barangTerpilih->update([
                'supplier_id' => $supplier->id,
                'kategori'    => $request->nama_kategori,
            ]);
        } else {
            Barang::create([
                'nama_barang'  => $request->nama_barang,
                'kategori'     => $request->nama_kategori,
                'stok'         => $request->jumlah,
                'stok_minimum' => 5,
                'supplier_id'  => $supplier->id,
            ]);
        }

        return redirect()->back()->with('success', 'Mutasi barang masuk berhasil diproses!');
    }

    // BARANG KELUAR
    public function barangKeluar()
    {
        $transaksiKeluar = TransaksiKeluar::with('barang')->latest()->get();
        $barangs         = Barang::all();
        return view('admin.barang_keluar', compact('transaksiKeluar', 'barangs'));
    }

    public function simpanBarangKeluar(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah'    => 'required|numeric|min:1',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($barang->stok < $request->jumlah) {
            return redirect()->back()->with('error', 'Gagal! Stok barang tidak mencukupi.');
        }

        $barang->decrement('stok', $request->jumlah);

        TransaksiKeluar::create([
            'barang_id'  => $request->barang_id,
            'jumlah'     => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Stok barang berhasil dikurangi!');
    }

    // SUPPLIER
    public function indexSupplier()
    {
        $suppliers = Supplier::latest()->get();
        return view('admin.supplier_index', compact('suppliers'));
    }

    public function simpanSupplier(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
        ]);
        Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'nama_barang'   => $request->nama_barang,
        ]);
        return redirect()->back()->with('success', 'Supplier berhasil ditambahkan!');
    }

    // KATEGORI
    public function indexKategori()
    {
        $kategoris = Kategori::latest()->get();
        return view('admin.kategori_index', compact('kategoris'));
    }

    public function simpanKategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function hapusKategori($id)
    {
        Kategori::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
    }
}