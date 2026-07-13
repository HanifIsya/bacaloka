<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * 1. READ: Dashboard Katalog Buku untuk User (Sesuai image_00aff6.png)
     */
    public function dashboard(Request $request)
    {
        $query = Buku::query();

        // Filter Pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('pengarang', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%")
                  ->orWhere('kode_buku', 'like', "%{$search}%");
            });
        }

        // Filter Kategori Pill
        if ($request->has('kategori') && $request->kategori != '' && $request->kategori != 'Semua') {
            $query->where('kategori', $request->kategori);
        }

        $buku = $query->latest('id_buku')->get();
        $totalDitemukan = $buku->count();
        $selectedKategori = $request->get('kategori', 'Semua');

        return view('user.dashboard', compact('buku', 'totalDitemukan', 'selectedKategori'));
    }

    /**
     * 2. AJAX API: Mengambil Detail Buku untuk Modal (Sesuai image_00b016.png)
     */
    public function detailBuku($id)
    {
        $buku = Buku::findOrFail($id);
        
        return response()->json([
            'id_buku' => $buku->id_buku,
            'kode_buku' => $buku->kode_buku,
            'judul' => $buku->judul,
            'pengarang' => $buku->pengarang,
            'penerbit' => $buku->penerbit,
            'kategori' => $buku->kategori,
            'stok' => $buku->stok,
        ]);
    }

    /**
     * 3. READ: Halaman Konfirmasi Peminjaman (Sesuai image_00ca5a.png)
     */
    public function konfirmasiPinjam($id)
    {
        $buku = Buku::findOrFail($id);
        $user = Auth::user();

        $tglPinjam = Carbon::today();
        $jatuhTempo = Carbon::today()->addDays(14); // Durasi pinjam 14 hari

        return view('user.pinjam', compact('buku', 'user', 'tglPinjam', 'jatuhTempo'));
    }

    /**
     * 4. PROCESS: Eksekusi Simpan Peminjaman & Tampil Halaman Berhasil (Sesuai image_00ca7b.png)
     */
    public function storePinjam(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->stok <= 0) {
            return redirect()->route('user.dashboard')->with('error', 'Maaf, stok buku ini sedang habis!');
        }

        $user = Auth::user();
        $today = Carbon::today();
        $jatuhTempo = Carbon::today()->addDays(14);

        // A. Buat Nota Peminjaman Header
        $peminjaman = Peminjaman::create([
            'id_user' => $user->id_user,
            'tanggal_pinjam' => $today->toDateString(),
            'tanggal_jatuh_tempo' => $jatuhTempo->toDateString(),
        ]);

        // B. Buat Detail Peminjaman Item
        DetailPeminjaman::create([
            'id_peminjaman' => $peminjaman->id_peminjaman,
            'id_buku' => $buku->id_buku,
            'status_buku' => 'Dipinjam',
        ]);

        // C. Kurangi Stok Buku (-1)
        $buku->decrement('stok', 1);

        return view('user.berhasil', compact('buku', 'today', 'jatuhTempo'));
    }

    /**
     * 5. READ: Halaman Riwayat Peminjaman User (Sesuai image_0128f0.png)
     */
    public function riwayat()
    {
        $user = Auth::user();
        $today = Carbon::today()->startOfDay();

        // Ambil riwayat transaksi milik user yang sedang login
        $riwayat = DetailPeminjaman::with(['peminjaman', 'buku'])
            ->whereHas('peminjaman', function ($q) use ($user) {
                $q->where('id_user', $user->id_user);
            })
            ->latest('id_detail')
            ->get();

        // Hitung Statistik
        $totalPinjam = $riwayat->count();
        $sedangDipinjam = $riwayat->where('status_buku', 'Dipinjam')->count();
        
        // Hitung Akumulasi Total Denda Active & Historical
        $totalDenda = $riwayat->sum(function ($item) use ($today) {
            if ($item->status_buku === 'Kembali') {
                return $item->denda ?? 0;
            }
            
            $jatuhTempo = Carbon::parse($item->peminjaman->tanggal_jatuh_tempo)->startOfDay();
            if ($today->greaterThan($jatuhTempo)) {
                $terlambatHari = (int) $jatuhTempo->diffInDays($today);
                return $terlambatHari * 1000;
            }

            return 0;
        });

        return view('user.riwayat', compact('riwayat', 'totalPinjam', 'sedangDipinjam', 'totalDenda', 'user'));
    }
}