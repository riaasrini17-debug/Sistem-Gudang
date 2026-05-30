<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Masuk - StockWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style> 
        body { overflow: hidden; } 
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #E2E8F0; border-radius: 10px; }
    </style>
</head>
<body class="bg-gray-50 font-sans text-gray-900 h-screen overflow-hidden">
    <div class="flex h-full w-full">
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
                <a href="{{ route('barang.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    Daftar Barang
                </a>
                <a href="{{ route('barang.masuk') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-900 text-white rounded-2xl text-sm font-medium shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Barang Masuk
                </a>
                <a href="{{ route('barang.keluar') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M20 12H4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
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

        <main class="flex-1 flex flex-col h-full overflow-hidden">
            <header class="h-16 flex items-center justify-between px-8 border-b border-gray-50 bg-white shrink-0">
                <div class="font-black text-gray-900 tracking-tighter uppercase">Riwayat Barang Masuk</div>
                <div class="flex items-center gap-3 text-right">
                    <div>
                        <p class="text-xs font-black text-gray-900 uppercase">{{ auth()->user()?->name ?? 'Admin' }}</p>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Administrator</p>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-xs font-bold text-gray-400 uppercase border border-gray-200">
                        {{ substr(auth()->user()?->name ?? 'A', 0, 1) }}
                    </div>
                </div>
            </header>

            <div class="flex-1 p-8 flex flex-col overflow-hidden bg-gray-50/30">
                <div class="flex-1 bg-white rounded-[2.5rem] border border-gray-100 shadow-sm flex flex-col overflow-hidden h-full">
                    
                    <div class="p-6 border-b border-gray-50 flex justify-between items-center shrink-0">
                        <div>
                            <h3 class="text-base font-black text-gray-900">Daftar Mutasi Masuk</h3>
                            <p class="text-xs text-gray-400">Catat penambahan stok barang dari supplier ke gudang.</p>
                        </div>
                        <button onclick="openModal()" class="bg-gray-900 text-white px-5 py-3 rounded-xl text-xs font-bold shadow-xl hover:bg-blue-600 transition-all flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Catat Barang Masuk
                        </button>
                    </div>

                    <div class="bg-gray-50/50 border-b border-gray-100 flex shrink-0 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                        <div class="flex-1 px-8 py-5">Barang & Keterangan</div>
                        <div class="w-48 px-8 py-5 text-center">Jumlah Masuk</div>
                        <div class="w-64 px-8 py-5 text-right">Tanggal</div>
                    </div>
                    
                    <div class="flex-1 overflow-y-auto custom-scrollbar">
                        <table class="w-full text-left">
                            <tbody class="divide-y divide-gray-50">
                                @forelse($transaksiMasuk as $t)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="flex-1 px-8 py-5">
                                        <p class="font-bold text-gray-900">{{ $t->nama_barang }}</p>
                                        <p class="text-[10px] font-medium text-gray-400">{{ $t->kategori ?? '-' }}</p>
                                    </td>
                                    <td class="w-48 px-8 py-5 text-center">
                                        <span class="bg-green-50 text-green-600 px-3 py-1 rounded-lg text-xs font-black">+ {{ $t->stok }}</span>
                                    </td>
                                    <td class="w-64 px-8 py-5 text-right text-xs font-medium text-gray-600">
                                        {{ $t->created_at->format('d M Y, H:i') }}
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="px-8 py-20 text-center text-gray-300 font-bold italic uppercase tracking-widest">Belum ada riwayat mutasi masuk</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

        <div id="mutasiModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">
        <div class="bg-white w-full max-w-md rounded-[2.5rem] p-8 shadow-2xl transition-all">
            <h3 class="text-lg font-black mb-6 text-gray-900">Input Barang Masuk</h3>
            
            <form action="{{ route('barang.masuk.simpan') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 ml-1">Nama Barang</label>
                    <input type="text" name="nama_barang" required class="w-full bg-gray-50 border-none rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-600 outline-none" placeholder="Ketik nama barang...">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 ml-1">Kategori Barang</label>
                    <input type="text" name="nama_kategori" required class="w-full bg-gray-50 border-none rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-600 outline-none" placeholder="Contoh: Elektronik, Aksesoris">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 ml-1">Supplier Barang</label>
                    <input type="text" name="nama_supplier" required class="w-full bg-gray-50 border-none rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-600 outline-none" placeholder="Contoh: PT. Sumber Jaya">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 ml-1">Jumlah Masuk</label>
                    <input type="number" name="jumlah" required min="1" class="w-full bg-gray-50 border-none rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-600 outline-none" placeholder="0">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 ml-1">Keterangan</label>
                    <textarea name="keterangan" class="w-full bg-gray-50 border-none rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-600 outline-none h-20" placeholder="Keterangan tambahan (opsional)"></textarea>
                </div>
                
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal()" class="flex-1 py-4 bg-gray-100 text-gray-600 rounded-2xl font-bold text-sm hover:bg-gray-200 transition-colors">Batal</button>
                    <button type="submit" class="flex-1 py-4 bg-green-600 text-white rounded-2xl font-bold text-sm hover:bg-green-700 shadow-xl transition-all">Simpan Barang</button>
                </div>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm mt-6">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b">
                    <th class="pb-4">Barang & Keterangan</th>
                    <th class="pb-4">Kategori</th>
                    <th class="pb-4">Supplier</th>
                    <th class="pb-4">Jumlah Masuk</th>
                    <th class="pb-4">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barangs as $barang)
                    <tr class="border-b last:border-none text-sm text-gray-700">
                        <td class="py-4">
                            <span class="font-bold text-gray-900 block">{{ $barang->nama_barang }}</span>
                            <small class="text-gray-400">{{ $barang->keterangan ?? '-' }}</small>
                        </td>
                        <td class="py-4">{{ $barang->kategori->nama_kategori ?? '-' }}</td>
                        <td class="py-4 text-gray-600">{{ $barang->supplier->nama_supplier ?? '-' }}</td>
                        <td class="py-4 font-bold text-green-600">+ {{ $barang->stok }}</td>
                        <td class="py-4 text-gray-400">{{ $barang->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center font-bold text-gray-300 italic uppercase tracking-wider">
                            BELUM ADA RIWAYAT MUTASI MASUK
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        function openModal() {
            document.getElementById('mutasiModal').classList.remove('hidden');
            document.getElementById('mutasiModal').classList.add('flex');
        }
        function closeModal() {
            document.getElementById('mutasiModal').classList.add('hidden');
            document.getElementById('mutasiModal').classList.remove('flex');
        }
    </script>
</body>
</html>