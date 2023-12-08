<?php

namespace Database\Seeders;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\Bahan;
use DB;
use App\Imports\BahanImport;
use Illuminate\Database\Seeder;

class BahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $excelFile = storage_path('app/excel/harga_satuan_dasar_bahan.xlsx');
        $excelData = Excel::toCollection(new BahanImport(), $excelFile)->first();
        foreach ($excelData as $row) {
            Bahan::create([
            'jenis_id' => (int)$row[1], // Sesuaikan dengan indeks kolom nama di file Excel
            'kode' => $row[2], // Sesuaikan dengan indeks kolom satuan di file Excel
            'nama' => $row[3], // Sesuaikan dengan indeks kolom satuan di file Excel
            'harga' =>$row[4], // Sesuaikan dengan indeks kolom satuan di file Excel
                // Tambahkan kolom sesuai dengan struktur tabel Anda
            ]);
        }
    }
}
