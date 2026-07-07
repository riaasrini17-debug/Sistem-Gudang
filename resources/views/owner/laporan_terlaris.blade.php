<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Terlaris - Sistem Gudang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Memanggil Library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        details > summary { list-style: none; }
        details > summary::-webkit-details-marker { display: none; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans h-screen overflow-hidden flex">


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
                        <a href="{{ route('owner.laporan.keluar') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Barang Keluar
                        </a>
                        <a href="{{ route('owner.laporan.terlaris') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-900 text-white rounded-2xl text-sm font-medium shadow-xl">
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
        </aside>>

    <!-- ================= AREA KANAN ================= -->
    <div class="flex-1 flex flex-col overflow-hidden bg-gray-50">
        
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

        <main class="flex-1 overflow-y-auto p-6 md:p-8 flex flex-col gap-6">

    {{-- Header --}}
    <div class="flex items-end justify-between shrink-0">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Statistik Barang Terlaris</h1>
            <p class="text-sm text-gray-500 mt-1">10 barang dengan pengeluaran tertinggi.</p>
        </div>
        {{-- Filter Periode --}}
        <div class="flex bg-white border border-gray-200 rounded-2xl p-1 gap-1 shadow-sm">
            <a href="?periode=harian" 
               class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $periode === 'harian' ? 'bg-gray-900 text-white shadow' : 'text-gray-400 hover:text-gray-700' }}">
                Harian
            </a>
            <a href="?periode=bulanan" 
               class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $periode === 'bulanan' ? 'bg-gray-900 text-white shadow' : 'text-gray-400 hover:text-gray-700' }}">
                Bulanan
            </a>
            <a href="?periode=tahunan" 
               class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $periode === 'tahunan' ? 'bg-gray-900 text-white shadow' : 'text-gray-400 hover:text-gray-700' }}">
                Tahunan
            </a>
        </div>
    </div>

    @if(count($namaBarang) === 0)
    {{-- Empty State --}}
    <div class="flex-1 bg-white rounded-2xl border border-gray-100 shadow-sm flex flex-col items-center justify-center gap-3">
        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        </div>
        <p class="text-sm font-bold text-gray-400">Belum ada data untuk periode ini</p>
    </div>
    @else
    {{-- Layout 2 kolom --}}
    <div class="flex-1 min-h-0 grid grid-cols-5 gap-6">

        {{-- Chart --}}
        <div class="col-span-3 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col">
            <div class="flex items-center justify-between mb-6 shrink-0">
                <h3 class="font-bold text-gray-900">Grafik Pengeluaran Teratas</h3>
                <span class="text-[10px] font-black uppercase tracking-widest text-gray-400 bg-gray-50 px-3 py-1.5 rounded-xl border border-gray-100">
                    {{ ucfirst($periode) }}
                </span>
            </div>
            <div class="relative flex-1 min-h-[250px]">
                <canvas id="terlarisChart"></canvas>
            </div>
        </div>

        {{-- Ranking List --}}
        <div class="col-span-2 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col">
            <h3 class="font-bold text-gray-900 mb-4 shrink-0">Ranking Barang</h3>
            <div class="flex-1 overflow-y-auto space-y-3 pr-1">
                @foreach($namaBarang as $i => $nama)
                @php
                    $max = max($jumlahTerjual);
                    $pct = $max > 0 ? round(($jumlahTerjual[$i] / $max) * 100) : 0;
                    $colors = ['bg-blue-500','bg-blue-400','bg-blue-300','bg-blue-200','bg-blue-100'];
                    $color = $colors[min($i, 4)];
                @endphp
                <div class="flex items-center gap-3">
                    <span class="text-xs font-black text-gray-400 w-5 text-center">#{{ $i+1 }}</span>
                    <div class="flex-1">
                        <div class="flex justify-between mb-1">
                            <span class="text-xs font-bold text-gray-800">{{ $nama }}</span>
                            <span class="text-xs font-black text-gray-500">{{ $jumlahTerjual[$i] }} unit</span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full {{ $color }} rounded-full transition-all duration-500" style="width: {{ $pct }}%"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
    @endif

</main>

    <script>
        @if(count($namaBarang) > 0)
        const ctx = document.getElementById('terlarisChart').getContext('2d');
        const labelBarang = {!! json_encode($namaBarang) !!};
        const dataTerjual = {!! json_encode($jumlahTerjual) !!};

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labelBarang,
                datasets: [{
                    label: 'Unit Keluar',
                    data: dataTerjual,
                    backgroundColor: (ctx) => {
                        const gradient = ctx.chart.ctx.createLinearGradient(0, 0, 0, 300);
                        gradient.addColorStop(0, '#3B82F6');
                        gradient.addColorStop(1, '#BFDBFE');
                        return gradient;
                    },
                    borderWidth: 0,
                    borderRadius: 8,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: (ctx) => ` ${ctx.raw} unit keluar`
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#F1F5F9', borderDash: [4,4] },
                        ticks: { font: { size: 10, weight: '700' }, color: '#94A3B8' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { font: { size: 10, weight: '700' }, color: '#94A3B8' }
                    }
                }
            }
        });
        @endif
    </script>
    </div>

</body>
</html>