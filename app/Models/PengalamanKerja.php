<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanKerja extends Model
{
    use HasFactory;

    protected $table = "pengalaman_kerja";

    protected $fillable = [
        'id_alumni',
        'judul',
        'perusahaan',
        'tahun',
    ];

    public function dariTahun(){
        $tahun = explode('-',$this->tahun);
        return $tahun[0];
    }

    public function keTahun(){
        $tahun = explode('-',$this->tahun);
        return $tahun[1];
    }

    public function alumni(){
        return $this->belongsTo(Alumni::class,'id_alumni');
    }
}
