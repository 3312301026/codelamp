<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KursusSiswa extends Model
{
    use HasFactory;

    protected $table = 'kursus_siswa';

    protected $fillable = [
        'siswa_id',
        'kursus_id',
        'skor',
        'status',
        'tanggal_masuk',
    ];

    public $timestamps = true;

    /**
     * Relasi ke user dengan role 'siswa'
     */
    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id')->where('role', 'siswa');
    }

    /**
     * Relasi ke kursus
     */
    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'kursus_id');
    }
}
