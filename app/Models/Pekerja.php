<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerja extends Model
{
    use HasFactory;
      protected $table = 'pekerja';
    protected $fillable = ['nama','umur','negara','jenis_kelamin','foto'];

    public function pesanan() {
        return $this->hasMany(Pesanan::class);
    }
}
