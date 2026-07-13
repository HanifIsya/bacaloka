<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Berhasil - BACALOKA Digital</title>
    
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
                    <span>Katalog Buku</span>
                </a>
                <a href="{{ route('user.riwayat') }}" class="px-4 py-2 text-slate-300 hover:text-white font-medium text-xs rounded-xl flex items-center gap-2">
                    <span>Riwayat Pinjam</span>
                </a>
            </div>

            <div class="flex items-center gap-4">
                <span class="font-bold text-xs text-white">{{ Auth::user()->nama }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-xs text-slate-300 hover:text-white">Keluar</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Success Modal-Like Card -->
    <main class="max-w-md mx-auto px-4 py-16 flex justify-center">
        <div class="bg-white rounded-3xl shadow-xl border border-slate-200/80 p-8 text-center space-y-6 w-full animate-in fade-in zoom-in-95 duration-200">
            
            <!-- Success Green Circle Icon -->
            <div class="w-20 h-20 bg-emerald-100 text-emerald-500 rounded-full flex items-center justify-center mx-auto shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <div>
                <h2 class="text-2xl font-extrabold text-slate-900">Peminjaman Berhasil!</h2>
                <p class="text-xs text-slate-400 mt-2 leading-relaxed">
                    Buku sudah tercatat. Harap kembalikan sebelum jatuh tempo.
                </p>
            </div>

            <!-- Detail Box -->
            <div class="bg-slate-50 p-5 rounded-2xl text-xs space-y-3 text-left">
                <div class="flex justify-between items-center border-b border-slate-200/60 pb-3">
                    <span class="font-bold text-slate-800 text-sm">{{ $buku->judul }}</span>
                    <span class="font-mono text-[10px] text-slate-400 bg-slate-200/60 px-2 py-0.5 rounded">{{ $buku->kode_buku }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="text-slate-500">Tgl Pinjam</span>
                    <span class="font-bold text-slate-800">{{ $today->translatedFormat('d M Y') }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="text-slate-500">Jatuh Tempo</span>
                    <span class="font-bold text-amber-500">{{ $jatuhTempo->translatedFormat('d M Y') }}</span>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 pt-2">
                <a href="#" class="w-1/2 py-3 border border-slate-200 text-slate-700 font-semibold text-xs rounded-xl hover:bg-slate-50 transition-all text-center">
                    Lihat Riwayat
                </a>
                <a href="{{ route('user.dashboard') }}" class="w-1/2 py-3 bg-brand-dark hover:bg-brand-hover text-white font-semibold text-xs rounded-xl shadow-md transition-all text-center">
                    Kembali ke Katalog
                </a>
            </div>

        </div>
    </main>

</body>
</html>