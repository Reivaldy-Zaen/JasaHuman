<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerja;
use App\Models\Pesanan;
class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        ]);

        Pesanan::create([
            'pekerja_id' => $pekerja_id,
            'nama_pemesan' => $request->nama_pemesan,
            'email_pemesan' => $request->email_pemesan,
        ]);

        return redirect()->route('pesanan.sukses');
    }

    public function sukses()
    {
        return view('pesanan.sukses');
    }
}
