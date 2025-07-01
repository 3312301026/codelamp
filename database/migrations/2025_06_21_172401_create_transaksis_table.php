<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            
            // Mengacu ke tabel users (siswa)
            $table->foreignId('siswa_id')->constrained('users')->onDelete('cascade');
            
            // Mengacu ke tabel kursus
            $table->foreignId('kursus_id')->constrained('kursus')->onDelete('cascade');
            
            $table->enum('status', ['pending', 'berhasil', 'gagal'])->default('pending');
            $table->timestamp('tanggal_transaksi')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
