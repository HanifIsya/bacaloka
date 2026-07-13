<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\User;
use App\Models\DetailPeminjaman;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalJudulBuku = Buku::count();
        $totalEksemplar = Buku::sum('stok');
        $totalAnggota = User::where('role', 'anggota')->count();
        $anggotaAktif = User::where('role', 'anggota')->where('status_aktif', 'Aktif')->count();

        $bukuDipinjam = DetailPeminjaman::where('status_buku', 'Dipinjam')->count();

        $today = Carbon::now()->toDateString();
        $bukuTerlambat = DetailPeminjaman::where('status_buku', 'Dipinjam')
            ->whereHas('peminjaman', function ($query) use ($today) {
                $query->where('tanggal_jatuh_tempo', '<', $today);
            })->count();

        // Aktivitas Peminjaman Terbaru
        $aktivitasTerbaru = DetailPeminjaman::with(['peminjaman.user', 'buku'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalJudulBuku',
            'totalEksemplar',
            'totalAnggota',
            'anggotaAktif',
            'bukuDipinjam',
            'bukuTerlambat',
            'aktivitasTerbaru'
        ));
    }
}