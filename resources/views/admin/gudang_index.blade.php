<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Stok - StockWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { overflow: hidden; } 
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #E2E8F0; border-radius: 10px; }
    </style>
</head>
<body class="bg-gray-50 font-sans text-gray-900 h-screen overflow-hidden">

    <div class="flex h-full w-full">
        <!-- ================= SIDEBAR ================= -->
        <aside class="w-64 bg-white border-r border-gray-100 flex flex-col shrink-0 h-full">
            <div class="p-6 flex items-center gap-2 border-b border-gray-50">
                <div class="bg-black p-1.5 rounded-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
                <span class="text-xl font-black tracking-tight">StockWise</span>
            </div>

            <nav class="flex-1 p-4 space-y-1">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('barang.index') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-900 text-white rounded-2xl text-sm font-medium shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    Daftar Barang
                </a>
                <a href="{{ route('barang.masuk') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Barang Masuk
                </a>
                <a href="{{ route('barang.keluar') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                    Barang Keluar
                </a>
                <a href="{{ route('supplier.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Supplier
                </a>
                <a href="{{ route('kategori.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    Kategori
                </a>
            </nav>

            <div class="p-6 border-t border-gray-50">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 text-red-500 font-bold text-xs uppercase tracking-widest hover:text-red-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- ================= AREA KERJA ================= -->
        <main class="flex-1 flex flex-col h-full overflow-hidden">
            <!-- Header Topbar -->
            <header class="h-16 flex items-center justify-between px-8 border-b border-gray-50 bg-white shrink-0">
                <button class="text-gray-400"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg></button>
                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-xs font-black text-gray-900 uppercase tracking-tighter">{{ auth()->user()->name }}</p>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Admin</p>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-gray-200 border border-gray-100 flex items-center justify-center text-xs font-bold text-gray-500">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <div class="flex-1 p-8 flex gap-8 overflow-hidden bg-gray-50/30">
                
                <!-- KOLOM KIRI: TABEL UTAMA -->
                <div class="flex-1 bg-white rounded-[2.5rem] border border-gray-100 shadow-sm flex flex-col overflow-hidden h-full">
                    <div class="flex-1 overflow-y-auto custom-scrollbar">
                        <table class="w-full text-left table-fixed">
                            <thead>
                                <tr class="bg-gray-50/50 border-b border-gray-100 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                                    <th class="w-16 px-6 py-5 text-center">ID</th>
                                    <th class="px-6 py-5">Detail Produk</th>
                                    <th class="w-40 px-6 py-5">Supplier</th>
                                    <th class="w-24 px-6 py-5 text-center">Stok</th>
                                    <th class="w-32 px-6 py-5 text-right">Status</th>
                                    <th class="w-24 px-6 py-5 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($barangs as $b)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="w-16 px-6 py-5 text-center font-mono text-[11px] text-gray-400">#{{ $b->id }}</td>
                                    <td class="px-6 py-5">
                                        <p class="font-bold text-gray-900">{{ $b->nama_barang }}</p>
                                        <p class="text-[10px] font-mono text-blue-600 font-bold uppercase tracking-tighter">{{ $b->kode_barang }}</p>
                                    </td>
                                    <td class="w-40 px-6 py-5 text-xs font-medium text-gray-600">
                                        {{ $b->supplier->nama_supplier ?? '-' }}
                                    </td>
                                    <td class="w-24 px-6 py-5 text-center font-black text-gray-800 text-lg">{{ $b->stok }}</td>
                                    <td class="w-32 px-6 py-5 text-right">
                                        @if($b->stok <= $b->stok_minimum)
                                            <span class="px-2 py-0.5 bg-red-100 text-red-600 rounded-md text-[9px] font-black uppercase">Kritis</span>
                                        @else
                                            <span class="px-2 py-0.5 bg-green-100 text-green-600 rounded-md text-[9px] font-black uppercase">Aman</span>
                                        @endif
                                    </td>
                                    <td class="w-24 px-6 py-5 text-right">
                                        <div class="flex justify-end gap-2">
                                            <button onclick="openEditModal({{ json_encode($b) }})" class="text-blue-500 hover:text-blue-700">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            </button>
                                            <form action="{{ route('barang.hapus', $b->id) }}" method="POST" onsubmit="return confirm('Hapus barang ini?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="6" class="px-8 py-20 text-center text-gray-300 font-bold italic uppercase tracking-widest">Belum ada barang</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- Modal Edit (Floating) -->
    <div id="editModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">
        <div class="bg-white w-full max-w-md rounded-[2.5rem] p-8 shadow-2xl">
            <h3 class="text-lg font-black mb-6">Edit Data Barang</h3>
            <form id="editForm" method="POST" class="space-y-4">
                @csrf @method('PUT')
                <input type="text" name="nama_barang" id="edit_nama" class="w-full bg-gray-50 border-none rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-600 outline-none" placeholder="Nama Barang">
                <input type="text" name="kode_barang" id="edit_kode" class="w-full bg-gray-50 border-none rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-600 outline-none" placeholder="Kode Barang">
                <div class="grid grid-cols-2 gap-4">
                    <input type="number" name="stok" id="edit_stok" class="w-full bg-gray-50 border-none rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-600 outline-none">
                    <input type="number" name="stok_minimum" id="edit_stok_min" class="w-full bg-gray-50 border-none rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-600 outline-none">
                </div>
                <input type="text" name="supplier" id="edit_supplier" class="w-full bg-gray-50 border-none rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-600 outline-none" placeholder="Supplier">
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeEditModal()" class="flex-1 py-4 bg-gray-100 rounded-2xl font-bold text-sm">Batal</button>
                    <button type="submit" class="flex-1 py-4 bg-gray-900 text-white rounded-2xl font-bold text-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(barang) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
            document.getElementById('editForm').action = "/gudang/update/" + barang.id;
            document.getElementById('edit_nama').value = barang.nama_barang;
            document.getElementById('edit_kode').value = barang.kode_barang;
            document.getElementById('edit_stok').value = barang.stok;
            document.getElementById('edit_stok_min').value = barang.stok_minimum;
            document.getElementById('edit_supplier').value = barang.supplier ? barang.supplier.nama_supplier : '';
        }
        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        }
    </script>
</body>
</html>