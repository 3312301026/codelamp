<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tabel dan primary key
    protected $table = 'users';
    protected $primaryKey = 'id';

    // Kolom yang bisa diisi
    protected $fillable = [
        'name',             // sesuai migration
        'nomor_hp',
        'role',             // admin / instruktur / siswa
        'email',
        'password',
        'email_verified_at',
    ];

    // Kolom yang harus disembunyikan saat serialisasi
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Kolom bertipe datetime
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi ke model lain (jika ada)
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function pertanyaans()
    {
        return $this->hasMany(Pertanyaan::class);
    }

    public function kursus()
    {
        return $this->belongsToMany(Kursus::class, 'kursus_siswa')
            ->withPivot('skor', 'status', 'tanggal_masuk')
            ->withTimestamps();
    }

    public function kursusSiswa()
    {
        return $this->hasMany(KursusSiswa::class);
    }

    public function instrukturDetail()
    {
        return $this->hasOne(InstrukturDetail::class, 'user_id');
    }
}
