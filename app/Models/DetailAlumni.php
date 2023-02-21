<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAlumni extends Model
{
    use HasFactory;

    protected $table = "detail_alumnis";
    protected $fillable = [
        'id_alumni',
        'nama_uni',
        'nama_usaha',
        'nama_perusahaan',
        'alamat',
        'nama_bidang',
    ];

    public function alumni(){
        return $this->belongsTo(Alumni::class,'id_alumni');
    }
}
