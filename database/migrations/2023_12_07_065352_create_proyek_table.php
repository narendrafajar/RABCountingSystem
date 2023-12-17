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
        Schema::create('proyek', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama');
            $table->foreignId('pemasok_id')->constrained('pemasok');
            $table->enum('jenis_proyek',['0','1'])->default('0');
            $table->enum('jenis_rab',['0','1'])->default('0');
            $table->dateTime('tanggal_mulai');
            $table->text('lokasi');
            $table->string('tahun_anggaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyek');
    }
};
