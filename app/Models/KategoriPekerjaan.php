<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPekerjaan extends Model
{
    public $table = 'kategori_pekerjaan';
    protected $fillable = ['nama_kategori'];
}
