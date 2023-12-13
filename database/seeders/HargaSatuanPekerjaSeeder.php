<?php

namespace Database\Seeders;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\HargaSatuanPekerja;
use DB;
use App\Imports\HargaSatuanPekerjaImport;
use Illuminate\Database\Seeder;

class HargaSatuanPekerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $excelFile = storage_path('app/excel/harga_satuan_pekerja.xlsx');
        $excelData = Excel::toCollection(new HargaSatuanPekerjaImport(), $excelFile)->first();
        foreach ($excelData as $row) {
            HargaSatuanPekerja::create([
            'kode' => $row[1], // Sesuaikan dengan indeks kolom satuan di file Excel
            'nama' => $row[2], // Sesuaikan dengan indeks kolom satuan di file Excel
            'satuan' =>$row[3], // Sesuaikan dengan indeks kolom satuan di file Excel
            'harga' =>$row[4], // Sesuaikan dengan indeks kolom satuan di file Excel
                // Tambahkan kolom sesuai dengan struktur tabel Anda
            ]);
        }
    }
}
