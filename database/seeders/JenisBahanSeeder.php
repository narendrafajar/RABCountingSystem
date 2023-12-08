<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\JenisBahan;
use DB;
use App\Imports\JenisBahanImport;


class JenisBahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $excelFile = storage_path('app/excel/jenis_bahan_satuan.xlsx');
        $excelData = Excel::toCollection(new JenisBahanImport(), $excelFile)->first();
        foreach ($excelData as $row) {
            JenisBahan::create([
                'nama' => $row[1],
                'satuan' => $row[2],
                // Tambahkan kolom sesuai dengan struktur tabel Anda
            ]);
        }
    }
}
