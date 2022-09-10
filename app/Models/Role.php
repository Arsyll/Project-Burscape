<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = "role";

    protected $fillable = [
        'id_user',
        'id_admin',
        'id_id_alumni',
        'id_alumni',
    ];

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function admin(){
        return $this->belongsTo(Admin::class,'id_admin');
    }

    public function perusahaan(){
        return $this->belongsTo(Perusahaan::class,'id_perusahaan');
    }

    public function alumni(){
        return $this->belongsTo(Alumni::class,'id_alumni');
    }
    
}
