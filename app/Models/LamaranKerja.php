<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LamaranKerja extends Model
{
    use HasFactory;

    protected $table = "lamaran_kerja";

    protected $fillable = [
        'id_alumni',
        'id_lowongan',
        'email',
        'no_telp',
        'status',
    ];

    public function alumni(){
        return $this->belongsTo(Alumni::class,'id_alumni');
    }

    public function lowongan(){
        return $this->belongsTo(LowonganKerja::class,'id_lowongan');
    }
}
