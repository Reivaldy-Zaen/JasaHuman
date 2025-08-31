<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerja extends Model
{
    use HasFactory;
      protected $table = 'pekerja';
    protected $fillable = ['name','umur','negara','gender','foto'];

    public function pesanan() {
        return $this->hasMany(Pesanan::class);
    }

    public function getFotoUrlAttribute()
{
        if ($this->foto && file_exists(storage_path('app/public/' . $this->foto))) {
            return asset('storage/' . $this->foto);
        }
        
        return asset('images/default-avatar.png');
    }
}
