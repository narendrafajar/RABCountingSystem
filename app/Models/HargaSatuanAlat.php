<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaSatuanAlat extends Model
{
    use HasFactory;
    protected $table = 'harga_satuan_alat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'nama',
        'satuan',
        'harga',
    ];
}
