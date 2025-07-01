<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateJumlahSiswaSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua kursus
        $kursusList = DB::table('kursus')->get();

        foreach ($kursusList as $kursus) {
            // Hitung jumlah siswa aktif yang punya transaksi
            $jumlahSiswa = DB::table('kursus_siswa')
                ->join('transaksi', function ($join) {
                    $join->on('kursus_siswa.siswa_id', '=', 'transaksi.siswa_id')
                         ->on('kursus_siswa.kursus_id', '=', 'transaksi.kursus_id');
                })
                ->where('kursus_siswa.kursus_id', $kursus->id)
                ->where('kursus_siswa.status', 'aktif')
                ->count();

            // Update jumlah siswa
            DB::table('kursus')
                ->where('id', $kursus->id)
                ->update(['jumlah_siswa' => $jumlahSiswa]);
        }
    }
}
