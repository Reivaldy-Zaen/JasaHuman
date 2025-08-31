<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Tampilkan form pendaftaran
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Proses pendaftaran user baru
     */
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'gender' => 'nullable|in:Laki-laki,Perempuan',
            'password' => 'required|min:6',
            'role' => 'required|in:pekerja,klien',
            'umur' => 'required|integer|min:1|max:100',
            'negara' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $fotoPath = null;
        if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('profiles', 'public');
        }

        $user= User::create ([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'umur' => $request->umur,
            'negara' => $request->negara,
            'foto' => $request->fotoPath,
            'role' => $request->role,
        ]);

        // ✅ JIKA PEKERJA, TAMBAHKAN DATA LENGKAP
        if ($request->role === 'pekerja') {
            $user['umur'] = $request->umur;
            $user['negara'] = $request->negara;
            $user['foto'] = $fotoPath;
        }

        // Login user setelah berhasil mendaftar
        auth()->login($user);

        // Redirect berdasarkan role
        session()->flash('welcome_message', 'Selamat datang!');
        return redirect()->route('pekerja.index');
    }
}