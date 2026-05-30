<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User - Sistem Gudang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        details > summary { list-style: none; }
        details > summary::-webkit-details-marker { display: none; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans h-screen overflow-hidden flex">

    <!-- ================= SIDEBAR KIRI ================= -->
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col shrink-0">
        <div class="h-16 flex items-center px-6 border-b border-gray-100">
            <div class="flex items-center gap-2 text-gray-900">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
                <span class="text-xl font-bold tracking-tight">StockWise</span>
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
                        <a href="{{ route('owner.laporan.terlaris') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-2xl text-sm font-medium transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            Barang Terlaris
                        </a>
                    </div>
                </div>

                <div class="px-4 py-2 mt-2">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-2">Manajemen</p>
                    <div class="space-y-1">
                        <a href="{{ route('owner.users') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-900 text-white rounded-2xl text-sm font-medium shadow-xl">
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

        <main class="flex-1 overflow-y-auto p-6 md:p-8">
            
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Kelola User</h1>
                <p class="text-sm text-gray-500 mt-1">Pengaturan &rsaquo; Kelola User</p>
            </div>

            <!-- BUNGKUSAN KONTEN -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
                
                <!-- TABEL USER -->
                <div class="overflow-x-auto border-b border-gray-100">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <thead class="bg-gray-50 text-gray-500 border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 font-medium">User</th>
                                <th class="px-6 py-4 font-medium text-center">Role / Hak Akses</th>
                                <th class="px-6 py-4 font-medium text-center">Status</th>
                                <th class="px-6 py-4 font-medium text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            
                            @foreach($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center font-bold uppercase">
                                            {{ substr($user->name, 0, 2) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900">{{ $user->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 text-center">
                                    @if($user->role == 'owner')
                                        <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-md text-xs font-bold capitalize">Owner</span>
                                    @elseif($user->role == 'admin')
                                        <span class="px-3 py-1 bg-amber-50 text-amber-600 rounded-md text-xs font-bold capitalize">Administrator</span>
                                    @else
                                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-md text-xs font-bold capitalize">Staff Gudang</span>
                                    @endif
                                </td>
                                
                                <td class="px-6 py-4 text-center">
                                    <span class="text-green-500 font-medium text-xs">Aktif</span>
                                </td>
                                
                                <td class="px-6 py-4 text-right space-x-3 text-xs font-medium">
                                    @if($user->role !== 'owner')
                                        <button class="text-blue-600 hover:text-blue-800">Edit</button>
                                        <button class="text-red-500 hover:text-red-700">Nonaktifkan</button>
                                    @else
                                        <span class="text-gray-300 italic">-</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <!-- FORM TAMBAH USER BARU -->
                <div class="p-6 bg-gray-50/50">
                    <h3 class="font-bold text-gray-900 mb-4 text-base">Tambah user baru</h3>
                    
                    <!-- Area Notifikasi Sukses / Error -->
                    @if(session('success'))
                        <div class="mb-4 p-3 bg-green-100 border border-green-200 text-green-700 rounded-lg text-sm font-medium">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if($errors->any())
                        <div class="mb-4 p-3 bg-red-100 border border-red-200 text-red-700 rounded-lg text-sm font-medium">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form yang mengarah ke route storeUser -->
                    <form action="{{ route('owner.users.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Nama lengkap</label>
                                <input type="text" name="name" required class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" placeholder="Masukkan nama">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" name="email" required class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" placeholder="nama@gudang.com">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Role / Hak Akses</label>
                                <select name="role" required class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                                    <option value="admin">Admin (Akses Penuh Gudang)</option>
                                    <option value="staff">Staff (Akses Terbatas)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Password awal</label>
                                <input type="password" name="password" required class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" placeholder="Min. 6 karakter">
                            </div>
                        </div>
                        
                        <div class="flex justify-end pt-2">
                            <button type="submit" class="bg-gray-900 text-white font-medium text-sm px-6 py-2 rounded-lg hover:bg-gray-800 shadow-sm transition-colors">
                                Buat Akun
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </main>
    </div>

</body>
</html>