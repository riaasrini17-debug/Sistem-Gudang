<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Gudang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen font-sans">
    
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 w-full max-w-md">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="bg-blue-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900">Sistem Gudang</h2>
            <p class="text-sm text-gray-500 mt-1">Silakan masuk ke akun Anda</p>
        </div>

        <!-- Pesan Error -->
        @if ($errors->any())
            <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm mb-6 text-center font-medium">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form Login -->
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" 
                       placeholder="contoh@gudang.com">
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" 
                       placeholder="••••••••">
            </div>
            
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                Masuk
            </button>
        </form>
    </div>

</body>
</html>