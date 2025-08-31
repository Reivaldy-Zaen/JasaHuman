<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Klien;
use App\Models\Pekerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        Log::info('Request Data: ', $request->all());

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'gender' => 'nullable|in:Laki-laki,Perempuan',
            'password' => 'required|min:6',
            'role' => 'required|in:pekerja,klien',
        ];
        
        if ($request->role === 'pekerja') {
            $rules['umur'] = 'required|integer|min:1|max:100';
            $rules['negara'] = 'required|string';
            $rules['foto'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Log::error('Validation Failed: ', $validator->errors()->toArray());
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $fotoPath = null;
        if ($request->hasFile('foto') && $request->role === 'pekerja') {
            $fotoPath = $request->file('foto')->store('profiles', 'public');
            Log::info('Foto Path: ' . $fotoPath);
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'password' => Hash::make($request->password),
                'umur' => $request->umur ?? null,
                'negara' => $request->negara ?? null,
                'foto' => $fotoPath ?? null,
                'role' => $request->role,
            ]);
            Log::info('User Created: ', $user->toArray());

            if ($user->role === 'klien') {
                $klien = Klien::create([
                    'name' => $user->name, 
                    'email' => $user->email,
                    'umur' => $user->umur,
                ]);
                Log::info('Klien Created: ', $klien->toArray());
            } elseif ($user->role === 'pekerja') {
                $pekerja = Pekerja::create([
                    'name' => $user->name, 
                    'umur' => $user->umur,
                    'negara' => $user->negara,
                    'gender' => $user->gender,
                    'foto' => $fotoPath,
                ]);
                Log::info('Pekerja Created: ', $pekerja->toArray());
            }
   
            auth()->login($user);

            if ($user->role === 'klien') {
                session()->flash('welcome_message', 'Selamat datang! Temukan pekerja terbaik untuk Anda.');
                return redirect()->route('pekerja.index');
            } else {
                session()->flash('welcome_message', 'Selamat datang! Temukan pekerjaan yang sesuai dengan keahlian Anda.');
                return redirect()->route('pekerja.index');
            }
        } catch (\Exception $e) {
            Log::error('Exception Caught: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi error saat menyimpan data: ' . $e->getMessage()])->withInput();
        }
    }
}