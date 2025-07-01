<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kursus_siswa', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel users (sebagai siswa)
            $table->foreignId('siswa_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Relasi ke tabel kursus
            $table->foreignId('kursus_id')
                  ->constrained('kursus')
                  ->onDelete('cascade');

            $table->integer('skor'); // Nilai kursus
            $table->enum('status', ['aktif', 'selesai', 'batal'])->default('aktif'); // Status keikutsertaan
            $table->date('tanggal_masuk'); // Tanggal mulai ikut kursus

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursus_siswa');
    }
};
