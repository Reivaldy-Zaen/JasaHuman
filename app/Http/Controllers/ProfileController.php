<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Menampilkan profil user yang sedang login
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile.detail', compact('user')); // Pastikan view-nya 'profile.show'
    }

    /**
     * Menampilkan form edit profil
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user')); // Pastikan view-nya 'profile.edit'
    }

    /**
     * Mengupdate profil user
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'umur' => 'required|integer|min:1',
            'negara' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle upload foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::delete('public/' . $user->foto);
            }
            
            $path = $request->file('foto')->store('profiles', 'public');
            $validated['foto'] = $path;
        }

        $user->update($validated);

        return redirect()->route('profile.detail') // Redirect ke 'profile.show'
            ->with('success', 'Profil berhasil diperbarui!');
    }
}