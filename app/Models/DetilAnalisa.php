<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetilAnalisa extends Model
{
    use HasFactory;
    protected $table = 'bahan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_ahs',
        'ahs_id',
        'hsp_id',
        'hsa_id',
        'bahan_id',
        'koefisien'
    ];

    public function ahs() 
    {
        return $this->hasMany(AnalisaHargaSatuan::class,'ahs_id','id');
    }

    /**
     * Retrieve the associated HargaSatuanPekerja model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hsp() 
    {
        return $this->belongsTo(HargaSatuanPekerja::class,'hsp_id');
    }

    public function hsa() 
    {
        return $this->belongsTo(HargaSatuanAlat::class,'hsa_id');
    }

    public function bahan() 
    {
        return $this->belongsTo(Bahan::class,'bahan_id');
    }
}
