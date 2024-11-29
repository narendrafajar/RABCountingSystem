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
        Schema::create('detil_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pekerjaan_id')->constrained('pekerjaan_analisa');
            $table->enum('jenis_pekerjaan',['0','1','2'])->default('0');
            $table->foreignId('hsa_id')->nullable()->constrained('harga_satuan_alat');
            $table->foreignId('hsp_id')->nullable()->constrained('harga_satuan_pekerja');
            $table->foreignId('bahan_id')->nullable()->constrained('bahan');
            $table->decimal('koefisien',19,3)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detil_pekerjaan');
    }
};
