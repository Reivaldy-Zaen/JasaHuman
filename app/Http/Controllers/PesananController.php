<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerja;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use App\Models\Klien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    // Update status otomatis sebelum menampilkan
    Pesanan::updateStatuses();

    // Ambil semua pesanan dari yang terbaru
    $pesanan = Pesanan::orderBy('created_at', 'desc')->get();

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
        $user = Auth::user();
        $pekerja = [];

        if ($user && $user->role === 'pekerja') {

            $pekerja = Pekerja::where('user_id', '!=', $user->id)->get();

        } else {

            $pekerja = Pekerja::all();
        }

        return view('pekerja.index', compact('pekerja'));
    }

    public function formPesan($pekerja_id)
    {
        $pekerja = Pekerja::findOrFail($pekerja_id);
        
        // LOGIC JAM DARI CODE 2: Update status pesanan sebelum menampilkan form
        Pesanan::updateStatuses();

        return view('pesanan.form', compact('pekerja'));
    }

    public function simpanPesanan(Request $request, $pekerja_id)
    {
        $request->validate([
            'nama_pemesan'  => 'required|string|max:255',
            'email_pemesan' => 'required|email|max:255',
            'nomer'         => 'required|numeric|digits_between:10,14',
            'tanggal_pemesanan' => 'required|date|after_or_equal:today', // Validasi tanggal
            // LOGIC JAM DARI CODE 2: Menggunakan jam_mulai dan durasi_jam
            'jam_mulai' => 'required',
            'durasi_jam' => 'required|integer|min:1|max:8'
        ]);

        if (Pesanan::isTimePassed($request->tanggal_pemesanan, $request->jam_mulai)) {
            return back()->withErrors(['jam_mulai' => 'Waktu yang dipilih sudah lewat. Silakan pilih waktu yang akan datang.'])->withInput();
        }

        // Periksa apakah jam sudah dipesan
        $isBooked = Pesanan::isBooked($pekerja_id, $request->tanggal_pemesanan, $request->jam_mulai);
        
        if ($isBooked) {
            return back()->withErrors(['jam_mulai' => 'Jam yang dipilih sudah dipesan. Silakan pilih jam lain.'])->withInput();
        }

        $pekerja = Pekerja::findOrFail($pekerja_id);

        try {
            DB::beginTransaction();

            // buat klien baru setiap kali pesan
            $klien = Klien::create([
                'user_id' => Auth::id(),
                'name'  => $request->nama_pemesan,
                'umur' => $request->umur,
                'email' => $request->email_pemesan,
                'nomer' => $request->nomer,
            ]);

            $pesanan = Pesanan::create([
                'pekerja_id'    => $pekerja_id,
                'klien_id'      => $klien->id,
                'nama_pemesan'  => $request->nama_pemesan,
                'email_pemesan' => $request->email_pemesan,
                'nomer'         => $request->nomer,
                'nama_pekerja'  => $pekerja->name,
                'tanggal_pemesanan' => $request->tanggal_pemesanan, 
                'jam_mulai'     => $request->jam_mulai, 
                'durasi_jam'    => $request->durasi_jam, 
                'status'        => 'pending' 
            ]);

            DB::commit();

            return redirect()->route('pesanan.sukses');

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Gagal menyimpan pesanan.', [
                'error_message' => $e->getMessage(),
                'file'          => $e->getFile(),
                'line'          => $e->getLine(),
                'pekerja_id'    => $pekerja_id,
                'request_data'  => $request->all(),
                'trace'         => $e->getTraceAsString() 
            ]);

            return back()->withErrors(['error' => 'Terjadi kesalahan saat memproses pesanan Anda. Silakan coba lagi.'])->withInput();
        }
    }
    
    public function getAvailableTimes($pekerjaId, $tanggal = null)
    {
        $availableTimes = ['11:30', '14:05', '16:40', '19:15', '22:50'];
        if (!$tanggal) {
        $tanggal = now()->format('Y-m-d');
    }
         
        $bookedTimes = Pesanan::where('pekerja_id', $pekerjaId)
                            ->where('tanggal_pemesanan', $tanggal)
                            ->whereIn('status', ['pending', 'progres'])
                            ->pluck('jam_mulai')
                            ->toArray();

        $result = [];
        foreach ($availableTimes as $time) {
            $result[] = [
                'time' => $time,
                'available' => !in_array($time, $bookedTimes)
            ];
        }

        return response()->json($result);
    }

    public function sukses()
    {
        return view('pesanan.sukses');
    }
    
    public function store(Request $request)
    {
        $pekerja = Pekerja::findOrFail($request->pekerja_id);
        Pesanan::create([
            'nama' => $request->nama,
            'nama_pekerja' => $pekerja->nama,
            'status' => 'pending'
        ]);

        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil dibuat!');
    }
}