<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Buku - BACALOKA Admin</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/buku.js'])
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

                <!-- Active Menu: Kelola Data Buku -->
                <a href="{{ route('admin.buku.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-white/10 text-white font-semibold text-sm transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span>Kelola Data Buku</span>
                    <span class="w-1.5 h-1.5 bg-amber-400 rounded-full ml-auto"></span>
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

        <!-- Title & Action Button -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900">Kelola Data Buku</h1>
                <p class="text-xs text-slate-500 mt-1">{{ $totalJudul }} judul terdaftar dalam sistem</p>
            </div>

            <!-- Tombol Tambah Buku -->
            <button id="openCreateModalBtn" type="button" class="px-5 py-3 bg-brand-dark hover:bg-brand-hover text-white font-semibold text-sm rounded-xl shadow-md flex items-center gap-2 w-fit transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Buku</span>
            </button>
        </div>

        <!-- Form Pencarian Live Search -->
        <div class="mb-6">
            <form action="{{ route('admin.buku.index') }}" method="GET" class="max-w-md">
                <div class="relative">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="Cari judul, pengarang, penerbit..." 
                        class="w-full pl-4 pr-10 py-3 bg-white border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-dark shadow-sm transition-all"
                    >
                    <button type="submit" class="absolute right-3 top-3.5 text-slate-400 hover:text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabel Data Buku (Sesuai image_ff5e19.png) -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                            <th class="py-3.5 px-6">JUDUL BUKU</th>
                            <th class="py-3.5 px-6">PENGARANG</th>
                            <th class="py-3.5 px-6">PENERBIT</th>
                            <th class="py-3.5 px-6">STOK</th>
                            <th class="py-3.5 px-6 text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs">
                        @forelse($buku as $item)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-800 text-sm">{{ $item->judul }}</div>
                                    <div class="text-[11px] text-slate-400 mt-0.5">{{ $item->kategori }}</div>
                                </td>
                                <td class="py-4 px-6 text-slate-600 font-medium">{{ $item->pengarang }}</td>
                                <td class="py-4 px-6 text-slate-600">{{ $item->penerbit }}</td>
                                <td class="py-4 px-6">
                                    @if($item->stok > 0)
                                        <span class="px-3 py-1 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                            {{ $item->stok }} tersedia
                                        </span>
                                    @else
                                        <span class="px-3 py-1 rounded-full text-[11px] font-semibold bg-rose-50 text-rose-600 border border-rose-100">
                                            Habis
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <!-- Tombol Edit -->
                                        <button 
                                            type="button" 
                                            class="btn-edit-buku px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-lg flex items-center gap-1.5 transition-all text-xs"
                                            data-id="{{ $item->id_buku }}"
                                            data-judul="{{ $item->judul }}"
                                            data-pengarang="{{ $item->pengarang }}"
                                            data-penerbit="{{ $item->penerbit }}"
                                            data-stok="{{ $item->stok }}"
                                            data-kategori="{{ $item->kategori }}"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 210.3H3v-3.572L16.732 3.732z" />
                                            </svg>
                                            Edit
                                        </button>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('admin.buku.destroy', $item->id_buku) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 font-semibold rounded-lg flex items-center gap-1.5 transition-all text-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-slate-400 text-xs">Tidak ada data buku yang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- MODAL POPUP: TAMBAH BUKU BARU (Presisi Image image_ff5e57.png) -->
    <div id="createModal" class="hidden fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full overflow-hidden animate-in fade-in zoom-in-95 duration-150">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-slate-800 text-base">Tambah Buku Baru</h3>
                <button id="closeCreateModalBtn" class="text-slate-400 hover:text-slate-600 text-lg font-bold">&times;</button>
            </div>

            <form action="{{ route('admin.buku.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Judul Buku <span class="text-rose-500">*</span></label>
                    <input type="text" name="judul" placeholder="Masukkan judul buku" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-brand-dark">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Pengarang <span class="text-rose-500">*</span></label>
                    <input type="text" name="pengarang" placeholder="Nama pengarang" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-brand-dark">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Penerbit <span class="text-rose-500">*</span></label>
                    <input type="text" name="penerbit" placeholder="Nama penerbit" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-brand-dark">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Stok Buku</label>
                        <input type="number" name="stok" value="0" min="0" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-brand-dark">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Kategori</label>
                        <input type="text" name="kategori" placeholder="cth: Informatika" class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-brand-dark">
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                    <button id="cancelCreateModalBtn" type="button" class="px-5 py-2.5 border border-slate-200 text-slate-600 hover:bg-slate-50 font-semibold text-xs rounded-xl transition-all">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2.5 bg-brand-dark hover:bg-brand-hover text-white font-semibold text-xs rounded-xl shadow-md transition-all">
                        Simpan Buku
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL POPUP: EDIT BUKU (Presisi Image image_ff5e22.png) -->
    <div id="editModal" class="hidden fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full overflow-hidden animate-in fade-in zoom-in-95 duration-150">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-slate-800 text-base">Edit Data Buku</h3>
                <button id="closeEditModalBtn" class="text-slate-400 hover:text-slate-600 text-lg font-bold">&times;</button>
            </div>

            <form id="editForm" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Judul Buku <span class="text-rose-500">*</span></label>
                    <input type="text" id="edit_judul" name="judul" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-brand-dark">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Pengarang <span class="text-rose-500">*</span></label>
                    <input type="text" id="edit_pengarang" name="pengarang" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-brand-dark">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Penerbit <span class="text-rose-500">*</span></label>
                    <input type="text" id="edit_penerbit" name="penerbit" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-brand-dark">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Stok Buku</label>
                        <input type="number" id="edit_stok" name="stok" min="0" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-brand-dark">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Kategori</label>
                        <input type="text" id="edit_kategori" name="kategori" class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-brand-dark">
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                    <button id="cancelEditModalBtn" type="button" class="px-5 py-2.5 border border-slate-200 text-slate-600 hover:bg-slate-50 font-semibold text-xs rounded-xl transition-all">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2.5 bg-brand-dark hover:bg-brand-hover text-white font-semibold text-xs rounded-xl shadow-md transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>