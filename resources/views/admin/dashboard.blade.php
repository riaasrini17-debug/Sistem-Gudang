<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - StockWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { overflow: hidden; }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #E2E8F0; border-radius: 10px; }
    </style>
</head>
<body class="bg-gray-50 font-sans text-gray-900 h-screen overflow-hidden">

    <div class="flex h-full">
        <aside class="w-64 bg-white border-r border-gray-100 flex flex-col shrink-0 h-full">
            <div class="p-6 flex items-center gap-2 border-b border-gray-50">
                <div class="bg-black p-1.5 rounded-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
                <span class="text-xl font-black tracking-tight">Gudangku</span>
            </div>

            <nav class="flex-1 p-4 space-y-1">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-900 text-white rounded-2xl text-sm font-medium shadow-xl">
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
                    <button type="submit" class="w-full flex items-center gap-3 text-red-500 font-bold text-xs uppercase tracking-widest hover:text-red-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>


        <main class="flex-1 flex flex-col h-full overflow-hidden">
            <header class="h-16 flex items-center justify-between px-8 border-b border-gray-100 bg-white shrink-0">
                <div class="font-black text-gray-900 tracking-tighter uppercase">Admin Panel</div>
                <div class="flex items-center gap-3 text-right">
                    <div>
                        <p class="text-xs font-black text-gray-900 uppercase">{{ auth()->user()->name }}</p>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Administrator</p>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-xs font-bold text-gray-400 uppercase border border-gray-200">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <div class="flex-1 p-8 overflow-hidden bg-gray-50/50 flex flex-col">
                <div class="mb-6 shrink-0 flex justify-between items-end">
                    <div>
                        <h2 class="text-2xl font-black text-gray-900 tracking-tight">Dashboard</h2>
                        <p class="text-xs text-gray-400">Ringkasan aktivitas gudang secara real-time.</p>
                    </div>
                </div>


                <div class="grid grid-cols-3 gap-6 mb-8 shrink-0">
                    <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm flex flex-col justify-between">
                        <div class="bg-blue-500 w-10 h-10 rounded-xl flex items-center justify-center text-white mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Total Barang</p>
                            <h3 class="text-3xl font-black text-gray-900 tracking-tighter">{{ number_format($totalBarang) }}</h3>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm flex flex-col justify-between">
                        <div class="bg-purple-500 w-10 h-10 rounded-xl flex items-center justify-center text-white mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Masuk Hari Ini</p>
                            <h3 class="text-3xl font-black text-gray-900 tracking-tighter">{{ $barangMasuk }} <span class="text-xs font-medium text-gray-400 uppercase">Item</span></h3>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm flex flex-col justify-between">
                        <div class="bg-orange-500 w-10 h-10 rounded-xl flex items-center justify-center text-white mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M20 12H4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Keluar Hari Ini</p>
                            <h3 class="text-3xl font-black text-gray-900 tracking-tighter">{{ $barangKeluar }} <span class="text-xs font-medium text-gray-400 uppercase">Item</span></h3>
                        </div>
                    </div>
                </div>

                <div class="flex-1 min-h-0 grid grid-cols-3 gap-6">

                    <div class="col-span-2 bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm flex flex-col overflow-hidden">
                        <div class="flex justify-between items-center mb-6 shrink-0">
                            <h4 class="font-black text-gray-900 tracking-tight">Pergerakan Stok</h4>
                            <div class="bg-gray-50 px-3 py-1.5 rounded-xl border border-gray-100 text-[10px] font-bold text-gray-500 uppercase tracking-widest">7 Hari Terakhir</div>
                        </div>
                        <div class="flex-1 min-h-0 relative">
                            <canvas id="trenStokChart"></canvas>
                        </div>
                    </div>


                    <div class="col-span-1 bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm flex flex-col overflow-hidden">
                        <div class="flex items-center gap-2 mb-6 shrink-0">
                            <div class="bg-orange-50 p-2 rounded-lg text-orange-500"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                            <h4 class="text-sm font-black text-gray-900 tracking-tight">Stok Menipis</h4>
                        </div>
                        
                        <div class="flex-1 overflow-y-auto space-y-3 pr-2 custom-scrollbar">
                            @forelse($stokKritis as $item)
                            <div class="p-4 bg-gray-50/50 rounded-2xl border border-gray-100 flex items-center justify-between transition-all hover:bg-white hover:shadow-md group">
                                <div>
                                    <p class="text-xs font-black text-gray-900 group-hover:text-blue-600">{{ $item->nama_barang }}</p>
                                    <p class="text-[9px] text-gray-400 font-bold uppercase tracking-widest">{{ $item->kode_barang }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs font-black text-red-500">{{ $item->stok }} <span class="text-[8px] uppercase">Unit</span></p>
                                    <span class="text-[8px] bg-red-100 text-red-600 px-1.5 py-0.5 rounded-full font-black uppercase tracking-tighter">Kritis</span>
                                </div>
                            </div>
                            @empty
                            <div class="flex flex-col items-center justify-center py-20 text-center">
                                <p class="text-[10px] text-gray-300 font-bold uppercase tracking-widest">Semua Stok Aman, Bozz!</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        const ctx = document.getElementById('trenStokChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [
                    { 
                        label: 'Keluar', 
                        data: {!! json_encode($chartKeluar) !!}, 
                        backgroundColor: '#CBD5E1', 
                        borderRadius: 12, 
                        barThickness: 12 
                    },
                    { 
                        label: 'Masuk', 
                        data: {!! json_encode($chartMasuk) !!}, 
                        backgroundColor: '#1E293B', 
                        borderRadius: 12, 
                        barThickness: 12 
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false }, ticks: { font: { size: 10, weight: '900' }, color: '#94A3B8' } },
                    y: { grid: { color: '#F1F5F9' }, ticks: { font: { size: 10, weight: '900' }, color: '#94A3B8' } }
                }
            }
        });
    </script>
</body>
</html>