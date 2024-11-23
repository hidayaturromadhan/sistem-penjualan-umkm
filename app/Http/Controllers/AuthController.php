<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function login()
    {
        return view('auth.login'); // Pastikan view 'auth/login.blade.php' ada
    }

    // Proses otentikasi
    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Cek kredensial dan login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerasi session agar tidak ada session yang ditumpuk

            // Redirect berdasarkan peran
            $user = Auth::user();
            if ($user->peran->nama_peran === 'Admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->peran->nama_peran === 'Kasir') {
                return redirect()->route('kasir.dashboard');
            }

            // Redirect user biasa
            return redirect()->intended('/');
        }

        // Jika login gagal, kembali ke halaman login dengan error
        return back()->withErrors(['login' => 'Username atau password salah!'])->withInput();
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
