<?php

namespace App\Observers;

use App\Models\KursusSiswa;
use Illuminate\Support\Facades\DB;

class KursusSiswaObserver
{
    public function created(KursusSiswa $kursusSiswa)
    {
        $this->updateJumlahSiswa($kursusSiswa->kursus_id);
    }

    public function updated(KursusSiswa $kursusSiswa)
    {
        $this->updateJumlahSiswa($kursusSiswa->kursus_id);
    }

    public function deleted(KursusSiswa $kursusSiswa)
    {
        $this->updateJumlahSiswa($kursusSiswa->kursus_id);
    }

    private function updateJumlahSiswa($kursusId)
    {
        $jumlahSiswa = DB::table('kursus_siswa')
            ->join('transaksi', function ($join) {
                $join->on('kursus_siswa.siswa_id', '=', 'transaksi.siswa_id')
                     ->on('kursus_siswa.kursus_id', '=', 'transaksi.kursus_id');
            })
            ->where('kursus_siswa.kursus_id', $kursusId)
            ->where('kursus_siswa.status', 'aktif')
            ->count();

        DB::table('kursus')
            ->where('id', $kursusId)
            ->update(['jumlah_siswa' => $jumlahSiswa]);
    }
}
