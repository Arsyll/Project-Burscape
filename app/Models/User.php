<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasFactory, Notifiable, HasRoles, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_role() {
        return $this->hasOne(Role::class, 'id_user', 'id');
    }

    public function full_name(){
        if ($this->role == "Admin"){
            return $this->user_role->admin->nama_lengkap;
        }else if ($this->role == "Perusahaan"){
            return $this->user_role->perusahaan->nama;
        }else if ($this->role == "Alumni"){
            return $this->user_role->alumni->nama;
        }else{
            return 0;
        }
    }

    public function foto_profile(){
        if($this->role == "Admin"){
            return asset('storage/profile_admin/'.$this->user_role->admin->foto_profile);
        }else if($this->role == "Alumni"){
            return asset('storage/profile_alumni/'.$this->user_role->alumni->foto_profile);
        }
        else if($this->role == "Perusahaan"){
            return asset('storage/profile_perusahaan/'.$this->user_role->perusahaan->foto_perusahaan);
        }
    }

    public function notifikasi(){
        return  $this->hasMany(Notifikasi::class,'id_user','id');
    }

    public function countUnreadedNotification(){
        return $this->notifikasi()->where('dibaca','=',false)->count();
    }

    public function makeNotification(String $subject,String $message, Int $id_user, String $link){
        $dataPesan = [
            'subjek' => $subject,
            'pesan' => $message,
            'id_user' => $id_user,
            'link' => $link
        ];

        $notification = new Notifikasi();
        $notification->create(array_merge($dataPesan));
    }
}
