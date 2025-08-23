<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan'; 
    protected $fillable = ['pekerja_id', 'klien_id', 'nama_pemesan', 'email_pemesan' , 'nomer' ,'status','nama_pekerja', "jam_mulai", "durasi_jam"];

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
            ->whereRaw('ADDTIME(jam_mulai, SEC_TO_TIME(durasi_jam * 3600)) <= ?', [$now->format('H:i:s')])
            ->update(['status' => 'selesai']);
            
        // Update pesanan yang sudah mulai menjadi progres
        self::where('status', 'pending')
            ->where('jam_mulai', '<=', $now->format('H:i:s'))
            ->update(['status' => 'progres']);
    }

    // Method untuk cek apakah jam sudah dipesan (dari Code 1)
    public static function isBooked($pekerjaId, $jamMulai)
    {
        return self::where('pekerja_id', $pekerjaId)
            ->whereIn('status', ['pending', 'progres'])
            ->where('jam_mulai', $jamMulai)
            ->exists();
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
