<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // updateOrCreate: kalau email sudah ada maka diperbarui, kalau belum maka dibuat
        User::updateOrCreate(
            ['email' => 'admin@klinik.test'],
            ['name' => 'Admin Klinik', 'password' => 'password', 'role' => 'admin']
        );

        User::updateOrCreate(
            ['email' => 'petugas@klinik.test'],
            ['name' => 'Petugas Klinik', 'password' => 'password', 'role' => 'petugas']
        );
    }
}
