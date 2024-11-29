<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetilPekerjaan extends Model
{
    use HasFactory;
    protected $table = 'detil_pekerjaan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pekerjaan_id',
        'jenis_pekerjaan',
        'hsa_id',
        'hsp_id',
        'bahan_id',
        'koefisien'
    ];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class,'pekerjaan_id');
    }

    public function hsa()
    {
        return $this->belongsTo(HargaSatuanAlat::class,'hsa_id');
    }

    public function hsp()
    {
        return $this->belongsTo(HargaSatuanPekerja::class,'hsp_id');
    }

    public function bahan()
    {
        return $this->belongsTo(Bahan::class,'bahan_id');
    }
}
