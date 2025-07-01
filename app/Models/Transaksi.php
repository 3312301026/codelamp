<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // 👇 Tambahkan baris ini untuk override nama tabel
    protected $table = 'transaksi';

    protected $fillable = [
        'siswa_id',
        'kursus_id',
        'status',
        'tanggal_transaksi',
        'metode_pembayaran',
        'created_at',
        'updated_at'
    ];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'kursus_id');
    }
}
