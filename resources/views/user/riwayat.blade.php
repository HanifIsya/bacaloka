<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman - BACALOKA Digital</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])
</head>
<body class="bg-slate-100 font-sans text-slate-800 antialiased min-h-screen">

    <!-- Top Navigation Bar Navy -->
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
                <a href="{{ route('user.dashboard') }}" class="px-4 py-2 text-slate-300 hover:text-white font-medium text-xs rounded-xl flex items-center gap-2 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>Katalog Buku</span>
                </a>

                <!-- Active Menu: Riwayat Pinjam -->
                <a href="{{ route('user.riwayat') }}" class="px-4 py-2 bg-white/10 text-amber-400 font-semibold text-xs rounded-xl flex items-center gap-2 transition-all">
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
                        {{ strtoupper(substr($user->nama, 0, 1)) }}
                    </div>
                    <span class="font-bold text-xs text-white">{{ $user->nama }}</span>
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
        
        <!-- Page Title Section -->
        <div class="mb-8">
            <h1 class="text-2xl font-extrabold text-slate-900">Riwayat Peminjaman</h1>
            <p class="text-xs text-slate-500 mt-1">Seluruh riwayat peminjaman buku Anda</p>
        </div>

        <!-- 3 Stat Summary Cards (Sesuai image_0128f0.png) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Card 1: Total Pinjam -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm text-center">
                <div class="text-2xl font-extrabold text-slate-900">{{ $totalPinjam }}</div>
                <div class="text-xs font-semibold text-slate-400 mt-1">Total Pinjam</div>
            </div>

            <!-- Card 2: Sedang Dipinjam -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm text-center">
                <div class="text-2xl font-extrabold text-purple-600">{{ $sedangDipinjam }}</div>
                <div class="text-xs font-semibold text-slate-400 mt-1">Sedang Dipinjam</div>
            </div>

            <!-- Card 3: Total Denda -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm text-center">
                <div class="text-2xl font-extrabold text-emerald-600">
                    Rp {{ number_format($totalDenda, 0, ',', '.') }}
                </div>
                <div class="text-xs font-semibold text-slate-400 mt-1">Total Denda</div>
            </div>
        </div>

        <!-- Tabel Transaksi Riwayat (Sesuai image_0128f0.png) -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                            <th class="py-4 px-6">JUDUL BUKU</th>
                            <th class="py-4 px-6">TGL PINJAM</th>
                            <th class="py-4 px-6">JATUH TEMPO</th>
                            <th class="py-4 px-6">STATUS</th>
                            <th class="py-4 px-6 text-right">DENDA</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs">
                        @forelse($riwayat as $item)
                            @php
                                $today = \Carbon\Carbon::today()->startOfDay();
                                $jatuhTempo = \Carbon\Carbon::parse($item->peminjaman->tanggal_jatuh_tempo)->startOfDay();
                                $isTerlambat = $item->status_buku === 'Dipinjam' && $today->greaterThan($jatuhTempo);
                                
                                $dendaItem = 0;
                                if ($item->status_buku === 'Kembali') {
                                    $dendaItem = $item->denda ?? 0;
                                } elseif ($isTerlambat) {
                                    $terlambatHari = (int) $jatuhTempo->diffInDays($today);
                                    $dendaItem = $terlambatHari * 1000;
                                }
                            @endphp
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-800 text-sm">{{ $item->buku->judul ?? '-' }}</div>
                                    <div class="text-[10px] text-slate-400 font-mono mt-0.5">{{ $item->buku->kode_buku ?? '-' }}</div>
                                </td>
                                <td class="py-4 px-6 text-slate-600">
                                    {{ \Carbon\Carbon::parse($item->peminjaman->tanggal_pinjam)->translatedFormat('d M Y') }}
                                </td>
                                <td class="py-4 px-6 text-slate-600">
                                    {{ \Carbon\Carbon::parse($item->peminjaman->tanggal_jatuh_tempo)->translatedFormat('d M Y') }}
                                </td>
                                <td class="py-4 px-6">
                                    @if($item->status_buku === 'Kembali')
                                        <span class="px-3 py-1 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                            Dikembalikan
                                        </span>
                                    @elseif($isTerlambat)
                                        <span class="px-3 py-1 rounded-full text-[11px] font-semibold bg-rose-50 text-rose-600 border border-rose-100">
                                            Terlambat
                                        </span>
                                    @else
                                        <span class="px-3 py-1 rounded-full text-[11px] font-semibold bg-sky-50 text-sky-600 border border-sky-100">
                                            Aktif
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-right font-semibold text-slate-700">
                                    @if($dendaItem > 0)
                                        <span class="text-rose-600 font-bold">Rp {{ number_format($dendaItem, 0, ',', '.') }}</span>
                                    @else
                                        <span class="text-slate-400">—</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center text-slate-400 text-xs">
                                    Anda belum memiliki riwayat peminjaman buku.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</body>
</html>