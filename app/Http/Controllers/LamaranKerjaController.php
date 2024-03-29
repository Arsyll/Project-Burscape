<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Edukasi;
use App\Models\LamaranKerja;
use App\Models\LowonganKerja;
use App\Models\Notifikasi;
use App\Models\PengalamanKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LamaranKerjaController extends Controller
{
    public function roleCheck2(){
        if(Auth::user()->user_role->perusahaan || Auth::user()->user_role->admin){
            return true;
        }else{
            return abort(404);
        }
    }

    public function listLamaran(Request $request){
        $id = $request->id;
        if(!empty($id)){
            if(!empty(Auth::user()->user_role->perusahaan->id)){
                $lamaran = $lamaran = LamaranKerja::whereHas('lowongan',function($query){
                    $query->where('id_perusahaan','=',Auth::user()->user_role->perusahaan->id);
                    })->where('id_lowongan','=',$id)
                    ->with('lowongan','alumni')->get();
            }else{
                $id_perusahaan = LowonganKerja::findOrFail($id)->id; 
                $lamaran = $lamaran = LamaranKerja::whereHas('lowongan',function($query) use($id_perusahaan){
                    $query->where('id_perusahaan','=',$id_perusahaan);
                    })->where('id_lowongan','=',$id)
                    ->with('lowongan','alumni')->get();
            }
        }else{
            $this->roleCheck('Perusahaan');
            $lamaran = $lamaran = LamaranKerja::whereHas('lowongan',function($query){
                $query->where('id_perusahaan','=',Auth::user()->user_role->perusahaan->id);
                })->with('lowongan','alumni')->get();
        }
        return response()->json([
            'massage' => 'List Lamaran',
            'data' => $lamaran
        ]);  
    }

    public function index(Request $request){
        if($this->roleCheck2()){
            $id = $request->id ?? '';
            return view('lamaran_kerja.index',compact('id'));
        }
    }

    public function show($id){
        if($this->roleCheck2()){
            $lamaran = LamaranKerja::with('alumni')->findOrFail($id);
            $idAlumni = $lamaran->alumni->id;
            $pengalaman = PengalamanKerja::with('alumni')->where('id_alumni','=',$idAlumni)->get();
            $edukasi = Edukasi::with('alumni')->where('id_alumni','=',$idAlumni)->get();
            return view('lamaran_kerja.show',compact('lamaran','pengalaman','edukasi'));
        }
    }

    public function store(Request $request){
        if(empty(auth()->user()->user_role->alumni->lamaran)){
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

        $namaLowongan = LowonganKerja::find($request->id_lowongan)->nama_lowongan;

        $lamaran = new LamaranKerja();
        $lamaran->create(array_merge($dataLamaran));

        Auth::user()->makeNotification('Selamat! Lamaran Anda Sudah Terkirim!','Lamaran yang anda kirim sedang dicek oleh pihak perusahaan. Info lamaran lebih lanjut akan dikirim jika pihak perusahaan sudah memproses lamaran anda.', Auth::user()->id,route('detail.lowongan',$request->id_lowongan));

        return back()->with('success','Kamu Telah Mendaftar Lowongan');
    }

    public function update(Request $request,$id){
        $status = $request->status;
        $lamaran = LamaranKerja::findOrFail($id);
        switch($status){
            case 'Ditolak':
                Auth::user()->makeNotification(
                    'Maaf anda ditolak',
                    'Maaf anda ditolak di lowongan ' . $lamaran->lowongan->nama_lowongan,
                    $lamaran->alumni->role_alumni->user->id,
                    route('detail.lowongan',$lamaran->id_lowongan)
                );
                break;
            case 'Diterima':
                Auth::user()->makeNotification(
                    'Selamat anda diterima',
                    'Selamat anda diterima di lowongan ' . $lamaran->lowongan->nama_lowongan,
                    $lamaran->alumni->role_alumni->user->id,
                    route('detail.lowongan',$lamaran->id_lowongan)
                );
                break;
            case 'Pending':
                Auth::user()->makeNotification(
                    'Lamaran anda sedang dicek ulang',
                    'Lamaran anda di lowongan ' . $lamaran->lowongan->nama_lowongan . ' sedang dicek ulang.',
                    $lamaran->alumni->role_alumni->user->id,
                    route('detail.lowongan',$lamaran->id_lowongan)
                );
                break;
        } 
        $lamaran->update(['status' => $status]);
        return back()->with('success','');
    }

    public function destroy($id){
        LamaranKerja::findOrFail($id)->delete();
        return back()->with('success','');
    }
}
