<?php

namespace Database\Seeders;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\Pekerjaan;
use DB;
use App\Imports\AnalisaHargaSatuanImport;
use Illuminate\Database\Seeder;

class AnalisaHargaSatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $excelFile = storage_path('app/excel/ahs.xlsx');
        $excelData = Excel::toCollection(new AnalisaHargaSatuanImport(), $excelFile)->first();
        foreach ($excelData as $row) {
            Pekerjaan::create([
            'kode' => $row[1], // Sesuaikan dengan indeks kolom satuan di file Excel
            'jenis' => $row[2], // Sesuaikan dengan indeks kolom satuan di file Excel
            'nama_pekerjaan' => $row[3], // Sesuaikan dengan indeks kolom satuan di file Excel
            'satuan' =>$row[4], // Sesuaikan dengan indeks kolom satuan di file Excel
                // Tambahkan kolom sesuai dengan struktur tabel Anda
            ]);
        }
    }
}
