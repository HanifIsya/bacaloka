<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPeminjaman;
use App\Models\Buku;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    /**
     * READ: Menampilkan daftar transaksi peminjaman & filter tab
     */
    public function index(Request $request)
    {
        $tab = $request->get('tab', 'semua');
        $today = Carbon::today()->toDateString();

        $query = DetailPeminjaman::with(['peminjaman.user', 'buku']);

        // Filter Sesuai Tab Navigasi (Semua, Aktif, Terlambat, Dikembalikan)
        if ($tab === 'aktif') {
            $query->where('status_buku', 'Dipinjam')
                  ->whereHas('peminjaman', function ($q) use ($today) {
                      $q->where('tanggal_jatuh_tempo', '>=', $today);
                  });
        } elseif ($tab === 'terlambat') {
            $query->where('status_buku', 'Dipinjam')
                  ->whereHas('peminjaman', function ($q) use ($today) {
                      $q->where('tanggal_jatuh_tempo', '<', $today);
                  });
        } elseif ($tab === 'dikembalikan') {
            $query->where('status_buku', 'Kembali');
        }

        $transaksi = $query->latest('id_detail')->get();

        return view('admin.pengembalian.index', compact('transaksi', 'tab'));
    }

    /**
     * AJAX API: Mendapatkan detail data transaksi untuk modal konfirmasi validasi
     */
    public function show($id)
    {
        $detail = DetailPeminjaman::with(['peminjaman.user', 'buku'])->findOrFail($id);
        
        $tglPinjam = Carbon::parse($detail->peminjaman->tanggal_pinjam)->startOfDay();
        $jatuhTempo = Carbon::parse($detail->peminjaman->tanggal_jatuh_tempo)->startOfDay();
        $today = Carbon::today()->startOfDay(); // Hari ini

        $terlambatHari = 0;
        $denda = 0;

        // Pengecekan kalkulasi denda jika hari ini melewati tanggal jatuh tempo
        if ($today->greaterThan($jatuhTempo) && $detail->status_buku === 'Dipinjam') {
            $terlambatHari = (int) $jatuhTempo->diffInDays($today);
            $denda = $terlambatHari * 1000; // Tarif denda Rp 1.000 / hari
        }

        return response()->json([
            'id_detail' => $detail->id_detail,
            'anggota_nama' => $detail->peminjaman->user->nama ?? '-',
            'anggota_kode' => 'AG-' . sprintf('%04d', $detail->peminjaman->user->id_user ?? 0),
            'buku_judul' => $detail->buku->judul ?? '-',
            'buku_kode' => $detail->buku->kode_buku ?? '-',
            'tgl_pinjam' => $tglPinjam->translatedFormat('d M Y'),
            'jatuh_tempo' => $jatuhTempo->translatedFormat('d M Y'),
            'tgl_kembali' => $today->translatedFormat('d M Y') . ' (Hari ini)',
            'terlambat_hari' => $terlambatHari,
            'denda' => $denda,
            'denda_formatted' => 'Rp ' . number_format($denda, 0, ',', '.'),
        ]);
    }

    /**
     * UPDATE: Memproses validasi pengembalian buku, menghitung denda, & menambah stok (+1)
     */
    public function store(Request $request, $id)
    {
        $detail = DetailPeminjaman::with('buku', 'peminjaman')->findOrFail($id);

        if ($detail->status_buku === 'Kembali') {
            return redirect()->back()->with('error', 'Transaksi ini sudah dikembalikan sebelumnya.');
        }

        $today = Carbon::today()->startOfDay();
        $jatuhTempo = Carbon::parse($detail->peminjaman->tanggal_jatuh_tempo)->startOfDay();
        
        $denda = 0;
        $terlambatHari = 0;

        if ($today->greaterThan($jatuhTempo)) {
            $terlambatHari = (int) $jatuhTempo->diffInDays($today);
            $denda = $terlambatHari * 1000;
        }

        // 1. Update Status Transaksi, Tanggal Kembali, & Nominal Denda
        $detail->update([
            'status_buku' => 'Kembali',
            'tanggal_kembali' => $today->toDateString(),
            'denda' => $denda,
            'keterangan' => $denda > 0 ? "Terlambat {$terlambatHari} hari" : 'Tepat waktu'
        ]);

        // 2. Otomatis Tambah Stok Buku (+1)
        if ($detail->buku) {
            $detail->buku->increment('stok', 1);
        }

        return redirect()->route('admin.pengembalian.index', ['tab' => 'dikembalikan'])
            ->with('success', 'Buku berhasil dikembalikan! Stok buku bertambah +1.');
    }
}