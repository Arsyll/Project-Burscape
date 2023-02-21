<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Jurusan;
use App\Models\Role;
use App\Models\User;
use App\Imports\AlumniImport;
use App\Models\DetailAlumni;
use App\Models\Edukasi;
use App\Models\PengalamanKerja;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->roleCheck("Admin");
        $jurusans = Jurusan::all();
        return view("alumni.index",compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->roleCheck("Admin");
        $input = $request->validate([
            'nama' => 'required|unique:users,username',
            'no_telp' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'status' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'id_jurusan' => 'required',
            'foto_profile' => 'file|mimes:png,jpg|nullable|max:2048',
        ],[
            'nama.required' => 'Nama Perlu diisi.',
            'nama.unique' => 'Nama Harus Unik.',
            'no_telp.required' => 'No Telp Perlu diisi.',
            'tanggal_lahir.required' => 'Tanggal Lahir Perlu diisi.',
            'alamat.required' => 'Alamat Perlu diisi.',
            'status.required' => 'Status Perlu diisi.',
            'email.required' => 'Email Perlu diisi.',
            'email.unique' => 'Email Sudah Digunakan.',
            'password.required' => 'Password Perlu diisi.',
            'password.confirmed' => 'Confirm Password tidak sesuai.',
            'password.min' => 'Password Minimal Memiliki 8 Karakter.',
            'id_jurusan.required' => 'Nama Perlu diisi.',
            'foto_profile.mime' => 'Foto Profile Harus Berjenis png,jpg.',
            'foto_profile.max' => 'Ukuran Maks Foto Profile Adalah 2MB.',
        ]);

        if (isset($request->foto_profile) && $request->foto_profile != null) {

            $newname = $request->nama.' '.date("ymdhis").'.'.$request->file('foto_profile')->getClientOriginalExtension();
            $request->file('foto_profile')->storeAs('profile_alumni', $newname);
        }
        $foto_profile = ['foto_profile' => $newname ?? ''];

        $alumni = new Alumni();
        $status = $alumni->create(array_merge($input,$foto_profile));

        $dataUser = [
            'username' => $request->nama,
            'role' => 'Alumni',
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $user = new User();

        $createdUser = $user->create(array_merge($dataUser));

        $createdUser->makeNotification('Ayo Lengkapi Profilmu!','Lengkapi Profilmu agar kamu bisa mulai melamar ke lowongan yang kamu pilih', $createdUser->id, 'http://127.0.0.1:8000/users/'.$createdUser->id.'/edit');
        

        $role = new Role();

        $dataRole = [
            'id_user' => $createdUser->id,
            'id_alumni' => $status->id
        ];

        $role->create(array_merge($dataRole));

        return response()->json([
            'code' => 200,
            'message' => 'Alumni berhasil ditambah!',
            'data' => $status
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->roleCheck("Admin");
        $alumni = Alumni::findOrFail($id);
        $detailStatus = DetailAlumni::with('alumni')->where('id_alumni','=',$id)->first();
        $pengalaman = PengalamanKerja::with('alumni')->where('id_alumni','=',$alumni->id)->get();
        $edukasi = Edukasi::with('alumni')->where('id_alumni','=',$alumni->id)->get();
        return view('alumni.show',compact('alumni','detailStatus','pengalaman','edukasi'));
    }

    public function dataalumni($id){
        $this->roleCheck("Admin");
        return response()->json([
            'message' => 'detail jurusan!',
            'data' => Alumni::with('role_alumni.user')->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->roleCheck("Admin");
        // $rule = [
        //     'nama_jurusan' => 'required',
        //     'no_telp' => 'required|numeric',
        //     'tanggal_lahir' => 'required|date',
        //     'alamat' => 'required',
        //     'status' => 'required',
        //     'jurusan' => 'required',
        // ];
        // $this->validate($request, $rule);
        $alumni = Alumni::find($id);
        $user = User::findOrFail($alumni->role_alumni->user->id);


        $input = $request->validate([
            'nama' => 'required|unique:users,username,'.$user->id,
            'no_telp' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'status' => 'required',
            'email' => 'nullable|email|unique:users,email,'.$user->id,
            'password' => 'nullable|confirmed|min:8',
            'id_jurusan' => 'required',
            'foto_profile' => 'file|mimes:png,jpg|nullable|max:2048',
        ],[
            'nama.required' => 'Nama Perlu diisi.',
            'nama.unique' => 'Nama Harus Unik.',
            'no_telp.required' => 'No Telp Perlu diisi.',
            'tanggal_lahir.required' => 'Tanggal Lahir Perlu diisi.',
            'alamat.required' => 'Alamat Perlu diisi.',
            'status.required' => 'Status Perlu diisi.',
            'email.unique' => 'Email Sudah Digunakan.',
            'password.confirmed' => 'Confirm Password tidak sesuai.',
            'password.min' => 'Password Minimal Memiliki 8 Karakter.',
            'id_jurusan.required' => 'Nama Perlu diisi.',
            'foto_profile.mime' => 'Foto Profile Harus Berjenis png,jpg.',
            'foto_profile.max' => 'Ukuran Maks Foto Profile Adalah 2MB.',

        ]);
        $image = storage_path('app/profile_alumni/'.$alumni->foto_profile);

        if (isset($request->foto_profile) && $request->foto_profile != null) {
            if (File::exists($image))
            {
                File::delete($image);
            }
            $newname = $request->nama.' '.date("ymdhis").'.'.$request->file('foto_profile')->getClientOriginalExtension();
            $request->file('foto_profile')->storeAs('profile_alumni', $newname);
        }
        $foto_profile = ['foto_profile' => $newname ?? $alumni->foto_profile];
        $status = $alumni->update(array_merge($input,$foto_profile));
        $dataUser = [
            'username' => $request->nama,
            'role' => 'Alumni',
            'email' => $request->email ?? $user->email,
            'password' => empty($request->password) ? $user->password : Hash::make($request->password)
        ];


        $user->update(array_merge($dataUser));

        return response()->json([
            'code' => 200,
            'message' => 'Alumni berhasil diubah!',
            'data' => $status
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->roleCheck("Admin");
        $alumni = Alumni::with('role_alumni')->where('id','=',$id)->first();
        $path = storage_path('app/profile_alumni/'.$alumni->foto_profile);
        if (File::exists($path))
        {
            File::delete($path);
        }
        // dd($alumni->role_alumni);
        User::findOrFail($alumni->role_alumni->user->id);
        $alumni->delete();
        return response()->json([
            'message' => 'Alumni berhasil dihapus!'
        ]);
    }

    public function listAlumni(){
        $this->roleCheck("Admin");
        $alumni = Alumni::with('jurusan')->get();
        return response()->json([
            'massage' => 'List Jurusan',
            'data' => $alumni
        ]);
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_alumni' => 'required|file|mimes:xlsx,xls'
        ],[
            'import_alumni.required' => 'File Alumni Wajib Di Isi.',
            'import_alumni.mimes' => 'File Alumni Wajib Bertipe xlsx atau xls.',
        ]);
        // dd($request->file('import_alumni'));
        Excel::import(new AlumniImport, $request->file('import_alumni'));

        return response()->json([
            'code' => 200,
            'message' => 'Alumni berhasil ditambah!',
        ]);
    }


    public function downloadTemplate()
    {
        $file = storage_path('template/Template Alumni.xlsx');
        return response()->download($file);
    }
}
