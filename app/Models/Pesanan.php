<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan'; 
    protected $fillable = ['pekerja_id', 'klien_id', 'nama_pemesan', 'email_pemesan' , 'nomer' ,'status','nama_pekerja', "jam"];

    public function klien()
    {
        return $this->belongsTo(Klien::class);
    }

    public function pekerja()
    {
        return $this->belongsTo(Pekerja::class);
    }
}

