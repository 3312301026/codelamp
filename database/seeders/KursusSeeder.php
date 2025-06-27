<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kursus;

class KursusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kursus::create([
            'tgl_pembuatan' => now()->toDateString(),
            'instruktur' => 'John Doe',
            'judul_kursus' => 'Belajar Laravel Dasar',
            'kategori' => 'Programming',
            'harga_kursus' => 100000,
            'status' => 'aktif',
        ]);
    }
}
