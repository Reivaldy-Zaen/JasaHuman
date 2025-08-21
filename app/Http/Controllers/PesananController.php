<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerja;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use App\Models\Klien;
class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $pesanan = Pesanan::all();
    return view('pesanan.index', compact('pesanan'));
}

public function selesai($id)
{
    $pesanan = Pesanan::findOrFail($id);
    $pesanan->update(['status' => 'selesai']);
    
    return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diselesaikan!');
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

       public function daftarPekerja()
    {
        $pekerja = Pekerja::all();
        return view('pekerja.index', compact('pekerja'));
    }

    public function formPesan($pekerja_id)
    {
        $pekerja = Pekerja::findOrFail($pekerja_id);
        return view('pesanan.form', compact('pekerja'));
    }

     public function simpanPesanan(Request $request, $pekerja_id)
{
    $request->validate([
        'nama_pemesan' => 'required|string|max:255',
        'email_pemesan' => 'required|email|max:255',
        'nomer'=> 'required|numeric|digits_between:10,14',
        'jam' => 'required|string'
    ]);

    $alreadyBooked = Pesanan::where('pekerja_id', $pekerja_id)
    ->where('jam', $request->jam)
    ->where('status', 'aktif')
    ->exists();

if ($alreadyBooked) {
    return back()->withErrors(['jam' => 'Jam ini sudah dibooking orang lain!']);
}

    // buat klien baru setiap kali beli
    $klien = Klien::create([
        'nama'  => $request->nama_pemesan,
        'email' => $request->email_pemesan,
        'nomer' => $request->nomer,
    ]);

    // buat pesanan baru
    Pesanan::create([
        'pekerja_id'   => $pekerja_id,
        'klien_id'     => $klien->id,
        'nama_pemesan' => $request->nama_pemesan,
        'email_pemesan'=> $request->email_pemesan,
        'nomer'=> $request->nomer,
        'jam'           => $request->jam,
        'status'        => 'aktif', // default aktif
    ]);

    return redirect()->route('pesanan.sukses');
}

    public function sukses()
{
    return view('pesanan.sukses');
}
public function store(Request $request)
{
    Pesanan::create([
        'nama' => $request->nama,
        'status' => 'aktif'
    ]);

    return redirect()->route('dashboard')->with('success', 'Pesanan berhasil dibuat!');
}

}
