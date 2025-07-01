<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sub_materi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materi_kursus_id')
                  ->constrained('materi_kursus')
                  ->onDelete('cascade');
            $table->string('judul');
            $table->unsignedInteger('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sub_materi');
    }
};
