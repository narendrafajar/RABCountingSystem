<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBahan extends Model
{
    use HasFactory;
    protected $table = 'jenis_bahan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'nama',
        'satuan'
    ];
}
