<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriKursus extends Model
{

    protected $table = 'materi_kursus'; // pastikan sesuai dengan nama tabel migrasi
    protected $fillable = ['kursus_id', 'judul', 'deskripsi', 'urutan'];

    public function kursus()
    {
        return $this->belongsTo(Kursus::class);
    }

    public function subMateri()
    {
        return $this->hasMany(SubMateri::class);
    }
}
