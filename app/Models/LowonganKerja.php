<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganKerja extends Model
{
    use HasFactory;

    protected $table = 'lowongan_kerja';

    protected $fillable = [
        'id_perusahaan',
        'nama_lowongan',
        'bidang',
        'status',
        'deskripsi_lowongan',
        'salary',
        'alamat',
        'syarat',
    ];

    public function detailLoker(){
        return $this->hasMany(DetailLoker::class,'id_loker','id');
    }

    public function perusahaan(){
        return $this->belongsTo(Perusahaan::class,'id_perusahaan');
    }

    public function bidangs(){
        return $this->belongsTo(Jurusan::class,'bidang');
    }
}
