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

    public function checkLamaran($idLoker){
        $lamaran = LamaranKerja::with('lowongan')->where('id_lowongan','=',$idLoker)->where('id_alumni','=',$this->id)->first();
        return $lamaran;
    }

    public function checkTerimaLamaran(){
        $lamarans = $this->lamaran;
        foreach($lamarans as $lamaran){
            if($lamaran->status == "Diterima"){
                return false;
            }
        }
        return true;
    }

    public function checkPendingLamaran(){
        $lamarans = $this->lamaran;
        foreach($lamarans as $lamaran){
            if($lamaran->status == "Pending"){
                return $lamaran;
            }
        }
    }

    public function role_alumni(){
        return $this->hasOne(Role::class,'id_alumni','id');
    }

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function pengalaman(){
        return $this->hasMany(PengalamanKerja::class,'id_alumni','id');
    }
    
    public function lamaran(){
        return $this->hasMany(LamaranKerja::class,'id_alumni','id');
    }
    
    public function edukasi(){
        return $this->hasMany(Edukasi::class,'id_alumni','id');
    }

    public function profile_image(){
        return asset('storage/profile_alumni/'.$this->foto_profile);
    }

}
