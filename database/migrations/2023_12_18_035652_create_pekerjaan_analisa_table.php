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
        Schema::create('pekerjaan_analisa', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->enum('jenis',['0','1'])->default(1);
            $table->string('nama_pekerjaan');
            $table->string('satuan');
            $table->enum('status',['0','1'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan_analisa');
    }
};
