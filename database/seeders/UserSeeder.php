<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin ',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Klien
        User::create([
            'name' => 'Klien ',
            'email' => 'klien@example.com',
            'password' => Hash::make('password123'),
            'role' => 'klien',
        ]);
        User::create([
            'name' => 'Pekerja',
            'email' => 'pekerja@example.com',
            'password' => Hash::make('password123'),
            'role' => 'pekerja',
        ]);
    }
}
