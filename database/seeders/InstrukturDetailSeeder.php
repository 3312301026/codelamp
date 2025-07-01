<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\InstrukturDetail;

class InstrukturDetailSeeder extends Seeder
{
    public function run(): void
    {
        $instrukturs = User::where('role', 'instruktur')->get();

        foreach ($instrukturs as $instruktur) {
            InstrukturDetail::updateOrCreate(
                ['user_id' => $instruktur->id],
                [
                    'nomor_ktp' => fake()->numerify('################'), // ✅ Diganti dari fake()->nik()
                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                    'pekerjaan' => fake()->jobTitle(),
                    'perkenalan' => fake()->sentence(10),
                    'alamat' => fake()->address(),
                    'nama_bank' => fake()->randomElement(['BCA', 'BNI', 'BRI', 'Mandiri']),
                    'nama_rekening' => $instruktur->name,
                    'nomor_rekening' => fake()->bankAccountNumber(),
                ]
            );
        }
    }
}
