<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    public $table = 'jurusan';
    protected $fillable = ['nama_jurusan'];

        // public function produk(){
        //     return $this->hasOne(Produk::class);
        // }

}
