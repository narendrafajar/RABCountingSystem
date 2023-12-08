<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;
    protected $table = 'proyek';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'nama',
        'pemasok_id',
        'tanggal_mulai',
        'lokasi',
        'tahun_anggaran'
    ];
}
