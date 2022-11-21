<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
                return view('users.profile-admin', compact('data'));
            }else if($data->role == "Alumni"){
                return view('users.profile-admin', compact('data'));
            }
            else{
                return abort(404);
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
            $data = User::with('user_role.admin')->findOrFail($id);
        
            $data['user_type'] = $data->roles->pluck('id')[0] ?? null;
        
            $roles = Role::where('status',1)->get()->pluck('title', 'id');
        
            $profileImage = getSingleMedia($data, 'profile_image');
        
            return view('users.form', compact('data','id', 'roles', 'profileImage'));
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

        $admin = Admin::find($user->user_role->admin->id);

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
