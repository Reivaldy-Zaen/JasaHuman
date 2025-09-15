<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Klien;
use App\Models\Pekerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage; // Untuk mengelola file
  // Untuk membuat gambar


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
        if ($request->hasFile('foto')) {
            // Jika ada file foto yang diunggah, simpan seperti biasa
            $fotoPath = $request->file('foto')->store('profiles', 'public');
            Log::info('Uploaded Foto Path: ' . $fotoPath);
        } else {
            // Jika tidak ada foto, buat gambar default dari inisial
            $fotoPath = $this->createInitialImage($request->name);
            Log::info('Generated Default Foto Path: ' . $fotoPath);
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
                'foto' => $fotoPath,
                'role' => $request->role,
            ]);
            Log::info('User Created: ', $user->toArray());

            if ($user->role === 'klien') {
                $klien = Klien::create([
                    'user_id' => $user->id,
                    'name' => $user->name, 
                    'email' => $user->email,
                    'umur' => $user->umur,
                    'foto' => $fotoPath,
                ]);
                Log::info('Klien Created: ', $klien->toArray());
            } elseif ($user->role === 'pekerja') {
                $pekerja = Pekerja::create([
                    'user_id' => $user->id,
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
    private function createInitialImage($name)
    {
        $path = 'profiles/' . uniqid() . '.png';

        $words = explode(' ', $name);
        $initials = strtoupper(substr($words[0], 0, 1));
        if (isset($words[1])) {
            $initials .= strtoupper(substr($words[1], 0, 1));
        }

        // Ukuran gambar
        $width = 200;
        $height = 200;

        // Buat gambar kosong
        $image = imagecreatetruecolor($width, $height);

        // Buat warna background dari hash nama
        $bgColorHex = substr(md5($name), 0, 6);
        $r = hexdec(substr($bgColorHex, 0, 2));
        $g = hexdec(substr($bgColorHex, 2, 2));
        $b = hexdec(substr($bgColorHex, 4, 2));
        $backgroundColor = imagecolorallocate($image, $r, $g, $b);

        // Warna teks (putih)
        $textColor = imagecolorallocate($image, 255, 255, 255);

        // Isi background
        imagefill($image, 0, 0, $backgroundColor);

        // Tentukan path ke file font. PENTING: Anda harus menyediakan file font ini.
        $fontPath = public_path('fonts/arial.ttf');
        $fontSize = 90; // Ukuran font

        // Jika file font tidak ada, berikan error atau fallback
        if (!file_exists($fontPath)) {
            // Log::error('Font file not found: ' . $fontPath);
            // Fallback sederhana jika font tidak ada (opsional)
            imagestring($image, 5, 65, 90, $initials, $textColor);
        } else {
            // Hitung posisi agar teks berada di tengah
            $textBox = imagettfbbox($fontSize, 0, $fontPath, $initials);
            $textWidth = $textBox[2] - $textBox[0];
            $textHeight = $textBox[1] - $textBox[7];
            $x = ($width / 2) - ($textWidth / 2);
            $y = ($height / 2) + ($textHeight / 2);

            // Tulis teks ke gambar
            imagettftext($image, $fontSize, 0, $x, $y, $textColor, $fontPath, $initials);
        }

        // Tangkap output gambar ke dalam variabel
        ob_start();
        imagepng($image);
        $imageData = ob_get_clean();

        // Hapus gambar dari memori
        imagedestroy($image);
            
        Storage::disk('public')->put($path, $imageData);

        return $path;
    }
    //
}