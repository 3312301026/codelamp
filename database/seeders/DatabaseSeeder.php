<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil semua seeder yang ingin dijalankan di sini
        $this->call([
            UserSeeder::class,
            KursusSeeder::class,
            KursusSiswaSeeder::class,
            TransaksiSeeder::class,
            InstrukturDetailSeeder::class,
        ]);
    }
}