<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan'; 
    protected $fillable = ['pekerja_id', 'klien_id', 'nama_pemesan', 'email_pemesan' , 'nomer' ,'status','nama_pekerja', "jam_mulai", "durasi_jam", 'tanggal_pemesanan'];

    public function klien()
    {
        return $this->belongsTo(Klien::class);
    }

    public function pekerja()
    {
        return $this->belongsTo(Pekerja::class);
    }
       public static function updateStatuses()
    {
        $now = now();
        
        // Update pesanan yang sudah melewati waktu menjadi selesai
        self::where('status', 'progres')
            ->whereDate('tanggal_pemesanan', '<=', $now->format('Y-m-d'))
            ->whereRaw('ADDTIME(jam_mulai, SEC_TO_TIME(durasi_jam * 3600)) <= ?', [$now->format('H:i:s')])
            ->update(['status' => 'selesai']);
            
        // Update pesanan yang sudah mulai menjadi progres
        self::where('status', 'pending')
            ->whereDate('tanggal_pemesanan', '<=', $now->format('Y-m-d'))
            ->where('jam_mulai', '<=', $now->format('H:i:s'))
            ->update(['status' => 'progres']);
    }

    // Method untuk cek apakah jam sudah dipesan
    // PASTIKAN method isBooked() seperti ini:
public static function isBooked($pekerjaId, $tanggalPemesanan, $jamMulai)
{
    return self::where('pekerja_id', $pekerjaId)
        ->where('tanggal_pemesanan', $tanggalPemesanan)
        ->whereIn('status', ['pending', 'progres'])
        ->where('jam_mulai', $jamMulai)
        ->exists();
}

    // Method untuk cek apakah waktu sudah lewat
    public static function isTimePassed($tanggalPemesanan, $jamMulai)
    {
        $now = now();
        $selectedDateTime = Carbon::createFromFormat('Y-m-d H:i', $tanggalPemesanan . ' ' . $jamMulai);
        
        return $selectedDateTime->lt($now);
    }

    // Accessor untuk mendapatkan jam selesai
    public function getJamSelesaiAttribute()
    {
        if ($this->jam_mulai && $this->durasi_jam) {
            $jamMulai = Carbon::createFromFormat('H:i', $this->jam_mulai);
            return $jamMulai->addHours($this->durasi_jam)->format('H:i');
        }
        return null;
    }
}
