<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anggota - BACALOKA Admin</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/anggota.js'])
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

                <!-- Active Menu: Pendaftaran Anggota -->
                <a href="{{ route('admin.anggota.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-white/10 text-white font-semibold text-sm transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    <span>Pendaftaran Anggota</span>
                    <span class="w-1.5 h-1.5 bg-amber-400 rounded-full ml-auto"></span>
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
                <h1 class="text-2xl font-extrabold text-slate-900">Pendaftaran Anggota</h1>
                <p class="text-xs text-slate-500 mt-1">{{ $totalAnggota }} anggota terdaftar</p>
            </div>

            <button id="openCreateModalBtn" type="button" class="px-5 py-3 bg-brand-dark hover:bg-brand-hover text-white font-semibold text-sm rounded-xl shadow-md flex items-center gap-2 w-fit transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Anggota</span>
            </button>
        </div>

        <!-- Form Pencarian -->
        <div class="mb-6">
            <form action="{{ route('admin.anggota.index') }}" method="GET" class="max-w-md">
                <div class="relative">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="Cari nama atau alamat..." 
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

        <!-- Tabel Anggota (Sesuai image_ffcad8.png) -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                            <th class="py-3.5 px-6"># ID ANGGOTA</th>
                            <th class="py-3.5 px-6">NAMA ANGGOTA</th>
                            <th class="py-3.5 px-6">ALAMAT</th>
                            <th class="py-3.5 px-6">TGL DAFTAR</th>
                            <th class="py-3.5 px-6">STATUS</th>
                            <th class="py-3.5 px-6 text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs">
                        @forelse($anggota as $item)
                            @php
                                $kodeAnggota = 'AG-' . sprintf('%04d', $item->id_user);
                                $initial = strtoupper(substr($item->nama, 0, 1));
                            @endphp
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="py-4 px-6 font-mono font-semibold text-slate-400">
                                    <span class="bg-slate-100 px-2 py-1 rounded">{{ $kodeAnggota }}</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-brand-dark text-white font-bold flex items-center justify-center shrink-0">
                                            {{ $initial }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-800 text-sm">{{ $item->nama }}</div>
                                            <div class="text-[11px] text-slate-400">@ {{ $item->username }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-slate-600 max-w-xs truncate">{{ $item->alamat ?? '-' }}</td>
                                <td class="py-4 px-6 text-slate-600">
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                                </td>
                                <td class="py-4 px-6">
                                    @if($item->status_aktif === 'Aktif')
                                        <span class="px-3 py-1 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="px-3 py-1 rounded-full text-[11px] font-semibold bg-slate-100 text-slate-500 border border-slate-200">
                                            Non-aktif
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <button 
                                        type="button" 
                                        class="btn-edit-anggota px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-lg inline-flex items-center gap-1.5 transition-all text-xs"
                                        data-id="{{ $item->id_user }}"
                                        data-kode="{{ $kodeAnggota }}"
                                        data-nama="{{ $item->nama }}"
                                        data-alamat="{{ $item->alamat }}"
                                        data-status="{{ $item->status_aktif }}"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 210.3H3v-3.572L16.732 3.732z" />
                                        </svg>
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-slate-400 text-xs">Belum ada anggota yang terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- MODAL POPUP: TAMBAH ANGGOTA BARU (Sesuai image_ffcaf7.png) -->
    <div id="createModal" class="hidden fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full overflow-hidden animate-in fade-in zoom-in-95 duration-150">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-slate-800 text-base">Tambah Anggota Baru</h3>
                <button id="closeCreateModalBtn" class="text-slate-400 hover:text-slate-600 text-lg font-bold">&times;</button>
            </div>

            <form action="{{ route('admin.anggota.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">ID Anggota</label>
                    <input type="text" value="{{ $nextIdAnggota }}" disabled class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-500 font-mono">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Lengkap <span class="text-rose-500">*</span></label>
                    <input type="text" name="nama" placeholder="Nama anggota" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-brand-dark">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Alamat <span class="text-rose-500">*</span></label>
                    <textarea name="alamat" rows="3" placeholder="Alamat lengkap anggota" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-brand-dark resize-none"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-2">Status Keanggotaan</label>
                    <div class="flex items-center gap-3">
                        <label class="flex items-center gap-2 px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 cursor-pointer hover:bg-slate-100">
                            <input type="radio" name="status_aktif" value="Aktif" checked class="text-brand-dark focus:ring-brand-dark">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Aktif
                        </label>
                        <label class="flex items-center gap-2 px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 cursor-pointer hover:bg-slate-100">
                            <input type="radio" name="status_aktif" value="Non-aktif" class="text-brand-dark focus:ring-brand-dark">
                            <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                            Non-aktif
                        </label>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                    <button id="cancelCreateModalBtn" type="button" class="px-5 py-2.5 border border-slate-200 text-slate-600 hover:bg-slate-50 font-semibold text-xs rounded-xl transition-all">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2.5 bg-brand-dark hover:bg-brand-hover text-white font-semibold text-xs rounded-xl shadow-md transition-all">
                        Daftarkan Anggota
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL POPUP: EDIT ANGGOTA -->
    <div id="editModal" class="hidden fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full overflow-hidden animate-in fade-in zoom-in-95 duration-150">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-slate-800 text-base">Edit Data Anggota</h3>
                <button id="closeEditModalBtn" class="text-slate-400 hover:text-slate-600 text-lg font-bold">&times;</button>
            </div>

            <form id="editForm" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">ID Anggota</label>
                    <input type="text" id="edit_id_anggota" disabled class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-500 font-mono">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Lengkap <span class="text-rose-500">*</span></label>
                    <input type="text" id="edit_nama" name="nama" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-brand-dark">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Alamat <span class="text-rose-500">*</span></label>
                    <textarea id="edit_alamat" name="alamat" rows="3" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-brand-dark resize-none"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-2">Status Keanggotaan</label>
                    <div class="flex items-center gap-3">
                        <label class="flex items-center gap-2 px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 cursor-pointer hover:bg-slate-100">
                            <input type="radio" id="edit_status_aktif" name="status_aktif" value="Aktif" class="text-brand-dark focus:ring-brand-dark">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Aktif
                        </label>
                        <label class="flex items-center gap-2 px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 cursor-pointer hover:bg-slate-100">
                            <input type="radio" id="edit_status_nonaktif" name="status_aktif" value="Non-aktif" class="text-brand-dark focus:ring-brand-dark">
                            <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                            Non-aktif
                        </label>
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