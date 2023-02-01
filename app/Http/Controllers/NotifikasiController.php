<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{

    public function index(){
        $notifikasi = Notifikasi::where('id_user','=',Auth::user()->id)->orderBy('created_at','desc')->get();

        return view('notifikasi',compact('notifikasi'));
    }

    public function notificationReaded(){
        $user = Auth::user();

        $notifikasi = $user->notifikasi->where('dibaca','=',false);
        
        foreach($notifikasi as $note){
            $note->update(['dibaca' => true]);
        }

        return response()->json([
            'message' => 'Notifikasi telah dibaca!'
        ]);
    }
}
