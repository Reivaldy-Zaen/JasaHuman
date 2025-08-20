<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pekerja;

class PekerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
    {
        Pekerja::create([
            'nama' => 'John Doe',
            'umur' => 25,
            'negara' => 'Indonesia',
            'jenis_kelamin' => 'Laki-laki',
            'foto' => 'https://kaltimkita.com/po-content/uploads/raffi-ahmad-harta.jpg',
        ]);

        Pekerja::create([
            'nama' => 'Jane Smith',
            'umur' => 30,
            'negara' => 'Malaysia',
            'jenis_kelamin' => 'Perempuan',
            'foto' => 'https://kaltimkita.com/po-content/uploads/raffi-ahmad-harta.jpg',
        ]);
    }
}
