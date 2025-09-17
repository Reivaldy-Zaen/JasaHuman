<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    // ... (method show() dan edit() tidak berubah)

    /**
     * Mengupdate profil user
     */
     public function show()
    {

    $user = Auth::user();
    return view('profile.detail', compact('user')); 
    
    }
    public function edit()
    {

    $user = Auth::user();
    return view('profile.edit', compact('user'));

    }

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
            'about' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('foto')) {

            if ($user->foto && Storage::disk('public')->exists($user->foto)) {
                Storage::disk('public')->delete($user->foto);
            }

            $roleModel = $user->role === 'pekerja' ? $user->pekerja : $user->klien;
            if ($roleModel && $roleModel->foto && Storage::disk('public')->exists($roleModel->foto)) {
                if ($roleModel->foto !== $user->foto) { 
                    Storage::disk('public')->delete($roleModel->foto);
                }
            }

            $path = $request->file('foto')->store('profiles', 'public');
            $validated['foto'] = $path;
        }

        $user->update($validated);

        $roleData = [
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'gender' => $validated['gender'],
            'umur' => $validated['umur'],
            'negara' => $validated['negara'],
            'about' => $validated['about'] ?? null,
        ];

        if (isset($validated['foto'])) {
            $roleData['foto'] = $validated['foto'];
        }

        if ($user->role === 'pekerja' && $user->pekerja) {
            $user->pekerja->update($roleData);
        } elseif ($user->role === 'klien' && $user->klien) {
            $user->klien->update($roleData);
        }

        return redirect()->route('profile.detail')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}