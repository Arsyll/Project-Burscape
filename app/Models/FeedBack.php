<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    use HasFactory;

    protected $table = "feed_backs";

    protected $fillable = [
        'nama',
        'email',
        'subjek',
        'pesan',
    ];

    public function getCreatedAt(){
        return Carbon::parse($this->created_at)->format('d-M-h, g:ia');
    }
}
