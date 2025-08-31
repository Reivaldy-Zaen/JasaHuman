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
            'nama' => 'Lia Tang',
            'umur' => 25,
            'negara' => 'Indonesia',
            'gender' => 'Perempuan',
            'foto' => 'https://kaltimkita.com/po-content/uploads/raffi-ahmad-harta.jpg',
        ]);
        Pekerja::create([
            'nama' => 'Jessika',
            'umur' => 15,
            'negara' => 'Rusia',
            'gender' => 'Perempuan',
            'foto' => 'https://kaltimkita.com/po-content/uploads/raffi-ahmad-harta.jpg',
        ]);

        Pekerja::create([
            'nama' => 'Jane Smith',
            'umur' => 30,
            'negara' => 'Malaysia',
            'gender' => 'Perempuan',
            'foto' => 'https://kaltimkita.com/po-content/uploads/raffi-ahmad-harta.jpg',
        ]);

        
    }
}
