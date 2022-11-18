<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLoker extends Model
{
    use HasFactory;

    protected $table = 'detail_lokers';

    protected $fillable = [
        'id_loker',
        'id_kategori'
    ];

    public function lowonganKerja(){
        return $this->belongsTo(LowonganKerja::class,'id_loker');
    }

    public function kategori(){
        return $this->belongsTo(KategoriPekerjaan::class,'id_kategori');
    }
}
