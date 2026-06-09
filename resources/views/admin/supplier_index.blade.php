<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Supplier - StockWise</title>
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
                <a href="{{ route('barang.masuk') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Barang Masuk
                </a>
                <a href="{{ route('barang.keluar') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M20 12H4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Barang Keluar
                </a>
                <a href="{{ route('supplier.index') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-900 text-white rounded-2xl text-sm font-medium shadow-xl">
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
                <div class="font-black text-gray-900 tracking-tighter uppercase">Manajemen Supplier</div>
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
                            <h3 class="text-base font-black text-gray-900">Daftar Mitra Supplier</h3>
                            <p class="text-xs text-gray-400">Kelola data pemasok barang ke gudang Anda.</p>
                        </div>
                        <button onclick="openModal('tambah')" class="bg-gray-900 text-white px-5 py-3 rounded-xl text-xs font-bold shadow-xl hover:bg-blue-600 transition-all flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Tambah Supplier
                        </button>
                    </div>

                    <div class="flex-1 overflow-y-auto custom-scrollbar">
                        <table class="w-full text-left table-fixed">
                            <thead>
                                <tr class="bg-gray-50/50 border-b border-gray-100 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                                    <th class="px-8 py-5">Nama Supplier</th>
                                    <th class="w-48 px-8 py-5">Nama Barang</th>
                                    <th class="w-24 px-8 py-5 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($suppliers ?? [] as $s)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-8 py-5">
                                        <p class="font-bold text-gray-900">{{ $s->nama_supplier ?? 'PT. Sumber Rejeki' }}</p>
                                    </td>
                                    <td class="w-48 px-8 py-5 text-xs font-medium text-gray-600">{{ $s->nama_barang ?? 'Elektronik' }}</td>
                                    <td class="w-24 px-8 py-5 text-right">
                                        <div class="flex justify-end gap-2">
                                            <button onclick="openModal('edit', {{ json_encode($s) }})" class="text-blue-500 hover:text-blue-700">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            </button>
                                            <form action="#" method="POST" onsubmit="return confirm('Hapus supplier ini?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="px-8 py-20 text-center text-gray-300 font-bold italic uppercase tracking-widest">Belum ada data supplier</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="supplierModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">
        <div class="bg-white w-full max-w-md rounded-[2.5rem] p-8 shadow-2xl">
            <h3 id="modalTitle" class="text-lg font-black mb-6 text-gray-900">Tambah Supplier</h3>
            <form id="supplierForm" action="{{ route('supplier.simpan') }}" method="POST" class="space-y-4">
                @csrf
                <div id="methodContainer"></div>
                
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 ml-1">Nama Supplier</label>
                    <input type="text" name="nama_supplier" id="input_nama" required class="w-full bg-gray-50 border-none rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-600 outline-none" placeholder="PT. ABC">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 ml-1">Nama Barang</label>
                    <textarea name="nama_barang" id="barang" class="w-full bg-gray-50 border-none rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-600 outline-none h-20" placeholder="Jalan..."></textarea>
                </div>
                
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal()" class="flex-1 py-4 bg-gray-100 text-gray-600 rounded-2xl font-bold text-sm hover:bg-gray-200 transition-colors">Batal</button>
                    <button type="submit" class="flex-1 py-4 bg-gray-900 text-white rounded-2xl font-bold text-sm hover:bg-blue-600 shadow-xl transition-all">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(type, data = null) {
            document.getElementById('supplierModal').classList.remove('hidden');
            document.getElementById('supplierModal').classList.add('flex');
            
            if (type === 'edit' && data) {
                document.getElementById('modalTitle').innerText = 'Edit Supplier';
                document.getElementById('methodContainer').innerHTML = ''; // Nanti diisi kalau backend sudah siap
                document.getElementById('input_nama').value = data.nama_supplier;
                document.getElementById('barang').value = data.nama_barang;
            } else {
                document.getElementById('modalTitle').innerText = 'Tambah Supplier';
                document.getElementById('methodContainer').innerHTML = '';
                document.getElementById('supplierForm').reset();
            }
        }

        function closeModal() {
            document.getElementById('supplierModal').classList.add('hidden');
            document.getElementById('supplierModal').classList.remove('flex');
        }
    </script>
</body>
</html>