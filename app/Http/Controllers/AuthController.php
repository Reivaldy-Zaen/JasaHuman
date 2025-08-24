<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Tampilkan form login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses login user
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek role user
            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard.index')->with('success', 'Selamat datang Admin!');
            } elseif (Auth::user()->role === 'klien') {
                return redirect()->route('pekerja.index')->with('success', 'Login berhasil sebagai Klien!');
            } else {
                // Kalau role tidak dikenali
                Auth::logout();
                return redirect()->route('login')->withErrors(['role' => 'Role tidak dikenali.']);
            }
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    /**
     * Logout user
     */
public function logout(Request $request)
{
    Auth::logout(); // Hapus session login
    $request->session()->invalidate(); // Invalidasi session
    $request->session()->regenerateToken(); // Regenerate CSRF token

    return redirect()->route('login')->with('success', 'Anda berhasil logout.');
}
}
