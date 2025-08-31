<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Klien;
use App\Models\Pekerja;
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

        // Simpan file foto jika ada
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

        // Simpan data ke tabel Klien atau Pekerja berdasarkan role
        if ($user->role === 'klien') {
            Klien::create([
                'name' => $user->name,
                'email' => $request->email,
                'umur' => $request->umur,
            ]);
        } elseif ($user->role === 'pekerja') {
            Pekerja::create([
                'name' => $user->umur,
                'umur' => $request->umur,
                'negara' => $request->negara,
                'gender' => $request->gender,
                'foto' => $fotoPath,
            ]);
        }

        // Login user setelah berhasil mendaftar    
        auth()->login($user);

        // Redirect berdasarkan role
        if ($user->role === 'klien') {
            session()->flash('welcome_message', 'Selamat datang! Temukan pekerja terbaik untuk Anda.');
            return redirect()->route('pekerja.index');
        } else {
            session()->flash('welcome_message', 'Selamat datang! Temukan pekerjaan yang sesuai dengan keahlian Anda.');
            return redirect()->route('pekerja.index');
        }
    }
}