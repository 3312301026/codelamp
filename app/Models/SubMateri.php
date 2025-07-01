<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubMateri extends Model
{

    protected $table = 'sub_materi'; // pastikan sesuai dengan nama tabel migrasi
    protected $fillable = ['materi_kursus_id', 'judul', 'urutan'];

    public function materi()
    {
        return $this->belongsTo(MateriKursus::class, 'materi_kursus_id');
    }
}
