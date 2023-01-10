<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class PerusahaanController extends Controller
{
    public function index(){
        $this->roleCheck('Admin');
        return view('perusahaan.index');
    }

    public function listPerusahaan(){
        $this->roleCheck('Admin');
        $perusahaan = Perusahaan::all();
        return response()->json([
            'massage' => 'List Jurusan',
            'data' => $perusahaan
        ]);    
    }

    public function create(){
        $this->roleCheck('Admin');
        return view('perusahaan.create');
    }

    public function store(Request $request){
        $this->roleCheck('Admin');
        $request->validate([
            'nama' => 'required',
            'bidang' => 'required',
            'email_perusahaan' => 'required|email|unique:users,email',
            'no_telp' => 'required|numeric|min:0',
            'alamat' => 'required',
            'tentang' => 'required',
            'password' => 'required|confirmed|min:8'
        ],[
            'nama.required' => 'Nama Perusahaan Harus Diisi',
            'bidang.required' => 'Bidang Harus Terpilih',
            'email_perusahaan.required' => 'Email Perusahaan Harus Diisi',
            'email_perusahaan.unique' => 'Email Sudah Terpakai.',
            'password.required' => 'Password Harus Diisi.',
            'password.confirmation' => 'Password Confirmation Tidak Sesuai.',
            'password.min' => 'Password Harus Memiliki 8 Karakter.',
            'no_telp.required' => 'No Telp Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'tentang.required' => 'Tentang Perusahaan Harus Diisi',
        ]);
        
        if($request->hasFile('foto_perusahaan')){
            $newname = $request->nama.' '.date("ymdhis").'.'.$request->file('foto_perusahaan')->getClientOriginalExtension();
            $request->file('foto_perusahaan')->storeAs('profile_perusahaan', $newname);
        }

        $data = [
            'nama' => $request->nama,
            'bidang' => $request->bidang,
            'email_perusahaan' => $request->email_perusahaan,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'tentang' => $request->tentang,
            'foto_perusahaan' => $newname ?? '',
            'url' => $request->url ?? ''
        ];
        

        $perusahaan = new Perusahaan();
        $createdPerusahaan = $perusahaan->create(array_merge($data));

        $dataUser = [
            'username' => $request->nama,
            'role' => 'Perusahaan',
            'email' => $request->email_perusahaan,
            'password' => Hash::make($request->password)
        ];

        $user = new User();

        $createdUser = $user->create(array_merge($dataUser));

        $role = new Role();
        
        $dataRole = [
            'id_user' => $createdUser->id,
            'id_perusahaan' => $createdPerusahaan->id
        ];

        $role->create(array_merge($dataRole));

        return back()->with('success','Perusahaan Telah Ditambah!');
    }

    public function show($id){
        $this->roleCheck('Admin');
        $perusahaan = Perusahaan::findOrFail($id);
        return view('perusahaan.show',compact('perusahaan'));
    }

    public function edit($id){
        $this->roleCheck('Admin');
        $perusahaan = Perusahaan::findOrFail($id);
        return view('perusahaan.edit',compact('perusahaan'));
    }

    public function update(Request $request,$id){
        $this->roleCheck('Admin');
        $perusahaan = Perusahaan::findOrFail($id);
        $request->validate([
            'nama' => 'required',
            'bidang' => 'required',
            'email_perusahaan' => 'required|email|unique:users,email,'.$perusahaan->role_perusahaan->user->id,
            'no_telp' => 'required|numeric|min:0',
            'alamat' => 'required',
            'tentang' => 'required',
            'password' => 'required|confirmed|min:8'
        ],[
            'nama.required' => 'Nama Perusahaan Harus Diisi',
            'bidang.required' => 'Bidang Harus Terpilih',
            'email_perusahaan.required' => 'Email Perusahaan Harus Diisi',
            'email_perusahaan.unique' => 'Email Sudah Terpakai.',
            'password.required' => 'Password Harus Diisi.',
            'password.confirmation' => 'Password Confirmation Tidak Sesuai.',
            'password.min' => 'Password Harus Memiliki 8 Karakter.',
            'no_telp.required' => 'No Telp Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'tentang.required' => 'Tentang Perusahaan Harus Diisi',
        ]);

        $path = storage_path('app/profile_perusahaan/'.$perusahaan->foto_perusahaan);

        if($request->hasFile('foto_perusahaan')){
            if (File::exists($path)) 
            {
                File::delete($path);
            }
            $newname = $request->nama.' '.date("ymdhis").'.'.$request->file('foto_perusahaan')->getClientOriginalExtension();
            $request->file('foto_perusahaan')->storeAs('profile_perusahaan', $newname);
        }
        
        $data = [
            'nama' => $request->nama,
            'bidang' => $request->bidang,
            'email_perusahaan' => $request->email_perusahaan,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'tentang' => $request->tentang,
            'foto_perusahaan' => $newname ?? $perusahaan->foto_perusahaan,
            'url' => $request->url ?? ''
        ];

        $perusahaan->update(array_merge($data));
        $perusahaan->refresh();

        $dataUser = [
            'username' => $request->nama,
            'role' => 'Perusahaan',
            'email' => $request->email_perusahaan,
            'password' => Hash::make($request->password)
        ];

        $user = User::findOrFail($perusahaan->role_perusahaan->user->id);

        $user->update(array_merge($dataUser));
        $user->refresh();

        return back()->with('success','Perusahaan Telah Diedit!');
    }

    public function perusahaanList(Request $request){
        $assets = ['chart', 'animation'];
        if(!empty($request->search)){
            $perusahaan = Perusahaan::with('lowongan')->where('nama','like','%'.$request->search.'%')->paginate(8);
        }else{
            $perusahaan = Perusahaan::with('lowongan')->paginate(8);
        }
        return view('perusahaan.list-perusahaan',compact('perusahaan','assets'));
    }
    public function detailPerusahaan($id){
        $perusahaan = Perusahaan::with('lowongan')->findOrFail($id);
        return view('perusahaan.profile-perusahaan', compact('perusahaan'));
    }

    public function destroy($id){
        $this->roleCheck('Admin');
        $perusahaan = Perusahaan::findOrFail($id);
        $path = storage_path('app/profile_perusahaan/'.$perusahaan->foto_perusahaan);
        if (File::exists($path)) 
        {
            File::delete($path);
        }
        $user = User::findOrFail($perusahaan->role_perusahaan->user->id);
        $user->delete();
        $perusahaan->delete();
        return response()->json([
            'message' => 'Lowongan Kerja berhasil dihapus!'
        ]);
    }
}
