<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BACALOKA Perpustakaan Digital</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite Assets (CSS & JS Terpisah) -->
    @vite(['resources/css/app.css', 'resources/js/login.js'])
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4 md:p-6">

    <!-- Card Container -->
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row min-h-[520px]">
        
        <!-- Sisi Kiri: Branding & Banner (Navy Blue) -->
        <div class="md:w-1/2 bg-brand-dark p-8 md:p-12 text-white flex flex-col justify-between relative overflow-hidden">
            
            <!-- Elemen Lingkaran Dekoratif Abstrak -->
            <div class="absolute -top-12 -left-12 w-64 h-64 bg-white/5 rounded-full pointer-events-none"></div>
            <div class="absolute top-1/4 -right-16 w-80 h-80 bg-white/5 rounded-full pointer-events-none"></div>
            <div class="absolute -bottom-20 -left-10 w-96 h-96 bg-white/5 rounded-full pointer-events-none"></div>

            <!-- Content Top: Logo & Brand Name -->
            <div class="relative z-10 flex items-center gap-3">
                <div class="bg-brand-accent p-2.5 rounded-xl text-white shadow-md flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.237 8.237 0 0118 18.75c1.18 0 2.296.25 3.25.707a.75.75 0 001-.707V4.533a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-wider">BACALOKA</span>
            </div>

            <!-- Content Middle: Tagline & Description -->
            <div class="relative z-10 my-8">
                <h1 class="text-3xl md:text-4xl font-bold leading-tight mb-4">
                    Sistem Layanan<br>Perpustakaan<br>Digital
                </h1>
                <p class="text-gray-300 text-sm leading-relaxed max-w-sm">
                    Akses koleksi buku, kelola aktivitas perpustakaan, dan nikmati layanan digital dalam satu platform.
                </p>
            </div>

            <!-- Content Bottom: Footer Copyright -->
            <div class="relative z-10 text-xs text-gray-400">
                &copy; 2026 Perpustakaan Bacaloka
            </div>
        </div>

        <!-- Sisi Kanan: Form Login -->
        <div class="md:w-1/2 bg-[#f8fafc] p-8 md:p-12 flex flex-col justify-center">
            
            <div class="mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-slate-800 mb-2">Selamat Datang</h2>
                <p class="text-slate-500 text-sm">Masuk ke akun Anda untuk melanjutkan</p>
            </div>

            <!-- Pesan Error Session -->
            @if(session('error'))
                <div class="mb-4 p-3 bg-red-100 border border-red-200 text-red-700 text-sm rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <form id="loginForm" action="{{ route('login.post') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Input Username -->
                <div>
                    <label for="username" class="block text-sm font-semibold text-slate-700 mb-2">
                        Username <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        value="{{ old('username') }}"
                        placeholder="Masukkan username" 
                        required
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 text-sm focus:outline-none focus:border-brand-dark focus:ring-1 focus:ring-brand-dark transition-all shadow-sm"
                    >
                    @error('username')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Input Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Masukkan password" 
                        required
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 text-sm focus:outline-none focus:border-brand-dark focus:ring-1 focus:ring-brand-dark transition-all shadow-sm"
                    >
                    @error('password')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <button 
                    type="submit" 
                    id="submitBtn"
                    class="w-full bg-brand-dark hover:bg-brand-hover text-white font-semibold py-3.5 px-4 rounded-xl shadow-md transition-all duration-200 text-sm mt-2 flex items-center justify-center"
                >
                    Masuk
                </button>
            </form>

        </div>

    </div>

</body>
</html>