<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TujuanKursus extends Model
{
    use HasFactory;

    protected $table = 'tujuan_kursus'; // pastikan sesuai dengan nama tabel migrasi

    protected $fillable = [
        'kursus_id',
        'deskripsi',
    ];

    public function kursus()
    {
        return $this->belongsTo(Kursus::class);
    }
}
