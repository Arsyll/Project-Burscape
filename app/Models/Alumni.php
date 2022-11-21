<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = "alumni";

    protected $fillable = [
        'nama',
        'no_telp',
        'alamat',
        'status',
        'tanggal_lahir',
        'foto_profile',
        'id_jurusan',
        'tentang',
        'angkatan',
        'resume',
    ];

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function pengalaman(){
        return $this->hasMany(PengalamanKerja::class,'id_alumni','id');
    }

    public function edukasi(){
        return $this->hasMany(Edukasi::class,'id_alumni','id');
    }
}
