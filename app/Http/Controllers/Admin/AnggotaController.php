<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    // READ: Menampilkan daftar anggota & pencarian
    public function index(Request $request)
    {
        $query = User::where('role', 'anggota');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('username', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
            });
        }

        $anggota = $query->latest('id_user')->get();
        $totalAnggota = User::where('role', 'anggota')->count();

        // Generate ID Anggota berikutnya (AG-0006)
        $lastUser = User::where('role', 'anggota')->orderBy('id_user', 'desc')->first();
        $nextId = $lastUser ? $lastUser->id_user + 1 : 1;
        $nextIdAnggota = 'AG-' . sprintf('%04d', $nextId);

        return view('admin.anggota.index', compact('anggota', 'totalAnggota', 'nextIdAnggota'));
    }

    // CREATE: Pendaftaran Anggota Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:150',
            'alamat' => 'required|string',
            'status_aktif' => 'required|in:Aktif,Non-aktif,Nonaktif',
        ]);

        // Auto generate username dari nama depan + angka unik
        $namaDepan = strtolower(explode(' ', trim($request->nama))[0]);
        $username = $namaDepan . rand(10, 99);

        User::create([
            'nama' => $request->nama,
            'username' => $username,
            'password' => Hash::make('password123'), // Password default
            'alamat' => $request->alamat,
            'role' => 'anggota',
            'status_aktif' => $request->status_aktif == 'Non-aktif' ? 'Nonaktif' : 'Aktif',
        ]);

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil didaftarkan! Username default: ' . $username);
    }

    // UPDATE: Memperbarui Data & Status Keanggotaan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:150',
            'alamat' => 'required|string',
            'status_aktif' => 'required|in:Aktif,Non-aktif,Nonaktif',
        ]);

        $user = User::where('role', 'anggota')->findOrFail($id);
        $user->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'status_aktif' => $request->status_aktif == 'Non-aktif' ? 'Nonaktif' : 'Aktif',
        ]);

        return redirect()->route('admin.anggota.index')->with('success', 'Data anggota berhasil diperbarui!');
    }
}