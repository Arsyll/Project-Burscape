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
        'email_perusahaan',
        'foto_perusahaan',
        'url'
    ];

    public function role_perusahaan() {
        return $this->hasOne(Role::class, 'id_perusahaan', 'id');
    }

    public function profile_image(){
        return asset('storage/perusahaan_images/'.$this->foto_perusahaan);
    }

}
