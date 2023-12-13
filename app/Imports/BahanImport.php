<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Bahan;

class BahanImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Bahan([
            'jenis_id' => (int)$row['jenis_id'], // Sesuaikan dengan indeks kolom nama di file Excel
            'kode' => $row['kode'], // Sesuaikan dengan indeks kolom satuan di file Excel
            'nama' => $row['nama'], // Sesuaikan dengan indeks kolom satuan di file Excel
            'harga' => $row['harga'], // Sesuaikan dengan indeks kolom satuan di file Excel
            // Tambahkan kolom sesuai dengan struktur tabel Anda
        ]);
    }
}
