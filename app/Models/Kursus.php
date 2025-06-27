<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;

    protected $table = 'kursus';

    protected $primaryKey = 'id_kursus';

    protected $fillable = [
        'tgl_pembuatan',
        'judul_kursus',
        'instruktur',
        'kategori',
        'harga_kursus',
        'status',
        'cover',        // field untuk foto cover
        'vidio',        // field untuk video kursus
        'jumlah_siswa', // field jumlah siswa
        'deskripsi',    // field deskripsi kursus
    ];

    public $timestamps = true;
}
