<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrukturDetail extends Model
{
    use HasFactory;

    protected $table = 'instruktur_detail';

    protected $fillable = [
        'user_id',
        'nomor_ktp',
        'jenis_kelamin',
        'pekerjaan',
        'perkenalan',
        'alamat',
        'nama_bank',
        'nama_rekening',
        'nomor_rekening',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
