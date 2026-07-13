<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BACALOKA - Sistem Layanan Perpustakaan Digital</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/landing.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-brand-dark selection:text-white">

    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo & Brand -->
                <a href="#beranda" class="flex items-center gap-3">
                    <div class="bg-brand-accent p-2.5 rounded-xl text-white shadow-md flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.237 8.237 0 0118 18.75c1.18 0 2.296.25 3.25.707a.75.75 0 001-.707V4.533a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-wider text-brand-dark">BACALOKA</span>
                </a>

                <!-- Navigation Links (Desktop) -->
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-600">
                    <a href="#beranda" class="hover:text-brand-dark transition-colors">Beranda</a>
                    <a href="#fitur" class="hover:text-brand-dark transition-colors">Layanan</a>
                    <a href="#koleksi" class="hover:text-brand-dark transition-colors">Katalog Koleksi</a>
                    <a href="#tentang" class="hover:text-brand-dark transition-colors">Tentang Kami</a>
                </div>

                <!-- Auth Buttons (Desktop) -->
                <div class="hidden md:flex items-center gap-3">
                    <a href="{{ route('login') }}" class="px-5 py-2.5 text-sm font-semibold text-brand-dark hover:bg-slate-100 rounded-xl transition-all">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="px-5 py-2.5 text-sm font-semibold text-white bg-brand-dark hover:bg-brand-hover rounded-xl shadow-md transition-all">
                        Registrasi
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobileMenuBtn" type="button" class="p-2 rounded-lg text-slate-600 hover:bg-slate-100 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobileMenu" class="hidden md:hidden border-b border-slate-100 bg-white px-4 pt-2 pb-6 space-y-3">
            <a href="#beranda" class="block py-2 text-slate-600 font-medium">Beranda</a>
            <a href="#fitur" class="block py-2 text-slate-600 font-medium">Layanan</a>
            <a href="#koleksi" class="block py-2 text-slate-600 font-medium">Katalog Koleksi</a>
            <a href="#tentang" class="block py-2 text-slate-600 font-medium">Tentang Kami</a>
            <div class="pt-4 border-t border-slate-100 flex flex-col gap-2">
                <a href="{{ route('login') }}" class="w-full text-center py-2.5 font-semibold text-brand-dark border border-brand-dark rounded-xl">Masuk</a>
                <a href="{{ route('login') }}" class="w-full text-center py-2.5 font-semibold text-white bg-brand-dark rounded-xl">Registrasi</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="relative overflow-hidden pt-12 pb-20 md:pt-20 md:pb-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                
                <!-- Hero Left Content -->
                <div class="space-y-6 text-center md:text-left">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-100 border border-slate-200 text-brand-dark text-xs font-semibold">
                        <span class="w-2 h-2 rounded-full bg-brand-accent"></span>
                        Perpustakaan Digital Terpadu
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 leading-tight">
                        Eksplorasi Ilmu Tanpa Batas Bersama <span class="text-brand-dark">BACALOKA</span>
                    </h1>
                    <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-xl mx-auto md:mx-0">
                        Akses ribuan koleksi buku digital, kelola peminjaman mandiri, dan nikmati kemudahan sirkulasi perpustakaan modern dalam satu platform.
                    </p>
                    <div class="pt-2 flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="{{ route('login') }}" class="px-8 py-4 bg-brand-dark hover:bg-brand-hover text-white font-bold rounded-xl shadow-lg shadow-brand-dark/20 text-center transition-all duration-200">
                            Masuk ke Layanan
                        </a>
                        <a href="#koleksi" class="px-8 py-4 bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 font-semibold rounded-xl text-center transition-all duration-200">
                            Lihat Katalog Buku
                        </a>
                    </div>
                </div>

                <!-- Hero Right Graphic Card -->
                <div class="relative flex justify-center">
                    <div class="w-full max-w-md bg-brand-dark rounded-3xl p-8 text-white shadow-2xl relative overflow-hidden">
                        <div class="absolute -top-12 -left-12 w-48 h-48 bg-white/5 rounded-full pointer-events-none"></div>
                        <div class="absolute -bottom-16 -right-16 w-64 h-64 bg-white/5 rounded-full pointer-events-none"></div>

                        <div class="relative z-10 space-y-6">
                            <div class="flex items-center justify-between border-b border-white/10 pb-4">
                                <div class="flex items-center gap-3">
                                    <div class="bg-brand-accent p-2 rounded-lg text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                                        </svg>
                                    </div>
                                    <span class="font-bold tracking-wide">BACALOKA HUB</span>
                                </div>
                                <span class="text-xs bg-white/10 px-2.5 py-1 rounded-full text-brand-accent font-medium">Akses Online</span>
                            </div>

                            <div class="space-y-3">
                                <p class="text-xs text-slate-300 uppercase tracking-widest font-semibold">Statistik Platform</p>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-white/10 p-4 rounded-2xl backdrop-blur-sm">
                                        <div class="text-2xl font-bold text-white">1,200+</div>
                                        <div class="text-xs text-slate-300 mt-1">Koleksi Buku</div>
                                    </div>
                                    <div class="bg-white/10 p-4 rounded-2xl backdrop-blur-sm">
                                        <div class="text-2xl font-bold text-white">500+</div>
                                        <div class="text-xs text-slate-300 mt-1">Anggota Aktif</div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-4 bg-white/10 rounded-2xl backdrop-blur-sm flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-brand-accent shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                <div class="text-xs">
                                    <p class="font-bold text-white">Peminjaman Serba Otomatis</p>
                                    <p class="text-slate-300">Pencarian katalog & kalkulasi jatuh tempo terstruktur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-20 bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-xs uppercase tracking-widest text-brand-accent font-extrabold mb-2">Layanan Utama</h2>
                <p class="text-3xl font-extrabold text-slate-900">Fitur Unggulan Perpustakaan BACALOKA</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-8 rounded-2xl bg-slate-50 border border-slate-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-12 h-12 bg-brand-dark/10 text-brand-dark rounded-xl flex items-center justify-center mb-6 group-hover:bg-brand-dark group-hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Pencarian Katalog Mandiri</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Cari koleksi buku favorit berdasarkan judul, pengarang, maupun penerbit secara cepat dan akurat.
                    </p>
                </div>

                <div class="p-8 rounded-2xl bg-slate-50 border border-slate-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-12 h-12 bg-brand-dark/10 text-brand-dark rounded-xl flex items-center justify-center mb-6 group-hover:bg-brand-dark group-hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Sirkulasi & Peminjaman</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Pengajuan peminjaman instan dengan pencatatan tanggal pinjam dan estimasi tanggal jatuh tempo otomatis.
                    </p>
                </div>

                <div class="p-8 rounded-2xl bg-slate-50 border border-slate-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-12 h-12 bg-brand-dark/10 text-brand-dark rounded-xl flex items-center justify-center mb-6 group-hover:bg-brand-dark group-hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Manajemen Denda Terstruktur</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Sistem mencatat masa pengembalian riil dan menghitung penalti keterlambatan secara otomatis dan akurat.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: Katalog Koleksi Buku (Persis Sesuai image_fe69fb.png) -->
    <section id="koleksi" class="py-20 bg-slate-100 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <h2 class="text-xs uppercase tracking-widest text-brand-accent font-extrabold mb-2">Pustaka Digital</h2>
                    <p class="text-3xl font-extrabold text-slate-900">Katalog Koleksi Buku Terbaru</p>
                </div>
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-sm font-bold text-brand-dark hover:underline">
                    Lihat Semua Koleksi
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            <!-- Grid Kartu Buku (8 Item Sesuai Figma) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Buku 1: Algoritma dan Pemrograman (Navy) -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200 hover:shadow-lg transition-all">
                    <div class="bg-[#1e3a5f] h-44 p-4 flex flex-col justify-between relative">
                        <div class="flex justify-between items-center">
                            <span class="text-[11px] font-mono text-white/70 bg-black/20 px-2 py-0.5 rounded">BK-0001</span>
                            <span class="text-[11px] font-semibold text-emerald-800 bg-emerald-100 px-3 py-1 rounded-full">Tersedia</span>
                        </div>
                        <div class="flex justify-center items-center pb-2 text-white/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                    <div class="p-5 space-y-1">
                        <h4 class="font-bold text-slate-800 text-base leading-snug">Algoritma dan Pemrograman</h4>
                        <p class="text-xs text-slate-500">Marty Puso</p>
                        <p class="text-xs font-semibold text-amber-500 pt-2">Informatika</p>
                    </div>
                </div>

                <!-- Buku 2: Kalkulus Jilid 1 (Ungu) -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200 hover:shadow-lg transition-all">
                    <div class="bg-[#7c3aed] h-44 p-4 flex flex-col justify-between relative">
                        <div class="flex justify-between items-center">
                            <span class="text-[11px] font-mono text-white/70 bg-black/20 px-2 py-0.5 rounded">BK-0002</span>
                            <span class="text-[11px] font-semibold text-emerald-800 bg-emerald-100 px-3 py-1 rounded-full">Tersedia</span>
                        </div>
                        <div class="flex justify-center items-center pb-2 text-white/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                    <div class="p-5 space-y-1">
                        <h4 class="font-bold text-slate-800 text-base leading-snug">Kalkulus Jilid 1</h4>
                        <p class="text-xs text-slate-500">Anton Rising</p>
                        <p class="text-xs font-semibold text-amber-500 pt-2">Matematika</p>
                    </div>
                </div>

                <!-- Buku 3: Sistem Operasi Modern (Hijau Toska) -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200 hover:shadow-lg transition-all">
                    <div class="bg-[#059669] h-44 p-4 flex flex-col justify-between relative">
                        <div class="flex justify-between items-center">
                            <span class="text-[11px] font-mono text-white/70 bg-black/20 px-2 py-0.5 rounded">BK-0003</span>
                            <span class="text-[11px] font-semibold text-emerald-800 bg-emerald-100 px-3 py-1 rounded-full">Tersedia</span>
                        </div>
                        <div class="flex justify-center items-center pb-2 text-white/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                    <div class="p-5 space-y-1">
                        <h4 class="font-bold text-slate-800 text-base leading-snug">Sistem Operasi Modern</h4>
                        <p class="text-xs text-slate-500">Andre Taulany</p>
                        <p class="text-xs font-semibold text-amber-500 pt-2">Informatika</p>
                    </div>
                </div>

                <!-- Buku 4: Basis Data (Cokelat - Habis) -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200 hover:shadow-lg transition-all">
                    <div class="bg-[#c2410c] h-44 p-4 flex flex-col justify-between relative">
                        <div class="flex justify-between items-center">
                            <span class="text-[11px] font-mono text-white/70 bg-black/20 px-2 py-0.5 rounded">BK-0004</span>
                            <span class="text-[11px] font-semibold text-red-800 bg-red-100 px-3 py-1 rounded-full">Habis</span>
                        </div>
                        <div class="flex justify-center items-center pb-2 text-white/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                    <div class="p-5 space-y-1">
                        <h4 class="font-bold text-slate-800 text-base leading-snug">Basis Data</h4>
                        <p class="text-xs text-slate-500">Firmansyah</p>
                        <p class="text-xs font-semibold text-amber-500 pt-2">Informatika</p>
                    </div>
                </div>

                <!-- Buku 5: Jaringan Komputer (Merah) -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200 hover:shadow-lg transition-all">
                    <div class="bg-[#dc2626] h-44 p-4 flex flex-col justify-between relative">
                        <div class="flex justify-between items-center">
                            <span class="text-[11px] font-mono text-white/70 bg-black/20 px-2 py-0.5 rounded">BK-0005</span>
                            <span class="text-[11px] font-semibold text-emerald-800 bg-emerald-100 px-3 py-1 rounded-full">Tersedia</span>
                        </div>
                        <div class="flex justify-center items-center pb-2 text-white/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                    <div class="p-5 space-y-1">
                        <h4 class="font-bold text-slate-800 text-base leading-snug">Jaringan Komputer</h4>
                        <p class="text-xs text-slate-500">Beny Blounz</p>
                        <p class="text-xs font-semibold text-amber-500 pt-2">Informatika</p>
                    </div>
                </div>

                <!-- Buku 6: Pemrograman Web (Biru Cerah) -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200 hover:shadow-lg transition-all">
                    <div class="bg-[#0284c7] h-44 p-4 flex flex-col justify-between relative">
                        <div class="flex justify-between items-center">
                            <span class="text-[11px] font-mono text-white/70 bg-black/20 px-2 py-0.5 rounded">BK-0006</span>
                            <span class="text-[11px] font-semibold text-emerald-800 bg-emerald-100 px-3 py-1 rounded-full">Tersedia</span>
                        </div>
                        <div class="flex justify-center items-center pb-2 text-white/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                    <div class="p-5 space-y-1">
                        <h4 class="font-bold text-slate-800 text-base leading-snug">Pemrograman Web</h4>
                        <p class="text-xs text-slate-500">Abdul Kadir</p>
                        <p class="text-xs font-semibold text-amber-500 pt-2">Web</p>
                    </div>
                </div>

                <!-- Buku 7: Statistika untuk Penelitian (Cokelat Tua) -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200 hover:shadow-lg transition-all">
                    <div class="bg-[#854d0e] h-44 p-4 flex flex-col justify-between relative">
                        <div class="flex justify-between items-center">
                            <span class="text-[11px] font-mono text-white/70 bg-black/20 px-2 py-0.5 rounded">BK-0007</span>
                            <span class="text-[11px] font-semibold text-emerald-800 bg-emerald-100 px-3 py-1 rounded-full">Tersedia</span>
                        </div>
                        <div class="flex justify-center items-center pb-2 text-white/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                    <div class="p-5 space-y-1">
                        <h4 class="font-bold text-slate-800 text-base leading-snug">Statistika untuk Penelitian</h4>
                        <p class="text-xs text-slate-500">Sugiyono</p>
                        <p class="text-xs font-semibold text-amber-500 pt-2">Statistika</p>
                    </div>
                </div>

                <!-- Buku 8: Matematika Diskrit (Hijau Gelap) -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200 hover:shadow-lg transition-all">
                    <div class="bg-[#065f46] h-44 p-4 flex flex-col justify-between relative">
                        <div class="flex justify-between items-center">
                            <span class="text-[11px] font-mono text-white/70 bg-black/20 px-2 py-0.5 rounded">BK-0008</span>
                            <span class="text-[11px] font-semibold text-emerald-800 bg-emerald-100 px-3 py-1 rounded-full">Tersedia</span>
                        </div>
                        <div class="flex justify-center items-center pb-2 text-white/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                    <div class="p-5 space-y-1">
                        <h4 class="font-bold text-slate-800 text-base leading-snug">Matematika Diskrit</h4>
                        <p class="text-xs text-slate-500">Susanna Epp</p>
                        <p class="text-xs font-semibold text-amber-500 pt-2">Matematika</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION: Tentang Kami (Informasi UNAIR Kampus C) -->
    <section id="tentang" class="py-20 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <div class="space-y-6">
                    <div>
                        <h2 class="text-xs uppercase tracking-widest text-brand-accent font-extrabold mb-2">Profil Pengembang</h2>
                        <h3 class="text-3xl font-extrabold text-slate-900 leading-tight">Proyek Sistem Informasi Perpustakaan BACALOKA</h3>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        BACALOKA merupakan platform sistem informasi peminjaman buku perpustakaan digital berbasis web yang dikembangkan oleh mahasiswa Program Studi S1 Sistem Informasi, Fakultas Sains dan Teknologi, Universitas Airlangga. Platform ini dirancang untuk mengotomatisasi seluruh siklus operasional perpustakaan modern.
                    </p>
                    
                    <div class="space-y-4 pt-2">
                        <!-- Alamat UNAIR Kampus C -->
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-brand-dark/10 text-brand-dark rounded-xl flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-slate-800 text-sm">Lokasi Kampus</h5>
                                <p class="text-xs text-slate-600 mt-0.5">
                                    Gedung FST, Kampus C Universitas Airlangga, Jl. Mulyorejo, Surabaya, Jawa Timur 60115
                                </p>
                            </div>
                        </div>

                        <!-- No Telp & Kontak -->
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-brand-dark/10 text-brand-dark rounded-xl flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h32a2 2 0 012 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2V5zm0 6a2 2 0 012-2h32a2 2 0 012 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2zm0 6a2 2 0 012-2h32a2 2 0 012 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2z" />
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-slate-800 text-sm">Kontak Akademik</h5>
                                <p class="text-xs text-slate-600 mt-0.5">
                                    Telepon: (031) 5936501 / (031) 5924622<br>
                                    Email: info@fst.unair.ac.id
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Info FST UNAIR -->
                <div class="bg-brand-dark rounded-3xl p-8 text-white relative overflow-hidden shadow-xl">
                    <div class="relative z-10 space-y-4">
                        <span class="text-xs font-semibold bg-brand-accent text-white px-3 py-1 rounded-full inline-block">UNIVERSITAS AIRLANGGA</span>
                        <h4 class="text-2xl font-bold">Program Studi S1 Sistem Informasi</h4>
                        <p class="text-slate-300 text-xs leading-relaxed">
                            Mengembangkan keahlian dalam rekayasa perangkat lunak, manajemen basis data, dan analisis sistem terstruktur untuk menghasilkan solusi teknologi informasi bermutu tinggi.
                        </p>
                        <div class="pt-4 border-t border-white/10 text-xs text-slate-400">
                            Fakultas Sains dan Teknologi &bull; UNAIR
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-brand-dark text-white border-t border-white/10 pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 border-b border-white/10 pb-8">
                <div class="flex items-center gap-3">
                    <div class="bg-brand-accent p-2 rounded-xl text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.237 8.237 0 0118 18.75c1.18 0 2.296.25 3.25.707a.75.75 0 001-.707V4.533a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
                        </svg>
                    </div>
                    <span class="text-lg font-bold tracking-wider">BACALOKA</span>
                </div>
                <p class="text-slate-400 text-sm text-center md:text-right">
                    Sistem Informasi Peminjaman Buku Perpustakaan Berbasis Web.
                </p>
            </div>
            <div class="pt-8 text-center text-xs text-slate-400">
                &copy; 2026 Perpustakaan Bacaloka &bull; S1 Sistem Informasi Universitas Airlangga.
            </div>
        </div>
    </footer>

</body>
</html>