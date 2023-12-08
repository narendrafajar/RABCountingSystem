<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisaHargaSatuan extends Model
{
    use HasFactory;
    protected $table = 'analisa_harga_satuan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'nama_pekerjaan'
    ];
}
