<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edukasi extends Model
{
    use HasFactory;

    protected $table = 'edukasi';

    protected $fillable = [
        'id_alumni',
        'nama_lembaga',
        'bidang',
        'tahun',
    ];

    public function alumni(){
        return $this->belongsTo(Alumni::class,'id_alumni');
    }
}
