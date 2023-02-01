<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $dataAlumni = $request->validate([
            'angkatan' => 'required|integer|min:1990|max:2022',
            'status' => 'required|string',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
        ]);
        $user = $request->session()->get('user');
        $alumni = $request->session()->get('alumni');
        
        $alumni->fill($dataAlumni)->save();
        
        $user->save();

        $role = new Role();

        $dataRole = array(
            'id_user' => $user->id,
            'id_alumni' => $alumni->id,
        );

        $role->create(array_merge($dataRole));

        $login = $user->refresh();

        $request->session()->forget('user');
        $request->session()->forget('alumni');
        
        Auth::login($login);

        Auth::user()->makeNotification('Selamat Datang Di Burscape! Ayo Lengkapi Profilmu!','Selamat datang Job Seeker!, Burscape Menyediakan Semua Peluang Terbaik Yang Anda Dapat Harapkan. Sebelum Mencari Peluangmu, Ayo Lengkapi Dulu Profilmu!',Auth::user()->id);

        return redirect(RouteServiceProvider::HOME);
    }
}
