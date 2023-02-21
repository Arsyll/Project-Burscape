<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi' ;
    protected $fillable = [
        'subjek',
        'pesan',
        'id_user',
        'dibaca',
        'link'
    ];

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function createdAt(){
        $createdAt = Carbon::parse($this->created_at);
        $diff = $createdAt->diff(now());
        if($diff->i == 0){
            return 'Sesaat Yang Lalu';
        }
        else if($diff->h == 0){
            return $diff->i . ' Menit Yang Lalu';
        }else if($diff->d == 0){
            return $diff->h . ' Jam Yang Lalu';
        }else{
            return $diff->d . ' Hari Yang Lalu';
        }
    }
}
