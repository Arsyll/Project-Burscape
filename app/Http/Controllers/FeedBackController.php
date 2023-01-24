<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
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
            'subjek' => 'required',
            'pesan' => 'required',
        ],
        [
            'nama.required' => "Feedback Tidak Tersimpan!",        
            'email.required' => "Feedback Tidak Tersimpan!",        
            'email.email' => "Feedback Tidak Tersimpan!",        
            'email.unique' => "Feedback Tidak dapat Tersimpan!",        
            'subjek.required' => "Feedback Tidak Tersimpan!",        
            'pesan.required' => "Feedback Tidak Tersimpan!",        
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
