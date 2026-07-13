<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengembalian - BACALOKA Admin</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/pengembalian.js'])
</head>
<body class="bg-slate-100 font-sans text-slate-800 antialiased min-h-screen flex">

    <!-- Sidebar Admin -->
    <aside class="w-64 bg-brand-dark text-white flex flex-col justify-between shrink-0 min-h-screen">
        <div>
            <div class="p-6 flex items-center gap-3 border-b border-white/10">
                <div class="bg-brand-accent p-2 rounded-xl text-white shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.237 8.237 0 0118 18.75c1.18 0 2.296.25 3.25.707a.75.75 0 001-.707V4.533a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
                    </svg>
                </div>
                <span class="font-bold text-lg tracking-wider">BACALOKA</span>
            </div>

            <div class="p-4 space-y-1">
                <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">MENU</p>
                
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-white/5 hover:text-white font-medium text-sm transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span>Dashboard</span>
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

                <!-- Active Menu: Pengembalian -->
                <a href="{{ route('admin.pengembalian.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-white/10 text-white font-semibold text-sm transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <span>Pengembalian</span>
                    <span class="w-1.5 h-1.5 bg-amber-400 rounded-full ml-auto"></span>
                </a>
            </div>
        </div>

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
        
        <!-- Top Bar -->
        <div class="flex items-center justify-between mb-8">
            <div class="text-xs text-slate-500 font-semibold">
                {{ \Carbon\Carbon::now()->translatedFormat('d M Y') }}
            </div>

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

        <!-- Notification Alert -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-100 border border-emerald-200 text-emerald-800 text-sm rounded-xl flex justify-between items-center">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="font-bold text-emerald-800">&times;</button>
            </div>
        @endif

        <!-- Title Section -->
        <div class="mb-6">
            <h1 class="text-2xl font-extrabold text-slate-900">Manajemen Pengembalian</h1>
            <p class="text-xs text-slate-500 mt-1">Validasi dan pantau seluruh transaksi peminjaman</p>
        </div>

        <!-- Tab Filters -->
        <div class="inline-flex p-1 bg-slate-200/60 rounded-xl mb-6 gap-1">
            <a href="{{ route('admin.pengembalian.index', ['tab' => 'semua']) }}" class="px-5 py-2 text-xs font-semibold rounded-lg transition-all {{ $tab === 'semua' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-600 hover:text-slate-900' }}">
                Semua
            </a>
            <a href="{{ route('admin.pengembalian.index', ['tab' => 'aktif']) }}" class="px-5 py-2 text-xs font-semibold rounded-lg transition-all {{ $tab === 'aktif' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-600 hover:text-slate-900' }}">
                Aktif
            </a>
            <a href="{{ route('admin.pengembalian.index', ['tab' => 'terlambat']) }}" class="px-5 py-2 text-xs font-semibold rounded-lg transition-all {{ $tab === 'terlambat' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-600 hover:text-slate-900' }}">
                Terlambat
            </a>
            <a href="{{ route('admin.pengembalian.index', ['tab' => 'dikembalikan']) }}" class="px-5 py-2 text-xs font-semibold rounded-lg transition-all {{ $tab === 'dikembalikan' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-600 hover:text-slate-900' }}">
                Dikembalikan (Histori)
            </a>
        </div>

        <!-- Tabel Transaksi Pengembalian -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                            <th class="py-3.5 px-6">ANGGOTA</th>
                            <th class="py-3.5 px-6">JUDUL BUKU</th>
                            <th class="py-3.5 px-6">TGL PINJAM</th>
                            <th class="py-3.5 px-6">JATUH TEMPO</th>
                            <th class="py-3.5 px-6">STATUS</th>
                            <th class="py-3.5 px-6 text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs">
                        @forelse($transaksi as $item)
                            @php
                                $today = \Carbon\Carbon::now()->toDateString();
                                $isTerlambat = $item->status_buku === 'Dipinjam' && $today > $item->peminjaman->tanggal_jatuh_tempo;
                            @endphp
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="py-4 px-6 font-semibold text-slate-800">
                                    {{ $item->peminjaman->user->nama ?? '-' }}
                                    <span class="block text-[10px] text-slate-400 font-mono mt-0.5">
                                        AG-{{ sprintf('%04d', $item->peminjaman->user->id_user ?? 0) }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-slate-700">
                                    {{ $item->buku->judul ?? '-' }}
                                    <span class="block text-[10px] text-slate-400 font-mono mt-0.5">
                                        {{ $item->buku->kode_buku ?? '-' }}
                                    </span>
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
                                <td class="py-4 px-6 text-center">
                                    @if($item->status_buku === 'Dipinjam')
                                        <button 
                                            type="button" 
                                            class="btn-validasi-pengembalian px-4 py-1.5 bg-brand-dark hover:bg-brand-hover text-white font-semibold rounded-xl inline-flex items-center gap-1.5 transition-all text-xs shadow-sm"
                                            data-id="{{ $item->id_detail }}"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Validasi
                                        </button>
                                    @else
                                        <span class="text-[11px] text-slate-400 italic">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-slate-400 text-xs">Belum ada data transaksi pengembalian.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- MODAL POPUP: VALIDASI PENGEMBALIAN -->
    <div id="validasiModal" class="hidden fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full overflow-hidden animate-in fade-in zoom-in-95 duration-150">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-slate-800 text-base">Validasi Pengembalian Buku</h3>
                <button id="closeValidasiModalBtn" class="text-slate-400 hover:text-slate-600 text-lg font-bold">&times;</button>
            </div>

            <form id="validasiForm" method="POST" class="p-6 space-y-4">
                @csrf
                
                <!-- Box Rincian Detail Peminjaman -->
                <div class="bg-slate-50 p-4 rounded-xl space-y-2.5 text-xs">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">DETAIL PEMINJAMAN</p>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-slate-500">Anggota</span>
                        <div class="text-right">
                            <span id="valAnggotaNama" class="font-bold text-slate-800">-</span>
                            <span id="valAnggotaKode" class="block text-[10px] text-slate-400 font-mono">-</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-slate-500">Buku</span>
                        <div class="text-right">
                            <span id="valBukuJudul" class="font-bold text-slate-800">-</span>
                            <span id="valBukuKode" class="block text-[10px] text-slate-400 font-mono">-</span>
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-slate-500">Tgl Pinjam</span>
                        <span id="valTglPinjam" class="font-semibold text-slate-700">-</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-slate-500">Jatuh Tempo</span>
                        <span id="valJatuhTempo" class="font-semibold text-slate-700">-</span>
                    </div>

                    <div class="flex justify-between border-t border-slate-200/60 pt-2">
                        <span class="text-slate-500">Tgl Kembali</span>
                        <span id="valTglKembali" class="font-bold text-emerald-600">-</span>
                    </div>
                </div>

                <!-- BOX 1: Pengembalian Tepat Waktu (Default Hidden via inline style) -->
                <div id="boxTepatWaktu" style="display: none;" class="p-3.5 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs rounded-xl items-center gap-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Dikembalikan tepat waktu. Tidak ada denda.</span>
                </div>

                <!-- BOX 2: Pengembalian Terlambat & Denda (Default Hidden via inline style) -->
                <div id="boxTerlambat" style="display: none;" class="p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl space-y-1">
                    <div class="flex items-center gap-1.5 text-[11px] font-bold text-rose-600 uppercase tracking-wider">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span id="valTerlambatText"></span>
                    </div>
                    <div id="valNominalDenda" class="text-2xl font-extrabold text-rose-700"></div>
                    <div id="valDetailDenda" class="text-[11px] text-rose-500"></div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                    <button id="cancelValidasiModalBtn" type="button" class="px-5 py-2.5 border border-slate-200 text-slate-600 hover:bg-slate-50 font-semibold text-xs rounded-xl transition-all">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2.5 bg-brand-dark hover:bg-brand-hover text-white font-semibold text-xs rounded-xl shadow-md transition-all">
                        Konfirmasi Pengembalian
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>