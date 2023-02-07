<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    public function index()
    {
        $this->roleCheck('Admin');
        return view('feedback.index');
    }

    public function listFeedBack()
    {
        $this->roleCheck('Admin');
        $Feedback = FeedBack::all();
        return response()->json([
            'massage' => 'List Jurusan',
            'data' => $Feedback
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:feed_backs,email',
            'subjek' => 'required|max:100',
            'pesan' => 'required|max:255',
        ],
        [
            'nama.required' => "Feedback Tidak Tersimpan!",        
            'email.required' => "Feedback Tidak Tersimpan!",        
            'email.email' => "Feedback Tidak Tersimpan!",        
            'email.unique' => "Feedback Tidak dapat Tersimpan!",        
            'subjek.required' => "Feedback Tidak Tersimpan!",        
            'subjek.max' => "Feedback Tidak Tersimpan! Subjek Terlalu Panjang",        
            'pesan.required' => "Feedback Tidak Tersimpan!",        
            'pesan.max' => "Feedback Tidak Tersimpan!, Pesan Terlalu Panjang",        
        ]);

        FeedBack::create($data);
        

        return back()->with('success','Feedback Telah Terkirim!');
    }

    public function show($id)
    {
        $this->roleCheck("Admin");
        return response()->json([
            'message' => 'detail jurusan!',
            'data' => FeedBack::findOrFail($id)
        ]);
    }
    
    public function destroy($id)
    {
        $this->roleCheck("Admin");
        Feedback::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Feedback berhasil dihapus!'
        ]);
    }
}
