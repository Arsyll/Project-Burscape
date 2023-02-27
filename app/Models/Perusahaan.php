<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = "perusahaan";

    protected $fillable = [
        'nama',
        'no_telp',
        'bidang',
        'alamat',
        'tentang',
        'nama_pic',
        'kontak_pic',
        'email_perusahaan',
        'foto_perusahaan',
        'url'
    ];

    public function role_perusahaan() {
        return $this->hasOne(Role::class, 'id_perusahaan', 'id');
    }

    public function lowongan(){
        return $this->hasMany(LowonganKerja::class,'id_perusahaan','id');
    }

    public function profile_image(){
        return empty($this->foto_perusahaan) ? asset("images/icons/delesign-construction.svg") : asset('storage/profile_perusahaan/'.$this->foto_perusahaan);
    }

}
