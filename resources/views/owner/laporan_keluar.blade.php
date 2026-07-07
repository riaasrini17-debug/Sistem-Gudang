<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Keluar - StockWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style> 
        body { overflow: hidden; } 
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #E2E8F0; border-radius: 10px; }

        @media print {
            @page { margin: 1cm; }
            aside, header, .no-print { display: none !important; }
            body { overflow: auto !important; background: white !important; height: auto !important; }
            #print-area { overflow: visible !important; }
            main { padding: 16px !important; overflow: visible !important; }
            .shadow-sm, .shadow-xl { box-shadow: none !important; }
            #print-header { display: flex !important; }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans text-gray-900 h-screen overflow-hidden">
    <div class="flex h-full w-full">
        <aside class="w-64 bg-white border-r border-gray-100 flex flex-col shrink-0">
        <div class="h-16 flex items-center px-6 border-b border-gray-100">
            <div class="flex items-center gap-2 text-gray-900">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
                <span class="text-xl font-black tracking-tight">Gudangku</span>
            </div>
        </div>

            <nav class="flex-1 py-4 space-y-1 overflow-y-auto custom-scrollbar">
                <div class="px-4 space-y-1">
                    <a href="{{ route('owner.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('owner.barang') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        Daftar Barang
                    </a>
                </div>

                <div class="px-4 py-2 mt-2">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-2">Laporan</p>
                    <div class="space-y-1">
                        <a href="{{ route('owner.laporan.masuk') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                            Barang Masuk
                        </a>
                        <a href="{{ route('owner.laporan.keluar') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-900 text-white rounded-2xl text-sm font-medium shadow-xl">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Barang Keluar
                        </a>
                        <a href="{{ route('owner.laporan.terlaris') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            Barang Terlaris
                        </a>
                    </div>
                </div>

                <div class="px-4 py-2 mt-2">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-2">Manajemen</p>
                    <div class="space-y-1">
                        <a href="{{ route('owner.users') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            Kelola User
                        </a>
                    </div>
                </div>
            </nav>

            <div class="p-6 border-t border-gray-50 shrink-0">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 text-red-500 font-bold text-xs uppercase tracking-widest hover:text-red-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>


    <div id="print-area" class="flex-1 flex flex-col overflow-hidden bg-gray-50">
        
        <header class="h-16 bg-white border-b border-gray-100 flex items-center px-6 md:px-8">
            <div class="flex items-center gap-4 ml-auto">
                <div class="flex items-center gap-3 pl-4">
                    <div class="text-right">
                        <p class="text-sm font-bold text-gray-900">{{ auth()->user()->name ?? 'Owner' }}</p>
                        <p class="text-xs text-gray-500 capitalize">{{ auth()->user()->role ?? 'owner' }}</p>
                    </div>
                    <div class="w-10 h-10 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center font-bold">
                        {{ substr(auth()->user()->name ?? 'O', 0, 1) }}
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-8">


            <div id="print-header" class="hidden items-center gap-3 mb-6 pb-4 border-b border-gray-300">
                <svg class="w-8 h-8 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke-width="2" stroke-linejoin="round"/></svg>
                <span class="text-xl font-bold tracking-tight text-gray-900">StockWise</span>
                <span class="ml-auto text-xs text-gray-500">Dicetak pada: {{ now()->format('d M Y, H:i') }}</span>
            </div>
            

            <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Laporan Barang Keluar</h1>
                    <p class="text-sm text-gray-500 mt-1">Riwayat pengeluaran stok barang.</p>
                </div>
                <button onclick="window.print()" class="no-print inline-flex items-center gap-2 bg-white border border-gray-200 text-gray-700 px-4 py-2.5 rounded-xl text-sm font-medium hover:bg-gray-50 hover:text-blue-600 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    Cetak Laporan
                </button>
            </div>


            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <thead class="bg-gray-50 text-gray-500 border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 font-medium">Tanggal Keluar</th>
                                <th class="px-6 py-4 font-medium">ID Barang</th>
                                <th class="px-6 py-4 font-medium">Nama Barang</th>
                                <th class="px-6 py-4 font-medium text-center">Jumlah</th>
                                <th class="px-6 py-4 font-medium">Penerima</th>
                                <th class="px-6 py-4 font-medium text-right">Pengeluar (Admin)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            
                            @forelse($barangKeluar as $item)

                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-gray-500">{{ $item->created_at->format('d M Y, H:i') }}</td>
                                <td class="px-6 py-4 text-gray-500 font-mono text-xs">BRG-{{ str_pad($item->barang_id, 4, '0', STR_PAD_LEFT) }}</td>
                                <td class="px-6 py-4 font-bold text-gray-900">{{ $item->barang->nama_barang }}</td>
                                <td class="px-6 py-4 text-center font-bold text-red-600">-{{ $item->jumlah }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $item->keterangan ?? '-' }}</td>
                                <td class="px-6 py-4 text-right text-gray-500">Admin</td>
                            </tr>
                            @empty

                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center text-gray-400">
                                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                    </div>
                                    <p class="font-medium text-gray-500">Belum ada riwayat barang keluar.</p>
                                    <p class="text-xs mt-1">Data akan muncul di sini setelah admin mengurangi stok barang.</p>
                                </td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

</body>
</html>