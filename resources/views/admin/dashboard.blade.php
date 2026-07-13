<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BACALOKA Admin</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])
</head>
<body class="bg-slate-100 font-sans text-slate-800 antialiased min-h-screen flex">

    <!-- Sidebar (Persis Sesuai Image Figma) -->
    <aside class="w-64 bg-brand-dark text-white flex flex-col justify-between shrink-0 min-h-screen">
        <div>
            <!-- Logo & Brand Header -->
            <div class="p-6 flex items-center gap-3 border-b border-white/10">
                <div class="bg-brand-accent p-2 rounded-xl text-white shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.237 8.237 0 0118 18.75c1.18 0 2.296.25 3.25.707a.75.75 0 001-.707V4.533a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
                    </svg>
                </div>
                <span class="font-bold text-lg tracking-wider">BACALOKA</span>
            </div>

            <!-- Menu Navigation -->
            <div class="p-4 space-y-1">
                <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">MENU</p>
                
                <!-- Active Item: Dashboard -->
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-white/10 text-white font-semibold text-sm transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span>Dashboard</span>
                    <span class="w-1.5 h-1.5 bg-amber-400 rounded-full ml-auto"></span>
                </a>

                <a href="{{ route('admin.buku.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-white/5 hover:text-white font-medium text-sm transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span>Kelola Data Buku</span>
                </a>

                <a href="{{ route('admin.anggota.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-white/5 hover:text-white font-medium text-sm transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    <span>Pendaftaran Anggota</span>
                </a>

                <a href="{{ route('admin.pengembalian.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-white/5 hover:text-white font-medium text-sm transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <span>Pengembalian</span>
                </a>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="p-4 border-t border-white/10">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-red-500/10 hover:text-red-400 font-medium text-sm transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-8 overflow-y-auto">
        
        <!-- Header Top Bar -->
        <div class="flex items-center justify-between mb-8">
            <div class="text-xs text-slate-500 font-semibold">
                {{ \Carbon\Carbon::now()->translatedFormat('d M Y') }}
            </div>

            <!-- Profile Info -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-brand-dark text-white flex items-center justify-center font-bold text-sm">
                    A
                </div>
                <div>
                    <h5 class="font-bold text-slate-800 text-sm leading-tight">{{ Auth::user()->nama }}</h5>
                    <p class="text-xs text-slate-500 capitalize">{{ Auth::user()->role }}</p>
                </div>
            </div>
        </div>

        <!-- Title Section -->
        <div class="mb-8">
            <h1 class="text-2xl font-extrabold text-slate-900">Dashboard</h1>
            <p class="text-xs text-slate-500 mt-1">Ringkasan aktivitas perpustakaan hari ini, {{ \Carbon\Carbon::now()->translatedFormat('d M Y') }}.</p>
        </div>

        <!-- 4 Stat Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            
            <!-- Stat 1: Total Judul Buku -->
            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div>
                    <p class="text-[11px] font-semibold text-slate-500 uppercase">Total Judul Buku</p>
                    <h3 class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $totalJudulBuku }}</h3>
                    <p class="text-[11px] text-slate-400">{{ $totalEksemplar }} eksemplar</p>
                </div>
            </div>

            <!-- Stat 2: Total Anggota -->
            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[11px] font-semibold text-slate-500 uppercase">Total Anggota</p>
                    <h3 class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $totalAnggota }}</h3>
                    <p class="text-[11px] text-slate-400">{{ $anggotaAktif }} anggota aktif</p>
                </div>
            </div>

            <!-- Stat 3: Buku Dipinjam -->
            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center text-purple-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <div>
                    <p class="text-[11px] font-semibold text-slate-500 uppercase">Buku Dipinjam</p>
                    <h3 class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $bukuDipinjam }}</h3>
                    <p class="text-[11px] text-slate-400">transaksi aktif</p>
                </div>
            </div>

            <!-- Stat 4: Buku Terlambat -->
            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-rose-50 rounded-xl flex items-center justify-center text-rose-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[11px] font-semibold text-slate-500 uppercase">Buku Terlambat</p>
                    <h3 class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $bukuTerlambat }}</h3>
                    <p class="text-[11px] text-slate-400">perlu penanganan</p>
                </div>
            </div>

        </div>

        <!-- Tabel Aktivitas Peminjaman Terbaru -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden mb-8">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-slate-900 text-base">Aktivitas Peminjaman Terbaru</h3>
                <a href="#" class="text-xs font-semibold text-brand-dark hover:underline flex items-center gap-1">
                    Lihat semua &rarr;
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                            <th class="py-3.5 px-6">ANGGOTA</th>
                            <th class="py-3.5 px-6">JUDUL BUKU</th>
                            <th class="py-3.5 px-6">TGL PINJAM</th>
                            <th class="py-3.5 px-6">JATUH TEMPO</th>
                            <th class="py-3.5 px-6">STATUS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs">
                        @forelse($aktivitasTerbaru as $detail)
                            @php
                                $isTerlambat = $detail->status_buku === 'Dipinjam' && \Carbon\Carbon::now()->toDateString() > $detail->peminjaman->tanggal_jatuh_tempo;
                            @endphp
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="py-4 px-6 font-semibold text-slate-800">
                                    {{ $detail->peminjaman->user->nama ?? '-' }}
                                    <span class="block text-[10px] text-slate-400 font-mono mt-0.5">AG-{{ sprintf('%04d', $detail->peminjaman->user->id_user ?? 0) }}</span>
                                </td>
                                <td class="py-4 px-6 text-slate-700">
                                    {{ $detail->buku->judul ?? '-' }}
                                    <span class="block text-[10px] text-slate-400 font-mono mt-0.5">{{ $detail->buku->kode_buku ?? '-' }}</span>
                                </td>
                                <td class="py-4 px-6 text-slate-600">
                                    {{ \Carbon\Carbon::parse($detail->peminjaman->tanggal_pinjam)->translatedFormat('d M Y') }}
                                </td>
                                <td class="py-4 px-6 text-slate-600">
                                    {{ \Carbon\Carbon::parse($detail->peminjaman->tanggal_jatuh_tempo)->translatedFormat('d M Y') }}
                                </td>
                                <td class="py-4 px-6">
                                    @if($detail->status_buku === 'Kembali')
                                        <span class="px-3 py-1 rounded-full text-[11px] font-semibold bg-emerald-100 text-emerald-700">Dikembalikan</span>
                                    @elseif($isTerlambat)
                                        <span class="px-3 py-1 rounded-full text-[11px] font-semibold bg-rose-100 text-rose-700">Terlambat</span>
                                    @else
                                        <span class="px-3 py-1 rounded-full text-[11px] font-semibold bg-sky-100 text-sky-700">Aktif</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-6 text-center text-slate-400 text-xs">Belum ada aktivitas peminjaman.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 3 Quick Action Buttons -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('admin.buku.index') }}" class="p-5 bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:border-brand-dark transition-all flex items-center gap-4 group">
                <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-600 group-hover:bg-brand-dark group-hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <div>
                    <h5 class="font-bold text-slate-800 text-sm">Tambah Buku Baru</h5>
                    <p class="text-xs text-slate-400 mt-0.5">Daftarkan koleksi ke sistem</p>
                </div>
            </a>

            <a href="{{ route('admin.anggota.index') }}" class="p-5 bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:border-brand-dark transition-all flex items-center gap-4 group">
                <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-600 group-hover:bg-brand-dark group-hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <div>
                    <h5 class="font-bold text-slate-800 text-sm">Daftar Anggota</h5>
                    <p class="text-xs text-slate-400 mt-0.5">Tambah anggota perpustakaan</p>
                </div>
            </a>

            <a href="{{ route('admin.pengembalian.index') }}" class="p-5 bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:border-brand-dark transition-all flex items-center gap-4 group">
                <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-600 group-hover:bg-brand-dark group-hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </div>
                <div>
                    <h5 class="font-bold text-slate-800 text-sm">Validasi Pengembalian</h5>
                    <p class="text-xs text-slate-400 mt-0.5">Proses buku yang dikembalikan</p>
                </div>
            </a>
        </div>

    </main>

</body>
</html>