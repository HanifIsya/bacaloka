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
        // ==========================================
        // 1. DATA USER (ADMIN & ANGGOTA)
        // ==========================================
        
        // Admin
        User::create([
            'nama' => 'Admin Perpustakaan',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'status_aktif' => 'Aktif'
        ]);

        // Anggota 1 (Nirvana Seb - Akun Default Demo User)
        $userNirvana = User::create([
            'nama' => 'Nirvana Seb',
            'username' => 'nirvana',
            'password' => Hash::make('password123'),
            'alamat' => 'Surabaya',
            'role' => 'anggota',
            'status_aktif' => 'Aktif'
        ]);

        // Anggota Lainnya
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

        $anggota4 = User::create([
            'nama' => 'Budi Santoso',
            'username' => 'budi',
            'password' => Hash::make('password'),
            'alamat' => 'Bandung',
            'role' => 'anggota',
            'status_aktif' => 'Aktif'
        ]);


        // ==========================================
        // 2. DATA MASTER BUKU (LENGKAP VARIASI KATEGORI)
        // ==========================================
        
        // --- Sesuai Tampilan Desain Figma (image_013b5a.png) ---
        $b1 = Buku::create(['kode_buku' => 'BK-0001', 'judul' => 'Algoritma dan Pemrograman', 'pengarang' => 'Marty Puso', 'penerbit' => 'Informatika', 'kategori' => 'Informatika', 'stok' => 5]);
        $b2 = Buku::create(['kode_buku' => 'BK-0002', 'judul' => 'Kalkulus Jilid 1', 'pengarang' => 'Anton Rising', 'penerbit' => 'Erlangga', 'kategori' => 'Matematika', 'stok' => 3]);
        $b3 = Buku::create(['kode_buku' => 'BK-0003', 'judul' => 'Sistem Operasi Modern', 'pengarang' => 'Andre Taulany', 'penerbit' => 'Andi Publisher', 'kategori' => 'Informatika', 'stok' => 4]);
        $b4 = Buku::create(['kode_buku' => 'BK-0004', 'judul' => 'Basis Data', 'pengarang' => 'Firmansyah', 'penerbit' => 'Informatika', 'kategori' => 'Informatika', 'stok' => 0]); // Stok Habis
        $b5 = Buku::create(['kode_buku' => 'BK-0005', 'judul' => 'Jaringan Komputer', 'pengarang' => 'Beny Blounz', 'penerbit' => 'McGraw-Hill', 'kategori' => 'Informatika', 'stok' => 8]);
        $b6 = Buku::create(['kode_buku' => 'BK-0006', 'judul' => 'Pemrograman Web', 'pengarang' => 'Abdul Kadir', 'penerbit' => 'Andi Publisher', 'kategori' => 'Web', 'stok' => 4]);
        $b7 = Buku::create(['kode_buku' => 'BK-0007', 'judul' => 'Statistika untuk Penelitian', 'pengarang' => 'Sugiyono', 'penerbit' => 'Alfabeta', 'kategori' => 'Statistika', 'stok' => 6]);
        $b8 = Buku::create(['kode_buku' => 'BK-0008', 'judul' => 'Matematika Diskrit', 'pengarang' => 'Susanna Epp', 'penerbit' => 'Cengage Learning', 'kategori' => 'Matematika', 'stok' => 5]);

        // --- Tambahan Variasi Buku Lainnya ---
        
        // Kategori: Web
        Buku::create(['kode_buku' => 'BK-0009', 'judul' => 'Mastering React JS & Tailwind', 'pengarang' => 'Sandhika Galih', 'penerbit' => 'Informatika', 'kategori' => 'Web', 'stok' => 7]);
        Buku::create(['kode_buku' => 'BK-0010', 'judul' => 'Belajar Framework Laravel 11', 'pengarang' => 'Rian Ariona', 'penerbit' => 'Lokomedia', 'kategori' => 'Web', 'stok' => 4]);
        Buku::create(['kode_buku' => 'BK-0011', 'judul' => 'Fullstack JavaScript Modern', 'pengarang' => 'Eko Kurniawan', 'penerbit' => 'Andi Publisher', 'kategori' => 'Web', 'stok' => 2]);
        Buku::create(['kode_buku' => 'BK-0012', 'judul' => 'Desain UI/UX dengan Figma', 'pengarang' => 'Figma Master Class', 'penerbit' => 'Elex Media', 'kategori' => 'Web', 'stok' => 5]);

        // Kategori: Informatika
        Buku::create(['kode_buku' => 'BK-0013', 'judul' => 'Kecerdasan Buatan & Machine Learning', 'pengarang' => 'Suyanto', 'penerbit' => 'Informatika', 'kategori' => 'Informatika', 'stok' => 6]);
        Buku::create(['kode_buku' => 'BK-0014', 'judul' => 'Keamanan Siber & Ethical Hacking', 'pengarang' => 'Budi Rahardjo', 'penerbit' => 'ITB Press', 'kategori' => 'Informatika', 'stok' => 3]);
        Buku::create(['kode_buku' => 'BK-0015', 'judul' => 'Struktur Data & Algoritma Java', 'pengarang' => 'Rinaldi Munir', 'penerbit' => 'Informatika', 'kategori' => 'Informatika', 'stok' => 5]);
        Buku::create(['kode_buku' => 'BK-0016', 'judul' => 'Pengantar Cloud Computing', 'pengarang' => 'Budi Santoso', 'penerbit' => 'Gava Media', 'kategori' => 'Informatika', 'stok' => 0]);

        // Kategori: Matematika
        Buku::create(['kode_buku' => 'BK-0017', 'judul' => 'Aljabar Linear Elemen', 'pengarang' => 'Howard Anton', 'penerbit' => 'Erlangga', 'kategori' => 'Matematika', 'stok' => 4]);
        Buku::create(['kode_buku' => 'BK-0018', 'judul' => 'Kalkulus Multivariabel', 'pengarang' => 'James Stewart', 'penerbit' => 'Cengage', 'kategori' => 'Matematika', 'stok' => 3]);
        Buku::create(['kode_buku' => 'BK-0019', 'judul' => 'Persamaan Diferensial Biasa', 'pengarang' => 'Wono Setya Budhi', 'penerbit' => 'ITB Press', 'kategori' => 'Matematika', 'stok' => 2]);

        // Kategori: Statistika
        Buku::create(['kode_buku' => 'BK-0020', 'judul' => 'Metode Penelitian Kuantitatif', 'pengarang' => 'Sugiyono', 'penerbit' => 'Alfabeta', 'kategori' => 'Statistika', 'stok' => 8]);
        Buku::create(['kode_buku' => 'BK-0021', 'judul' => 'Pengantar Probabilitas & Statistik', 'pengarang' => 'Walpole & Myers', 'penerbit' => 'Pearson', 'kategori' => 'Statistika', 'stok' => 4]);
        Buku::create(['kode_buku' => 'BK-0022', 'judul' => 'Analisis Data Multivariat', 'pengarang' => 'Singgih Santoso', 'penerbit' => 'Elex Media', 'kategori' => 'Statistika', 'stok' => 3]);


        // ==========================================
        // 3. DATA TRANSAKSI PEMINJAMAN DUMMY
        // ==========================================
        
        // Peminjaman 1 (Aktif)
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

        // Peminjaman 2 (Terlambat)
        $p2 = Peminjaman::create([
            'id_user' => $anggota2->id_user,
            'tanggal_pinjam' => '2026-06-25',
            'tanggal_jatuh_tempo' => '2026-07-09'
        ]);
        DetailPeminjaman::create([
            'id_peminjaman' => $p2->id_peminjaman,
            'id_buku' => $b2->id_buku,
            'status_buku' => 'Dipinjam'
        ]);

        // Peminjaman 3 (Sudah Dikembalikan)
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

        // Peminjaman 4 (Milik User Nirvana Seb untuk Demo Riwayat)
        $p4 = Peminjaman::create([
            'id_user' => $userNirvana->id_user,
            'tanggal_pinjam' => '2026-07-12',
            'tanggal_jatuh_tempo' => '2026-07-26'
        ]);
        DetailPeminjaman::create([
            'id_peminjaman' => $p4->id_peminjaman,
            'id_buku' => $b2->id_buku,
            'status_buku' => 'Dipinjam'
        ]);

        $p5 = Peminjaman::create([
            'id_user' => $userNirvana->id_user,
            'tanggal_pinjam' => '2026-07-01',
            'tanggal_jatuh_tempo' => '2026-07-15'
        ]);
        DetailPeminjaman::create([
            'id_peminjaman' => $p5->id_peminjaman,
            'id_buku' => $b1->id_buku,
            'status_buku' => 'Dipinjam'
        ]);
    }
}