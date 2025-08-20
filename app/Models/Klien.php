<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    use HasFactory;
    protected $table = 'klien';
    protected $fillable = ['nama', 'email'];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }

}
