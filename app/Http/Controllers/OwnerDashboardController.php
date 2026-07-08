<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\TransaksiKeluar;
use App\Models\User;
use Illuminate\Http\Request;

class OwnerDashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'owner') {
            abort(403);
        }

        $totalBarang = Barang::count();
        $nilaiInventaris = 0;
        $masukHariIni = Barang::whereDate('updated_at', today())->sum('stok');
        $keluarHariIni = TransaksiKeluar::whereDate('created_at', today())->sum('jumlah');
        $stokMenipis = Barang::whereColumn('stok', '<=', 'stok_minimum')->get();

        // Data chart 7 hari
        $chartMasuk = $chartKeluar = [];
        for ($i = 6; $i >= 0; $i--) {
            $tgl = now()->subDays($i)->toDateString();
            $chartMasuk[] = Barang::whereDate('updated_at', $tgl)->sum('stok');
            $chartKeluar[] = TransaksiKeluar::whereDate('created_at', $tgl)->sum('jumlah');
        }

        return view('owner.dashboard', compact(
            'totalBarang', 'nilaiInventaris', 'masukHariIni', 'keluarHariIni', 'stokMenipis', 'chartMasuk', 'chartKeluar'
        ));
    }

    public function daftarBarang()
    {
        $barangs = Barang::with(['supplier'])->orderBy('id', 'desc')->get();

        return view('owner.barang_index', compact('barangs'));
    }

    public function laporanMasuk()
    {
        $barangMasuk = Barang::with(['supplier'])->latest()->get();

        return view('owner.laporan_masuk', compact('barangMasuk'));
    }

    public function laporanKeluar()
    {
        // Sambungkan ke TransaksiKeluar yang sudah dibuat admin
        $barangKeluar = TransaksiKeluar::with('barang')->latest()->get();

        return view('owner.laporan_keluar', compact('barangKeluar'));
    }

    public function laporanTerlaris(Request $request)
    {
        $periode = $request->get('periode', 'bulanan');

        $query = TransaksiKeluar::with('barang')
            ->selectRaw('barang_id, SUM(jumlah) as total')
            ->groupBy('barang_id')
            ->orderByDesc('total')
            ->limit(10);

        if ($periode === 'harian') {
            $query->whereDate('created_at', today());
        } elseif ($periode === 'bulanan') {
            $query->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year);
        } elseif ($periode === 'tahunan') {
            $query->whereYear('created_at', now()->year);
        }

        $terlaris = $query->get();

        $namaBarang = $terlaris->map(fn ($t) => $t->barang->nama_barang ?? '-')->toArray();
        $jumlahTerjual = $terlaris->map(fn ($t) => $t->total)->toArray();

        return view('owner.laporan_terlaris', compact('namaBarang', 'jumlahTerjual', 'periode'));
    }

    public function daftarSupplier()
    {
        $suppliers = Supplier::orderBy('id', 'desc')->get();

        return view('owner.supplier_index', compact('suppliers'));
    }

    public function kelolaUser()
    {
        $users = User::all();

        return view('owner.user_index', compact('users'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,staff',
            'password' => 'required|min:6',
        ]);

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),

        ]);

        return redirect()->back()->with('success', 'Akun '.$request->role.' berhasil dibuat.');
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'owner') {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required|in:admin,staff',
            'password' => 'nullable|min:6',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('owner.users')->with('success', 'Data user berhasil diperbarui.');
    }

    public function toggleAktifUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'owner') {
            abort(403);
        }

        $user->is_active = ! $user->is_active;
        $user->save();

        $status = $user->is_active ? 'diaktifkan' : 'dinonaktifkan';

        return redirect()->route('owner.users')->with('success', "Akun {$user->name} berhasil {$status}.");
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'owner') {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required|in:admin,staff',
            'password' => 'nullable|min:6',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('owner.users')->with('success', 'Data user berhasil diperbarui.');
    }

    public function toggleAktifUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'owner') {
            abort(403);
        }

        $user->is_active = ! $user->is_active;
        $user->save();

        $status = $user->is_active ? 'diaktifkan' : 'dinonaktifkan';

        return redirect()->route('owner.users')->with('success', "Akun {$user->name} berhasil {$status}.");
    }
}
