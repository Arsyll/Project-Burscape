<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\LamaranKerja;
use Illuminate\Http\Request;

class LamaranKerjaController extends Controller
{
    public function store(Request $request){
        if(!empty(auth()->user()->user_role->alumni->lamaran)){
            return back();
        }
        if(empty(auth()->user()->user_role->alumni->resume)){
            $request->validate([
                'id_lowongan' => 'required',
                'email' => 'required|email|max:100',
                'no_telp' => 'required|min:10|max:13',
                'resume' => 'file|mimes:docx,pdf|max:4096|required',
            ],[
                'email.required' => 'Email Harus Terisi.',
                'no_telp.required' => 'No Telp Harus Terisi.',
                'resume.required' => 'Resume Harus Terisi.',
            ]);
        }else{
            $request->validate([
                'id_lowongan' => 'required',
                'email' => 'required|email|max:100',
                'no_telp' => 'required|min:10|max:13',
            ],[
                'email.required' => 'Email Harus Terisi.',
                'no_telp.required' => 'No Telp Harus Terisi.',
            ]);
        }

        if($request->hasFile('resume')){
            $resume = auth()->user()->user_role->alumni->nama.' '.date("ymdhis").'.'.$request->file('resume')->getClientOriginalExtension();
            $request->file('resume')->storeAs('resume_alumni', $resume);
            $alumni = Alumni::findOrFail(auth()->user()->user_role->alumni->id);
            $alumni->update([
                'resume' => $resume
            ]);
        }

        $dataLamaran = [
            'id_alumni' => auth()->user()->user_role->alumni->id,
            'id_lowongan' => $request->id_lowongan,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'status' => 'Pending',
        ];

        $lamaran = new LamaranKerja();
        $lamaran->create(array_merge($dataLamaran));

        return back()->with('success','Kamu Telah Mendaftar Lowongan');
    }

    public function destroy($id){
        $lamaran = LamaranKerja::findOrFail($id)->delete();
        return back()->with('success','');
    }
}
