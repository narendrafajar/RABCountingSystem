<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;
    protected $table = 'bahan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_id',
        'kode',
        'nama',
        'harga'
    ];

    public function jenis() 
    {
        return $this->belongsTo(JenisBahan::class,'jenis_id');
    }
}
