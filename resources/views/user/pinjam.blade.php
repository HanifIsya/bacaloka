<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Peminjaman - BACALOKA Digital</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])
</head>
<body class="bg-slate-100 font-sans text-slate-800 antialiased min-h-screen">

    <!-- Top Navigation Bar -->
    <nav class="bg-brand-dark text-white px-6 py-4 sticky top-0 z-40 shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="bg-brand-accent p-2 rounded-xl text-white shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.237 8.237 0 0118 18.75c1.18 0 2.296.25 3.25.707a.75.75 0 001-.707V4.533a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
                    </svg>
                </div>
                <span class="font-bold text-lg tracking-wider">Bacaloka</span>
            </div>

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

            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-full bg-brand-accent text-white font-bold text-xs flex items-center justify-center">
                        {{ strtoupper(substr($user->nama, 0, 1)) }}
                    </div>
                    <span class="font-bold text-xs text-white">{{ $user->nama }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-xs text-slate-300 hover:text-white flex items-center gap-1">
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Card Section -->
    <main class="max-w-xl mx-auto px-4 py-10">
        
        <!-- Back Button -->
        <a href="{{ route('user.dashboard') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-slate-800 mb-6 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Katalog
        </a>

        <!-- Card Konfirmasi Peminjaman -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-200/80 overflow-hidden">
            <div class="p-8 border-b border-slate-100">
                <h2 class="text-2xl font-bold text-slate-900">Konfirmasi Peminjaman</h2>
                <p class="text-xs text-slate-400 mt-1">Periksa detail peminjaman sebelum konfirmasi</p>
            </div>

            <div class="p-8 space-y-6">
                <!-- Book Item Detail -->
                <div class="flex gap-4 items-center border-b border-slate-100 pb-6">
                    <div class="w-20 h-28 bg-brand-dark rounded-2xl flex flex-col justify-between p-3 text-white shrink-0 relative overflow-hidden shadow-sm">
                        <span class="text-[9px] font-mono text-white/70">{{ $buku->kode_buku }}</span>
                        <div class="flex justify-center text-white/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div></div>
                    </div>

                    <div class="space-y-1">
                        <h3 class="text-lg font-bold text-slate-800">{{ $buku->judul }}</h3>
                        <p class="text-xs text-slate-500">{{ $buku->pengarang }}</p>
                        <p class="text-xs text-slate-400">{{ $buku->penerbit }}</p>
                        <div class="pt-2">
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-600 border border-emerald-100 rounded-full text-[11px] font-semibold">
                                {{ $buku->stok }} stok tersedia
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Info Rincian -->
                <div class="space-y-4 text-xs">
                    <div class="flex justify-between items-center">
                        <span class="text-slate-500 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Peminjam
                        </span>
                        <div class="text-right">
                            <span class="font-bold text-slate-800 block">{{ $user->nama }}</span>
                            <span class="text-[10px] text-slate-400 font-mono">AG-{{ sprintf('%04d', $user->id_user) }}</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-slate-500 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Tanggal Pinjam
                        </span>
                        <span class="font-bold text-slate-800">{{ $tglPinjam->translatedFormat('d M Y') }}</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-slate-500 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Jatuh Tempo
                        </span>
                        <span class="font-bold text-amber-500">{{ $jatuhTempo->translatedFormat('d M Y') }}</span>
                    </div>
                </div>

                <!-- Info Denda Box -->
                <div class="p-4 bg-slate-50 border border-slate-100 rounded-2xl text-xs text-slate-600 leading-relaxed">
                    <span class="font-bold text-slate-800">Info:</span> Denda keterlambatan Rp 1.000/hari. Kembalikan tepat waktu.
                </div>

                <!-- Form Submit Button -->
                <form action="{{ route('user.buku.storePinjam', $buku->id_buku) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-4 bg-brand-dark hover:bg-brand-hover text-white font-bold text-sm rounded-xl shadow-md transition-all">
                        Konfirmasi Peminjaman
                    </button>
                </form>
            </div>
        </div>

    </main>

</body>
</html>