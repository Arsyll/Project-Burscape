<?php

namespace App\Models;

use Carbon\Carbon;
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
        'tipe_pekerjaan',
    ];

    public function createdAt(){
        $createdAt = Carbon::parse($this->created_at);
        $diff = $createdAt->diff(now());
        if($diff->i == 0){
            return 'Sesaat Yang Lalu';
        }
        else if($diff->h == 0){
            return $diff->i . ' Menit Yang Lalu';
        }else if($diff->d == 0){
            return $diff->h . ' Jam Yang Lalu';
        }else{
            return $diff->d . ' Hari Yang Lalu';
        }
    }

    public function updatedAt(){
        $updatedAt = Carbon::parse($this->updated_at);
        $diff = $updatedAt->diff(now());
        if($diff->i == 0){
            return 'Sesaat Yang Lalu';
        }
        else if($diff->h == 0){
            return $diff->i . ' Menit Yang Lalu';
        }else if($diff->d == 0){
            return $diff->h . ' Jam Yang Lalu';
        }else{
            return $diff->d . ' Hari Yang Lalu';
        }
    }

    public function detailLoker(){
        return $this->hasMany(DetailLoker::class,'id_loker','id');
    }

    public function perusahaan(){
        return $this->belongsTo(Perusahaan::class,'id_perusahaan');
    }

    public function bidangs(){
        return $this->belongsTo(Jurusan::class,'bidang');
    }

    public function lamaran(){
        return $this->hasMany(LamaranKerja::class,'id_lowongan');
    }
}
