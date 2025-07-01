<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        // Data dummy (bisa diganti dengan query dari tabel nyata)
        $data = [
            ['siswa_id' => 4, 'kursus_id' => 1],
            ['siswa_id' => 5, 'kursus_id' => 2],
            ['siswa_id' => 6, 'kursus_id' => 3],
            ['siswa_id' => 4, 'kursus_id' => 3],
            ['siswa_id' => 5, 'kursus_id' => 1],
            ['siswa_id' => 6, 'kursus_id' => 2],
        ];

        $statusList = ['gagal', 'pending', 'berhasil'];

        foreach ($data as $item) {
            DB::table('transaksi')->insert([
                'siswa_id' => $item['siswa_id'],
                'kursus_id' => $item['kursus_id'],
                'status' => fake()->randomElement($statusList),
                'tanggal_transaksi' => fake()->dateTimeBetween('-2 weeks', 'now'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
