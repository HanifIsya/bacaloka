<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin Perpustakaan
        User::create([
            'nama' => 'Admin Perpustakaan',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'status_aktif' => 'Aktif'
        ]);

        // 2. Akun Anggota
        $anggota1 = User::create([
            'nama' => 'Rizky Pratama',
            'username' => 'rizky',
            'password' => Hash::make('password'),
            'alamat' => 'Surabaya',
            'role' => 'anggota',
            'status_aktif' => 'Aktif'
        ]);

        $anggota2 = User::create([
            'nama' => 'Siti Rahayu',
            'username' => 'siti',
            'password' => Hash::make('password'),
            'alamat' => 'Sidoarjo',
            'role' => 'anggota',
            'status_aktif' => 'Aktif'
        ]);

        $anggota3 = User::create([
            'nama' => 'Ahmad Fauzi',
            'username' => 'ahmad',
            'password' => Hash::make('password'),
            'alamat' => 'Gresik',
            'role' => 'anggota',
            'status_aktif' => 'Aktif'
        ]);

        // 3. Data Master Buku
        $b1 = Buku::create(['kode_buku' => 'BK-0001', 'judul' => 'Algoritma dan Pemrograman', 'pengarang' => 'Marty Puso', 'penerbit' => 'Informatika', 'kategori' => 'Informatika', 'stok' => 5]);
        $b2 = Buku::create(['kode_buku' => 'BK-0002', 'judul' => 'Kalkulus Jilid 1', 'pengarang' => 'Anton Rising', 'penerbit' => 'Matematika', 'kategori' => 'Matematika', 'stok' => 3]);
        $b3 = Buku::create(['kode_buku' => 'BK-0003', 'judul' => 'Sistem Operasi Modern', 'pengarang' => 'Andre Taulany', 'penerbit' => 'Informatika', 'kategori' => 'Informatika', 'stok' => 4]);
        $b4 = Buku::create(['kode_buku' => 'BK-0004', 'judul' => 'Basis Data', 'pengarang' => 'Firmansyah', 'penerbit' => 'Informatika', 'kategori' => 'Informatika', 'stok' => 2]);
        $b5 = Buku::create(['kode_buku' => 'BK-0005', 'judul' => 'Jaringan Komputer', 'pengarang' => 'Beny Blounz', 'penerbit' => 'Informatika', 'kategori' => 'Informatika', 'stok' => 8]);

        // 4. Data Peminjaman Aktif & Terlambat
        $p1 = Peminjaman::create([
            'id_user' => $anggota1->id_user,
            'tanggal_pinjam' => '2026-07-08',
            'tanggal_jatuh_tempo' => '2026-07-22'
        ]);
        DetailPeminjaman::create([
            'id_peminjaman' => $p1->id_peminjaman,
            'id_buku' => $b5->id_buku,
            'status_buku' => 'Dipinjam'
        ]);

        $p2 = Peminjaman::create([
            'id_user' => $anggota2->id_user,
            'tanggal_pinjam' => '2026-06-25',
            'tanggal_jatuh_tempo' => '2026-07-09' // Terlambat
        ]);
        DetailPeminjaman::create([
            'id_peminjaman' => $p2->id_peminjaman,
            'id_buku' => $b2->id_buku,
            'status_buku' => 'Dipinjam'
        ]);

        $p3 = Peminjaman::create([
            'id_user' => $anggota3->id_user,
            'tanggal_pinjam' => '2026-06-20',
            'tanggal_jatuh_tempo' => '2026-07-04'
        ]);
        DetailPeminjaman::create([
            'id_peminjaman' => $p3->id_peminjaman,
            'id_buku' => $b4->id_buku,
            'tanggal_kembali' => '2026-07-03',
            'status_buku' => 'Kembali'
        ]);
    }
}