<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
        $user = Auth::user();

        // Pengecekan jika status keanggotaan Nonaktif / Non-aktif
        if ($user->status_aktif !== 'Aktif') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()->with('error', 'Akun Anda telah dinonaktifkan. Silakan hubungi admin perpustakaan.')->withInput();
        }

        $request->session()->regenerate();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    }

    return back()->with('error', 'Username atau password salah!')->withInput();
}

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:150',
            'username' => 'required|string|max:50|unique:users,username',
            'alamat' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'role' => 'anggota',
            'status_aktif' => 'Aktif',
        ]);

        Auth::login($user);
        return redirect()->route('user.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}