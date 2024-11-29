<?php

namespace Database\Seeders;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\DetilPekerjaan;
use DB;
use App\Imports\DetilAnalisaImport;
use Illuminate\Database\Seeder;

class DetilAnalisaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $excelFile = storage_path('app/excel/detil_ahs.xlsx');
        $excelData = Excel::toCollection(new DetilAnalisaImport(), $excelFile)->first();
        foreach ($excelData as $row) {
            DetilPekerjaan::create([
            'pekerjaan_id' => $row[1], // Sesuaikan dengan indeks kolom satuan di file Excel
            'jenis_pekerjaan' => $row[2], // Sesuaikan dengan indeks kolom satuan di file Excel
            'hsa_id' =>$row[3], // Sesuaikan dengan indeks kolom satuan di file Excel
            'hsp_id' =>$row[4], // Sesuaikan dengan indeks kolom satuan di file Excel
            'bahan_id' =>$row[5], // Sesuaikan dengan indeks kolom satuan di file Excel
            'koefisien' =>$row[6], // Sesuaikan dengan indeks kolom satuan di file Excel
                // Tambahkan kolom sesuai dengan struktur tabel Anda
            ]);
        }
    }
}
