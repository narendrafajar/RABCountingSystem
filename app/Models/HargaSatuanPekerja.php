<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaSatuanPekerja extends Model
{
    use HasFactory;
    protected $table = 'harga_satuan_pekerja';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'nama',
        'satuan',
        'harga',
    ];
}
