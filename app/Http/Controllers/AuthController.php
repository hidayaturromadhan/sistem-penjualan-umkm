<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

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
        // Validasi input manual menggunakan Validator
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Pastikan semua username dan password terisi dengan benar!')
                ->showConfirmButton('OK', '#1A5F3C'); // Ubah warna tombol OK
            return redirect()->back()->withErrors($validator)->withInput();
        }
        

        // Cek kredensial dan login
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan peran
            $user = Auth::user();
            if ($user->peran->nama_peran === 'Admin') {
                toast('Selamat datang, Admin!', 'success');
                return redirect()->route('admin.dashboard');
            } elseif ($user->peran->nama_peran === 'Kasir') {
                toast('Selamat datang, Kasir!', 'success');
                return redirect()->route('kasir.dashboard');
            }

            // Redirect user biasa
            toast('Selamat datang!', 'success');
            return redirect()->intended('/');
        }

        // Jika login gagal
        Alert::error('Login Gagal', 'Username atau password salah!');
        return back()->withErrors(['login' => 'Username atau password salah!'])->withInput();
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        toast('Logout berhasil', 'info');
        return redirect('/login');
    }
}
