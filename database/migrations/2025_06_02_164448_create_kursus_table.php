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
        Schema::create('kursus', function (Blueprint $table) {
            //    $table->bigIncrements('id_kursus'); // primary key dengan nama id_kursus
            $table->id();
            $table->date('tgl_pembuatan');
            $table->foreignId('instruktur_id')->constrained('users')->onDelete('cascade');
            $table->string('judul_kursus');
            $table->string('kategori');
            $table->integer('harga_kursus');
            $table->string('status');  // misal: aktif, nonaktif, draft
            $table->string('cover');  // misal: aktif, nonaktif, draft
            $table->string('vidio');  // misal: aktif, nonaktif, draft
            $table->integer('jumlah_siswa');
            $table->text('deskripsi');
            $table->timestamps();  // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursus');
    }
};
