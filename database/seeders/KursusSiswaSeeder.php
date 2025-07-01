<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kursus;
use App\Models\KursusSiswa;
use Illuminate\Support\Carbon;

class KursusSiswaSeeder extends Seeder
{
    public function run(): void
    {
        $siswas = User::where('role', 'siswa')->get();
        $kursuses = Kursus::all();

        if ($siswas->isEmpty() || $kursuses->isEmpty()) {
            $this->command->warn('Tidak ada siswa atau kursus tersedia. Seeder dibatalkan.');
            return;
        }

        foreach ($siswas as $siswa) {
            // Pilih 1-3 kursus secara acak yang akan diikuti oleh siswa ini
            $kursusDipilih = $kursuses->random(rand(1, min(3, $kursuses->count())));

            foreach ($kursusDipilih as $kursus) {
                KursusSiswa::create([
                    'siswa_id' => $siswa->id,
                    'kursus_id' => $kursus->id,
                    'skor' => rand(50, 100),
                    'status' => collect(['aktif', 'selesai', 'batal'])->random(),
                    'tanggal_masuk' => Carbon::now()->subDays(rand(1, 30)),
                ]);
            }
        }
    }
}
