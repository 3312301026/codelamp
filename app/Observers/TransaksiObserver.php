<?php

namespace App\Observers;

use App\Models\Transaksi;
use App\Models\Kursus;

class TransaksiObserver
{
    public function created(Transaksi $transaksi)
    {
        if ($transaksi->status === 'berhasil') {
            $this->updateJumlahSiswa($transaksi->kursus_id);
        }
    }

    public function updated(Transaksi $transaksi)
    {
        if ($transaksi->wasChanged('status') && $transaksi->status === 'berhasil') {
            $this->updateJumlahSiswa($transaksi->kursus_id);
        }
    }

    protected function updateJumlahSiswa($kursusId)
    {
        $jumlah = Transaksi::where('kursus_id', $kursusId)
            ->where('status', 'berhasil')
            ->count();

        Kursus::where('id', $kursusId)->update(['jumlah_siswa' => $jumlah]);
    }
}
