<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku - BACALOKA Digital</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/user_katalog.js'])
</head>
<body class="bg-slate-100 font-sans text-slate-800 antialiased min-h-screen">

    <!-- Top Navigation Bar Navy (Sesuai image_00aff6.png) -->
    <nav class="bg-brand-dark text-white px-6 py-4 sticky top-0 z-40 shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            
            <!-- Brand Logo -->
            <div class="flex items-center gap-3">
                <div class="bg-brand-accent p-2 rounded-xl text-white shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.237 8.237 0 0118 18.75c1.18 0 2.296.25 3.25.707a.75.75 0 001-.707V4.533a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
                    </svg>
                </div>
                <span class="font-bold text-lg tracking-wider">Bacaloka</span>
            </div>

            <!-- Navigation Links -->
            <div class="flex items-center gap-2">
                <a href="{{ route('user.dashboard') }}" class="px-4 py-2 bg-white/10 text-amber-400 font-semibold text-xs rounded-xl flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>Katalog Buku</span>
                </a>

                <a href="#" class="px-4 py-2 text-slate-300 hover:text-white font-medium text-xs rounded-xl flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Riwayat Pinjam</span>
                </a>
            </div>

            <!-- User Profile & Logout -->
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-full bg-brand-accent text-white font-bold text-xs flex items-center justify-center">
                        {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
                    </div>
                    <span class="font-bold text-xs text-white">{{ Auth::user()->nama }}</span>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-xs text-slate-300 hover:text-white flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>

        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-8">
        
        <!-- Alert Notification -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-100 border border-emerald-200 text-emerald-800 text-xs rounded-2xl flex justify-between items-center">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="font-bold text-emerald-800">&times;</button>
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 p-4 bg-rose-100 border border-rose-200 text-rose-800 text-xs rounded-2xl flex justify-between items-center">
                <span>{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()" class="font-bold text-rose-800">&times;</button>
            </div>
        @endif

        <!-- Big Banner Search (Sesuai image_00aff6.png) -->
        <div class="bg-brand-dark rounded-3xl p-8 md:p-12 text-white relative overflow-hidden mb-8 shadow-xl">
            <div class="absolute -top-12 -left-12 w-64 h-64 bg-white/5 rounded-full pointer-events-none"></div>
            <div class="absolute -bottom-20 -right-10 w-80 h-80 bg-white/5 rounded-full pointer-events-none"></div>

            <div class="relative z-10 max-w-2xl">
                <p class="text-xs text-brand-accent font-semibold mb-2">Perpustakaan Digital - Bacaloka</p>
                <h1 class="text-3xl md:text-4xl font-extrabold mb-6 leading-tight">Temukan Buku yang Kamu Butuhkan</h1>

                <form action="{{ route('user.dashboard') }}" method="GET">
                    <div class="relative">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Cari judul, pengarang, kategori, atau ID buku..." 
                            class="w-full px-5 py-4 bg-white rounded-2xl text-slate-800 placeholder-slate-400 text-sm focus:outline-none shadow-lg"
                        >
                        <button type="submit" class="absolute right-3 top-3 px-5 py-2 bg-brand-dark text-white rounded-xl text-xs font-semibold hover:bg-brand-hover">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Category Filter Pills (Sesuai image_00aff6.png) -->
        <div class="flex flex-wrap items-center gap-3 mb-6">
            @php $categories = ['Semua', 'Informatika', 'Matematika', 'Web', 'Statistika']; @endphp
            @foreach($categories as $cat)
                <a 
                    href="{{ route('user.dashboard', ['kategori' => $cat, 'search' => request('search')]) }}" 
                    class="px-5 py-2.5 rounded-full text-xs font-bold transition-all {{ $selectedKategori === $cat ? 'bg-brand-dark text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-200' }}"
                >
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <p class="text-xs text-slate-500 font-medium mb-6">{{ $totalDitemukan }} buku ditemukan</p>

        <!-- Grid Cards Buku (Sesuai image_00aff6.png) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($buku as $item)
                @php
                    // Array Warna Khas Header Card
                    $colors = [
                        'Informatika' => 'bg-[#1e3a5f]',
                        'Matematika' => 'bg-[#7c3aed]',
                        'Web' => 'bg-[#0284c7]',
                        'Statistika' => 'bg-[#854d0e]'
                    ];
                    $bgCard = $colors[$item->kategori] ?? 'bg-[#059669]';
                @endphp
                <div 
                    class="card-buku bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200/80 hover:shadow-xl transition-all cursor-pointer group"
                    data-id="{{ $item->id_buku }}"
                >
                    <div class="{{ $bgCard }} h-44 p-4 flex flex-col justify-between relative">
                        <div class="flex justify-between items-center">
                            <span class="text-[11px] font-mono text-white/70 bg-black/20 px-2 py-0.5 rounded">{{ $item->kode_buku }}</span>
                            @if($item->stok > 0)
                                <span class="text-[11px] font-semibold text-emerald-800 bg-emerald-100 px-3 py-1 rounded-full">Tersedia</span>
                            @else
                                <span class="text-[11px] font-semibold text-rose-800 bg-rose-100 px-3 py-1 rounded-full">Habis</span>
                            @endif
                        </div>
                        <div class="flex justify-center items-center pb-2 text-white/30 group-hover:scale-110 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>

                    <div class="p-5 space-y-1">
                        <h4 class="font-bold text-slate-800 text-base leading-snug group-hover:text-brand-dark transition-colors">{{ $item->judul }}</h4>
                        <p class="text-xs text-slate-500">{{ $item->pengarang }}</p>
                        <p class="text-xs font-semibold text-amber-500 pt-2">{{ $item->kategori }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center text-slate-400 text-xs bg-white rounded-2xl border border-slate-200">
                    Tidak ada buku yang sesuai dengan pencarian Anda.
                </div>
            @endforelse
        </div>

    </main>

    <!-- MODAL POPUP: DETAIL BUKU & PINJAM (Sesuai image_00b016.png) -->
    <div id="detailModal" class="hidden fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full overflow-hidden animate-in fade-in zoom-in-95 duration-150">
            
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-slate-800 text-base">Detail Buku</h3>
                <button id="closeDetailModalBtn" class="text-slate-400 hover:text-slate-600 text-lg font-bold">&times;</button>
            </div>

            <div class="p-6 space-y-6">
                <!-- Top Section Graphic & Info -->
                <div class="flex gap-5 items-center">
                    <div class="w-24 h-32 bg-brand-dark rounded-xl flex flex-col justify-between p-3 text-white shrink-0 relative overflow-hidden shadow-md">
                        <span id="modalKodeBuku" class="text-[9px] font-mono text-white/70"></span>
                        <div class="flex justify-center text-white/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div></div>
                    </div>

                    <div class="space-y-1">
                        <h3 id="modalJudul" class="text-xl font-bold text-slate-800 leading-tight"></h3>
                        <p id="modalPengarang" class="text-xs text-slate-500"></p>
                        <p id="modalPenerbit" class="text-xs text-slate-400"></p>

                        <div class="flex items-center gap-2 pt-2">
                            <span id="modalKategoriPill" class="px-3 py-1 bg-sky-50 text-sky-600 border border-sky-100 rounded-full text-[11px] font-semibold"></span>
                            <span id="modalStokPill" class="px-3 py-1 bg-emerald-50 text-emerald-600 border border-emerald-100 rounded-full text-[11px] font-semibold"></span>
                        </div>
                    </div>
                </div>

                <!-- Detail Grid Info Box -->
                <div class="bg-slate-50 p-4 rounded-2xl grid grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="text-slate-400 block mb-0.5">Penerbit</span>
                        <span id="modalPenerbitBody" class="font-bold text-slate-800"></span>
                    </div>

                    <div>
                        <span class="text-slate-400 block mb-0.5">Stok</span>
                        <span id="modalStokBody" class="font-bold text-slate-800"></span>
                    </div>

                    <div>
                        <span class="text-slate-400 block mb-0.5">Kategori</span>
                        <span id="modalKategoriBody" class="font-bold text-slate-800"></span>
                    </div>

                    <div>
                        <span class="text-slate-400 block mb-0.5">Durasi Pinjam</span>
                        <span class="font-bold text-slate-800">14 hari</span>
                    </div>
                </div>

                <!-- Form Submit Pinjam -->
                <form id="pinjamForm" method="POST">
                    @csrf
                    <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-4">
                        <button id="cancelDetailModalBtn" type="button" class="px-5 py-2.5 border border-slate-200 text-slate-600 hover:bg-slate-50 font-semibold text-xs rounded-xl transition-all">
                            Tutup
                        </button>
                        <button id="modalPinjamBtn" type="submit" class="px-6 py-2.5 bg-brand-dark hover:bg-brand-hover text-white font-semibold text-xs rounded-xl shadow-md transition-all">
                            Pinjam Buku Ini
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>

</body>
</html>