<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = "admin";

    protected $fillable = [
        'nama_lengkap',
        'jabatan',
        'foto_profile',
    ];

    public function admin_role() {
        return $this->hasOne(Role::class, 'id_admin', 'id');
    }
}
