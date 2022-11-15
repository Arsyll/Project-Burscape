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
        'angkatan',
    ];

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
}
