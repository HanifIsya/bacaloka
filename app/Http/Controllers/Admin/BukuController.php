<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // READ: Menampilkan daftar buku & filter pencarian
    public function index(Request $request)
    {
        $query = Buku::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('judul', 'like', "%{$search}%")
                  ->orWhere('pengarang', 'like', "%{$search}%")
                  ->orWhere('penerbit', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%")
                  ->orWhere('kode_buku', 'like', "%{$search}%");
        }

        $buku = $query->latest('id_buku')->get();
        $totalJudul = Buku::count();

        return view('admin.buku.index', compact('buku', 'totalJudul'));
    }

    // CREATE: Menyimpan buku baru ke MySQL
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:150',
            'penerbit' => 'required|string|max:150',
            'stok' => 'required|integer|min:0',
            'kategori' => 'nullable|string|max:50',
        ]);

        // Generate Kode Buku Otomatis (BK-0001, BK-0002, dst)
        $lastBuku = Buku::orderBy('id_buku', 'desc')->first();
        $nextId = $lastBuku ? $lastBuku->id_buku + 1 : 1;
        $kodeBuku = 'BK-' . sprintf('%04d', $nextId);

        Buku::create([
            'kode_buku' => $kodeBuku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'stok' => $request->stok,
            'kategori' => $request->kategori ?? 'Informatika',
        ]);

        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    // UPDATE: Memperbarui data buku
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:150',
            'penerbit' => 'required|string|max:150',
            'stok' => 'required|integer|min:0',
            'kategori' => 'nullable|string|max:50',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'stok' => $request->stok,
            'kategori' => $request->kategori ?? 'Informatika',
        ]);

        return redirect()->route('admin.buku.index')->with('success', 'Data buku berhasil diperbarui!');
    }

    // DELETE: Menghapus data buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil dihapus!');
    }
}