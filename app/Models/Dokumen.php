<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = "dokumen";

    protected $fillable = [
        'name_doc',
        'no_doc',
        'type_doc',
        'file_doc',
        'id_loker',
        'id_perusahaan'
    ];
}
