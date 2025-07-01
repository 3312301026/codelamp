<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'harga'];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
