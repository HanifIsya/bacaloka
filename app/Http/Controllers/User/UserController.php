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
    // READ: Dashboard Katalog Buku untuk User
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

    // AJAX API: Mengambil Detail Buku untuk Modal
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

    // PROCESS: Pengajuan Peminjaman Buku Mandiri (Sesuai Activity Diagram 6.8)
    public function pinjamBuku(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->stok <= 0) {
            return redirect()->back()->with('error', 'Maaf, stok buku ini sedang habis!');
        }

        $user = Auth::user();
        $today = Carbon::today();
        $jatuhTempo = Carbon::today()->addDays(14); // Durasi pinjam 14 hari

        // 1. Buat Nota Peminjaman Induk
        $peminjaman = Peminjaman::create([
            'id_user' => $user->id_user,
            'tanggal_pinjam' => $today->toDateString(),
            'tanggal_jatuh_tempo' => $jatuhTempo->toDateString(),
        ]);

        // 2. Buat Detail Peminjaman Item
        DetailPeminjaman::create([
            'id_peminjaman' => $peminjaman->id_peminjaman,
            'id_buku' => $buku->id_buku,
            'status_buku' => 'Dipinjam',
        ]);

        // 3. Kurangi Stok Buku (-1)
        $buku->decrement('stok', 1);

        return redirect()->back()->with('success', 'Berhasil meminjam buku "' . $buku->judul . '"! Silahkan ambil buku di perpustakaan.');
    }
}