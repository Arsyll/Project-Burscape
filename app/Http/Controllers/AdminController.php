<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        $this->roleCheck("Admin");
        return view('admin.index');
    }

    public function listAdmin(){
        $this->roleCheck("Admin");
        $admin = Admin::with('admin_role');
        return response()->json([
            'massage' => 'List Jurusan',
            'data' => DataTables::eloquent($admin)->addColumn('email', function (Admin $admin){return $admin->admin_role->user->email ?? '-';})->toJson()
        ]);    
    }

    public function store(Request $request)
    {
        $this->roleCheck("Admin");
        $request->validate([
            'nama_lengkap' => 'required|unique:users,username',
            'jabatan' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'min:8|required_with:con_password|same:con_password',
            'con_password' => 'min:8'
        ],[
            'nama_lengkap.unique' => 'Nama Sudah Terpakai.',
            'nama_lengkap.required' => 'Nama Harus Diisi.',
            'jabatan.required' => 'Jabatan Harus Diisi.',
            'email.unique' => 'Email Sudah Terpakai!',
            'email.required' => 'Email Harus Diisi.',
            'password.required' => 'Password Harus Diisi.',
            'password.min' => 'Password Harus Memiliki Minimal 8 Karakter.',
            'password.same' => 'Password Tidak Sesuai Dengan Confirm Password.',
            'con_password.required' => 'Confirm Password Harus Diisi.',
            'con_password.min' => 'Confirm Password Harus Memiliki Minimal 8 Karakter.',
        ]);

        $dataAdmin = array(
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
        );

        $dataUser = array(
            'username' => $request->nama_lengkap,
            'role' => 'Admin',
            'email' => $request->email,
            'password' => Hash::make($request->password)
        );

        
        
        $admin = new Admin();
        
        $statusAdmin = $admin->create(array_merge($dataAdmin));
        
        $user = new User();
        
        $statusUser = $user->create(array_merge($dataUser));
        
        $dataRole = array(
            'id_user' => $statusUser->id,
            'id_admin' => $statusAdmin->id
        );

        $role = new Role();

        $status = $role->create(array_merge($dataRole));
        return response()->json([
            'code' => 200,
            'message' => 'Admin berhasil ditambah!',
            'data' => $status
        ]);
    }

    public function show($id)
    {
        $this->roleCheck("Admin");
        $admin = Admin::with('admin_role.user')->findOrFail($id);
        return response()->json([
            'message' => 'detail dokumen!',
            'data' => $admin
        ]);
    }

    public function update(Request $request,$id)
    {
        $this->roleCheck("Admin");
        $admin = Admin::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|unique:users,username,'. $admin->admin_role->user->id,
            'jabatan' => 'required',
            'email' => 'required|unique:users,email,' . $admin->admin_role->user->id,
            'password' => 'min:8|required_with:con_password|same:con_password',
            'con_password' => 'min:8'
        ],[
            'nama_lengkap.required' => 'Nama Harus Diisi.',
            'nama_lengkap.unique' => 'Nama Sudah Terpakai.',
            'jabatan.required' => 'Jabatan Harus Diisi.',
            'email.unique' => 'Email Sudah Terpakai!',
            'email.required' => 'Email Harus Diisi.',
            'password.required' => 'Password Harus Diisi.',
            'password.min' => 'Password Harus Memiliki Minimal 8 Karakter.',
            'password.same' => 'Password Tidak Sesuai Dengan Confirm Password.',
            'con_password.required' => 'Confirm Password Harus Diisi.',
            'con_password.min' => 'Confirm Password Harus Memiliki Minimal 8 Karakter.',
        ]);

        $dataAdmin = array(
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
        );

        $dataUser = array(
            'username' => $request->nama_lengkap,
            'role' => 'Admin',
            'email' => $request->email,
            'password' => Hash::make($request->password)
        );

        
        
        
        $statusAdmin = $admin->update(array_merge($dataAdmin));
        
        $user = User::findOrFail($admin->admin_role->user->id);
        
        $statusUser = $user->update(array_merge($dataUser));
        
        return response()->json([
            'code' => 200,
            'message' => 'Admin berhasil ditambah!',
            'data' => $statusUser
        ]);
    }

}
