<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admins
        User::create([
            'name' => 'Admin Utama',
            'nomor_hp' => '081234567890',
            'role' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Instrukturs
        $instrukturs = [
            [
                'name' => 'Instruktur Satu',
                'nomor_hp' => '081234567891',
                'email' => 'instruktur1@example.com',
            ],
            [
                'name' => 'Instruktur Dua',
                'nomor_hp' => '081234567893',
                'email' => 'instruktur2@example.com',
            ],
        ];

        foreach ($instrukturs as $instruktur) {
            User::create([
                'name' => $instruktur['name'],
                'nomor_hp' => $instruktur['nomor_hp'],
                'role' => 'instruktur',
                'email' => $instruktur['email'],
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);
        }

        // Siswa
        $siswas = [
            [
                'name' => 'Siswa Pertama',
                'nomor_hp' => '081234567892',
                'email' => 'siswa1@example.com',
            ],
            [
                'name' => 'Siswa Kedua',
                'nomor_hp' => '081234567894',
                'email' => 'siswa2@example.com',
            ],
            [
                'name' => 'Siswa Ketiga',
                'nomor_hp' => '081234567895',
                'email' => 'siswa3@example.com',
            ],
        ];

        foreach ($siswas as $siswa) {
            User::create([
                'name' => $siswa['name'],
                'nomor_hp' => $siswa['nomor_hp'],
                'role' => 'siswa',
                'email' => $siswa['email'],
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);
        }
    }
}
