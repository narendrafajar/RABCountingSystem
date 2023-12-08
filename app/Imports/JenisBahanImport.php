<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\JenisBahan;

class JenisBahanImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new JenisBahan([
            'nama' => $row[1], // Sesuaikan dengan indeks kolom nama di file Excel
            'satuan' => $row[2], // Sesuaikan dengan indeks kolom satuan di file Excel
            // Tambahkan kolom sesuai dengan struktur tabel Anda
        ]);
    }
}
