<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $table = 'pekerjaan_analisa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'jenis',
        'nama_pekerjaan',
        'satuan',
        'status'
    ];

    public function detil()
    {
        return $this->hasMany(DetilPekerjaan::class,'pekerjaan_id','id');
    }
}
