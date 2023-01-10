<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
use App\Models\Admin;
use App\Models\Alumni;
use App\Models\Edukasi;
use App\Models\Jurusan;
use App\Models\PengalamanKerja;
use App\Models\Perusahaan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title',['form' => trans('users.title')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('users.create').'" class="btn btn-sm btn-primary" role="button">Add User</a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets', 'headerAction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('status',1)->get()->pluck('title', 'id');

        return view('users.form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request['password'] = bcrypt($request->password);

        $request['username'] = $request->username ?? stristr($request->email, "@", true) . rand(100,1000);

        $user = User::create($request->all());

        storeMediaFile($user,$request->profile_image, 'profile_image');

        $user->assignRole('user');

        // Save user Profile data...
        $user->userProfile()->create($request->userProfile);

        return redirect()->route('users.index')->withSuccess(__('message.msg_added',['name' => __('users.store')]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->id == $id){
            $data = User::findOrFail($id);
            if($data->role == "Admin"){
                return view('users.profile-admin', compact('data'));
            }else if($data->role == "Perusahaan"){
                return view('users.profile-perusahaan', compact('data'));
            }else if($data->role == "Alumni"){
                $pengalaman = PengalamanKerja::with('alumni')->where('id_alumni','=',$data->user_role->alumni->id)->get();
                $edukasi = Edukasi::with('alumni')->where('id_alumni','=',$data->user_role->alumni->id)->get();
                return view('users.profile', compact('data','pengalaman','edukasi'));
            }
        }else{
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->id == $id){
            $data = User::with('user_role')->findOrFail($id);
            if($data->role == "Admin"){
                $layout = '';
                return view('users.form', compact('data','id','layout'));
            }else if($data->role == "Alumni"){
                $layout = 'horizontal';
                $jurusan = Jurusan::all();
                $pengalaman = PengalamanKerja::with('alumni')->where('id_alumni','=',$data->user_role->alumni->id)->get();
                $edukasi = Edukasi::with('alumni')->where('id_alumni','=',$data->user_role->alumni->id)->get();
                return view('users.form', compact('data','id','layout','jurusan','pengalaman','edukasi'));
            }else{
                $layout = '';
                return view('users.form', compact('data','id','layout'));
            }
        }else{
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::with('user_role.admin')->findOrFail($id);

        if($user->role == "Admin")
       { $admin = Admin::find($user->user_role->admin->id);

        $request['password'] = $request->password != '' ? bcrypt($request->password) : $user->password;

        // User user data...
        $userData = [
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password
        ];
        $user->fill($userData)->update();

        // Save user image...
        $path = storage_path('app/profile_admin/'.$admin->foto_profile);
        if (isset($request->foto_profile) && $request->foto_profile != null) {
            if (File::exists($path)) 
            {
                File::delete($path);
            }
            $newname = $request->username.' '.date("ymdhis").'.'.$request->file('foto_profile')->getClientOriginalExtension();
            $request->file('foto_profile')->storeAs('profile_admin', $newname);
        }

        // user profile data....
        $adminData = [
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'foto_profile' => !empty($newname) ? $newname : $admin->foto_profile,
        ];
        $admin->fill($adminData)->update();

        // if(auth()->check()){
        //     return redirect()->route('users.index')->withSuccess(__('message.msg_updated',['name' => __('message.user')]));
        // }
        return redirect()->back()->withSuccess(__('Profile Telah Diubah',['name' => 'My Profile']));
    }else if($user->role == "Perusahaan"){
        $perusahaan = Perusahaan::with('lowongan')->findOrFail($user->user_role->perusahaan->id);

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
            'password' => empty($request->password) ? $user->password : Hash::make($request->password)
        ];

        $user = User::findOrFail($perusahaan->role_perusahaan->user->id);

        $user->update(array_merge($dataUser));
        $user->refresh();

        return back()->with('success','Profile Telah Diedit!');

    }


        else if($user->role == "Alumni"){
            $alumni = Alumni::with('pengalaman')->findOrFail($user->user_role->alumni->id);

            $image = storage_path('app/profile_alumni/'.$alumni->foto_profile);
            $resume = storage_path('app/resume_alumni/'.$alumni->foto_profile);
            if (isset($request->foto_profile) && $request->foto_profile != null) {
                if (File::exists($image)) 
                {
                    File::delete($image);
                }
                $newname = $request->nama.' '.date("ymdhis").'.'.$request->file('foto_profile')->getClientOriginalExtension();
                $request->file('foto_profile')->storeAs('profile_alumni', $newname);
            }

            if (isset($request->resume) && $request->resume != null) {
                if (File::exists($resume)) 
                {
                    File::delete($resume);
                }
                $newresume = $request->nama.' '.date("ymdhis").'.'.$request->file('resume')->getClientOriginalExtension();
                $request->file('resume')->storeAs('resume_alumni', $newresume);
            }

            $dataAlumni = [
                'nama' => $request->nama,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'status' => $request->status,
                'tanggal_lahir' => Carbon::parse($request->tanggal_lahir),
                'id_jurusan' => $request->id_jurusan,
                'angkatan' => $request->angkatan,
                'foto_profile' => $newname ?? $alumni->foto_profile,
                'resume' => $newresume ?? $alumni->resume,
                'tentang' => $request->tentang,
            ];

            $alumni->update(array_merge($dataAlumni));
            $alumni->refresh();

            // Pengalaman Update
            $pengalamanUser = PengalamanKerja::where('id_alumni','=',$alumni->id);
            if($pengalamanUser->count() != 0){
                for($i=0; $i < count($request->pengalaman_id); $i++)
                {
                    $id_item = $request->pengalaman_id[$i];
                    $pengalaman = PengalamanKerja::find($id_item);
                    if(!empty($pengalaman))
                    {
                        $updatedPengalaman = [
                            'id_alumni' => $alumni->id,
                            'judul' => $request->judul[$i],
                            'perusahaan' => $request->perusahaan[$i],
                            'tahun' => $request->dari_tahun[$i].'-'.$request->ke_tahun[$i],
                        ];
                        $pengalaman->update(array_merge($updatedPengalaman));
                    }
                }
    
                // Delete The Deleted Pengalaman Kerja
                $deleted_pengalaman_id = DB::table('pengalaman_kerja')
                                        ->select('id')
                                        ->where('id_alumni' , '=' , $alumni->id)
                                        ->whereNotIn('id' , $request->pengalaman_id)
                                        ->get('id');
                if($deleted_pengalaman_id->count() != 0)
                {
                    foreach($deleted_pengalaman_id as $d){
                        $deletedPengalaman = PengalamanKerja::find($d->id);
                        $deletedPengalaman->delete();
                    }
                }
    
                // Create New Pengalaman
                if($request->new_judul > 0)
                {
                    for($i=0; $i < count($request->new_judul); $i++)
                    {
                        if($request->new_judul[$i] != "" && $request->new_perusahaan[$i] != "" && $request->new_dari_tahun[$i] && $request->new_ke_tahun[$i]){
                            $pengalamanbaru = new PengalamanKerja();
                            $new_pengalaman[$i] = [
                                'id_alumni' => $alumni->id,
                                'judul' => $request->new_judul[$i],
                                'perusahaan' => $request->new_perusahaan[$i],
                                'tahun' => $request->new_dari_tahun[$i] .'-'.$request->new_ke_tahun[$i],
                            ];
                            if($i == 2){
                                dd($new_pengalaman[$i]);
                            }
                            $pengalamanbaru->create(array_merge($new_pengalaman[$i]));
                        }
                    }
                }
            }else{
                for($i=0; $i < count($request->judul); $i++)
                {
                    $id_item = $request->judul[$i];
                    $pengalaman = new PengalamanKerja();
                    $dataPengalaman = [
                        'id_alumni' => $alumni->id,
                        'judul' => $request->judul[$i],
                        'perusahaan' => $request->perusahaan[$i],
                        'tahun' => $request->dari_tahun[$i].'-'.$request->ke_tahun[$i],
                    ];
                        $pengalaman->create(array_merge($dataPengalaman));
                    }
                    if($request->new_judul > 0)
                    {
                        for($i=0; $i < count($request->new_judul); $i++)
                        {
                            if($request->new_judul[$i] != "" && $request->new_perusahaan[$i] != "" && $request->new_dari_tahun[$i] && $request->new_ke_tahun[$i]){
                                $pengalamanbaru = new PengalamanKerja();
                                $new_pengalaman[] = [
                                    'id_alumni' => $alumni->id,
                                    'judul' => $request->new_judul[$i],
                                    'perusahaan' => $request->new_perusahaan[$i],
                                    'tahun' => $request->new_dari_tahun[$i] .'-'.$request->new_ke_tahun[$i],
                                ];
                                $pengalamanbaru->create(array_merge($new_pengalaman[$i]));
                            }
                        }
                    }
                }
            }

            // Edukasi
            $edukasiUser = Edukasi::where('id_alumni','=',$alumni->id)->get();
            if($edukasiUser->count() != 0)
            {
                for($i=0; $i < count($request->edukasi_id); $i++)
                {
                    $id_item = $request->edukasi_id[$i];
                    $edukasi = Edukasi::find($id_item);
                    if(!empty($edukasi))
                    {
                        $updatedEdukasi = [
                            'id_alumni' => $alumni->id,
                            'nama_lembaga' => $request->nama_lembaga[$i],
                            'bidang' => $request->bidang[$i],
                            'tahun' => $request->tahun[$i],
                        ];
                        $edukasi->update(array_merge($updatedEdukasi));
                    }
                }
    
                // Delete The Deleted Pengalaman Kerja
                $deleted_edukasi_id = DB::table('edukasi')
                                        ->select('id')
                                        ->where('id_alumni' , '=' , $alumni->id)
                                        ->whereNotIn('id' , $request->edukasi_id)
                                        ->get('id');
                if($deleted_edukasi_id->count() != 0)
                {
                    foreach($deleted_edukasi_id as $d){
                        $deletedEdukasi = Edukasi::find($d->id);
                        $deletedEdukasi->delete();
                    }
                }
    
                // Create New Edukasi
                if($request->new_nama_lembaga > 0)
                {
                    for($i=0; $i < count($request->new_nama_lembaga); $i++)
                    {
                        if($request->new_nama_lembaga[$i] != "" && $request->new_bidang[$i] && $request->new_tahun[$i]){
                            $edukasi = new Edukasi();
                            $new_edukasi[] = [
                                'id_alumni' => $alumni->id,
                                'nama_lembaga' => $request->new_nama_lembaga[$i],
                                'bidang' => $request->new_bidang[$i],
                                'tahun' => $request->new_tahun[$i],
                            ];
                            $edukasi->create(array_merge($new_edukasi[$i]));
                        }
                    }
                }
            }else{
                for($i=0; $i < count($request->nama_lembaga); $i++)
                {
                    $edukasi = new Edukasi();
                    $dataEdukasi = [
                        'id_alumni' => $alumni->id,
                        'nama_lembaga' => $request->nama_lembaga[$i],
                        'bidang' => $request->bidang[$i],
                        'tahun' => $request->tahun[$i],
                    ];
                    $edukasi->create(array_merge($dataEdukasi));
                }
                if($request->new_nama_lembaga > 0)
                {
                    for($i=0; $i < count($request->new_nama_lembaga); $i++)
                    {
                        if($request->new_nama_lembaga[$i] != "" && $request->new_bidang[$i] && $request->new_tahun[$i]){
                            $edukasi = new Edukasi();
                            $new_edukasi[] = [
                                'id_alumni' => $alumni->id,
                                'nama_lembaga' => $request->new_nama_lembaga[$i],
                                'bidang' => $request->new_bidang[$i],
                                'tahun' => $request->new_tahun[$i],
                            ];
                            $edukasi->create(array_merge($new_edukasi[$i]));
                        }
                    }
                }
            }

            return redirect()->back()->withSuccess(__('Profile Telah Diubah',['name' => 'My Profile']));
        

    }

    public function download($id){
        $alumni = Alumni::findOrFail($id);
        $file = storage_path('app/resume_alumni/'.$alumni->resume);
        return response()->download($file);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $status = 'errors';
        $message= __('global-message.delete_form', ['form' => __('users.title')]);

        if($user!='') {
            $user->delete();
            $status = 'success';
            $message= __('global-message.delete_form', ['form' => __('users.title')]);
        }

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
        }

        return redirect()->back()->with($status,$message);

    }
}
