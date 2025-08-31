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
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Tampilkan data yang masuk untuk debugging (hapus setelah selesai)
        // dd($request->all());

        // Validasi input dengan aturan dinamis berdasarkan role
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'gender' => 'nullable|in:Laki-laki,Perempuan',
            'password' => 'required|min:6',
            'role' => 'required|in:pekerja,klien',
        ];
        
        // Tambahkan validasi umur, negara, dan foto hanya untuk role pekerja
        if ($request->role === 'pekerja') {
            $rules['umur'] = 'required|integer|min:1|max:100';
            $rules['negara'] = 'required|string';
            $rules['foto'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan file foto hanya jika role adalah pekerja
        $fotoPath = null;
        if ($request->hasFile('foto') && $request->role === 'pekerja') {
            $fotoPath = $request->file('foto')->store('profiles', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            // 'umur' => $request->umur ?? null,
            // 'negara' => $request->negara ?? null,
            'foto' => $fotoPath, // Hanya diisi jika pekerja dan foto diunggah
            'role' => $request->role,
        ]);

        // Simpan data ke tabel Klien atau Pekerja berdasarkan role
        if ($user->role === 'klien') {
            Klien::create([
                'name' => $user->name,
                'email' => $user->email,
                // 'umur' => $request->umur ?? null,
            ]);
        } elseif ($user->role === 'pekerja') {
            Pekerja::create([
                'name' => $user->name,
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