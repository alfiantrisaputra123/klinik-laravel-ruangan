<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    public function run(): void
    {
        Ruangan::create(['kode' => 'R-01', 'nama_ruangan' => 'Ruang Poli Gigi',   'jenis_poli' => 'Poli Gigi', 'lokasi_gedung' => 'Gedung A, Lantai 1', 'status' => 'Tersedia']);
        Ruangan::create(['kode' => 'R-02', 'nama_ruangan' => 'Ruang Poli Umum 1', 'jenis_poli' => 'Poli Umum', 'lokasi_gedung' => 'Gedung A, Lantai 1', 'status' => 'Terpakai']);
        Ruangan::create(['kode' => 'R-03', 'nama_ruangan' => 'Ruang Poli Umum 2', 'jenis_poli' => 'Poli Umum', 'lokasi_gedung' => 'Gedung A, Lantai 2', 'status' => 'Tersedia']);
        Ruangan::create(['kode' => 'R-04', 'nama_ruangan' => 'Ruang Poli Anak',   'jenis_poli' => 'Poli Anak', 'lokasi_gedung' => 'Gedung B, Lantai 1', 'status' => 'Maintenance']);
    }
}