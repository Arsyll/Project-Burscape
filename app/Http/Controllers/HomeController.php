<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\DetailLoker;
use App\Models\KategoriPekerjaan;
use App\Models\LamaranKerja;
use App\Models\LowonganKerja;
use App\Models\Perusahaan;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /*
     * Landing Page
     */
    public function landingPage(){
        $perusahaan = Perusahaan::with('lowongan')->latest()->take(3)->get();
        $lowongan = LowonganKerja::with('perusahaan')->where('status','=','Aktif')->latest()->take(3)->get();
        return view('landing-page',compact('perusahaan','lowongan'));
    }


    /*
     * Dashboard Pages Routs
     */
    public function index(Request $request)
    {
         // $authUserId = Auth::id();
         $user = User::find(Auth::id());
         $assets = ['chart', 'animation'];
         $perusahaan = Perusahaan::all();

         if ($user->role == "Perusahaan") {
            $perusahaan = Perusahaan::findOrFail($user->user_role->perusahaan->id);
            $loker = LowonganKerja::with('perusahaan')->where('id_perusahaan',$perusahaan->id)->get();
            $totLowongan = $loker->count();
            $totLamaran =   DB::table('lamaran_kerja')
                        ->join('lowongan_kerja','lamaran_kerja.id_lowongan','=','lowongan_kerja.id')
                        ->where('lowongan_kerja.id_perusahaan','=', $perusahaan->id)
                        ->count();
            return view('dashboards.perusahaan-dashboard', compact('assets','perusahaan','loker','totLowongan','totLamaran'));
         }
         else if($user->role == "Admin") {
            $totPerusahaan = Perusahaan::count();
            $totLowongan = LowonganKerja::count();
            $totAlumni = Alumni::count();
            $loker = LowonganKerja::with('perusahaan')->latest()->take(5)->get();
            return view('dashboards.admin-dashboard', compact('totPerusahaan','totLowongan','totAlumni','assets','loker'));
         }
         else if($user->role == "Alumni") {
            return redirect(RouteServiceProvider::LOWONGAN);
         }
        
    }

    public function lowongan(Request $request){
        if(empty($request->filter)){
            $search = $request->search;
            if(!empty($search)){
                $lowongan = LowonganKerja::with('perusahaan')->where('nama_lowongan','like','%'.$search.'%')
                    ->paginate(10);
                $assets = ['chart', 'animation'];
                $kategori = KategoriPekerjaan::all();
                return view('dashboards.alumni-dashboard', compact('assets','lowongan','kategori'));
            }else{
                $assets = ['chart', 'animation'];
                $lowongan = LowonganKerja::with('perusahaan')->where('status','=','Aktif')->paginate(10);
                $kategori = KategoriPekerjaan::all();
                 return view('dashboards.alumni-dashboard', compact('assets','lowongan','kategori'));
            }
        }
        else{
            $lokerId = [];
            if(!empty($request->filter["kategori"])){
                $kategoriName = [];
                $kategoriName = array_merge($kategoriName, explode(',', $request->filter["kategori"]));
                $kategori = KategoriPekerjaan::whereIn('nama_kategori',$kategoriName)->get('id');
                $kategoriId = [];
                foreach($kategori as $k){
                    if(!in_array($k->id,$kategoriId)){
                        array_push($kategoriId,$k->id);
                    }
                }
                $det = DetailLoker::whereIn('id_kategori',$kategoriId)->get('id_loker');
                
                foreach($det as $d){
                    if(!in_array($d->id_loker,$lokerId)){
                        array_push($lokerId,$d->id_loker);
                    }
                }
            }
            $tipe = [];
            $tipe = array_merge($tipe, explode(',', empty($request->filter["tipe"]) ? '' : $request->filter["tipe"]));
            $search = $request->filter['search'] ?? '';
            if($request->filter["waktu"] == "Terbaru"){
                if(!empty($lokerId) && !empty($lokerId && $tipe[0] != "" && !empty($search))){
                    $lowongan = LowonganKerja::with('perusahaan')->whereIn('id',$lokerId)->whereIn('tipe_pekerjaan',$tipe)
                    ->where('nama_lowongan','like','%'.$search.'%')
                    ->orderBy('updated_at','desc')->paginate(10);
                }
                else if(!empty($tipe) && $tipe[0] != "" && !empty($search)){
                    $lowongan = LowonganKerja::with('perusahaan')->whereIn('tipe_pekerjaan',$tipe)
                    ->where('nama_lowongan','like','%'.$search.'%')
                    ->orderBy('updated_at','desc')->paginate(10);
                }else if(!empty($lokerId) && !empty($search)){
                    $lowongan = LowonganKerja::with('perusahaan')->whereIn('id',$lokerId)
                    ->where('nama_lowongan','like','%'.$search.'%')
                    ->orderBy('updated_at','desc')->paginate(10);
                }else if(!empty($lokerId) && !empty($lokerId && $tipe[0] != "")){
                    $lowongan = LowonganKerja::with('perusahaan')->whereIn('id',$lokerId)->whereIn('tipe_pekerjaan',$tipe)
                    ->orderBy('updated_at','desc')->paginate(10);
                }
                else if(!empty($tipe) && $tipe[0] != ""){
                    $lowongan = LowonganKerja::with('perusahaan')->whereIn('tipe_pekerjaan',$tipe)->orderBy('updated_at','desc')->paginate(10);
                }else if(!empty($lokerId)){
                    $lowongan = LowonganKerja::with('perusahaan')->whereIn('id',$lokerId)->orderBy('updated_at','desc')->paginate(10);
                }else if(!empty($search)){
                    $lowongan = LowonganKerja::with('perusahaan')->where('nama_lowongan','like','%'.$search.'%')
                    ->orderBy('updated_at','desc')->paginate(10);
                    // dd($lowongan);;
                }
                else{
                    $lowongan = LowonganKerja::with('perusahaan')->orderBy('updated_at','desc')->paginate(10);
                }
                $assets = ['chart', 'animation'];
                $kategori = KategoriPekerjaan::all();
                return view('dashboards.alumni-dashboard', compact('assets','lowongan','kategori'));
            }else if($request->filter["waktu"] == "Paling Sesuai"){
                if(!empty($lokerId) && !empty($lokerId && $tipe[0] != "" && !empty($search))){
                    $lowongan = LowonganKerja::with('perusahaan')->whereIn('id',$lokerId)->whereIn('tipe_pekerjaan',$tipe)
                    ->where('nama_lowongan','like','%'.$search.'%')
                    ->paginate(10);
                }
                else if(!empty($tipe) && $tipe[0] != "" && !empty($search)){
                    $lowongan = LowonganKerja::with('perusahaan')->whereIn('tipe_pekerjaan',$tipe)
                    ->where('nama_lowongan','like','%'.$search.'%')
                    ->paginate(10);
                }else if(!empty($lokerId) && !empty($search)){
                    $lowongan = LowonganKerja::with('perusahaan')->whereIn('id',$lokerId)
                    ->where('nama_lowongan','like','%'.$search.'%')
                    ->paginate(10);
                }else if(!empty($lokerId) && !empty($lokerId && $tipe[0] != "")){
                    $lowongan = LowonganKerja::with('perusahaan')->whereIn('id',$lokerId)->whereIn('tipe_pekerjaan',$tipe)
                    ->paginate(10);
                }
                else if(!empty($tipe) && $tipe[0] != ""){
                    $lowongan = LowonganKerja::with('perusahaan')->whereIn('tipe_pekerjaan',$tipe)->paginate(10);
                }else if(!empty($lokerId)){
                    $lowongan = LowonganKerja::with('perusahaan')->whereIn('id',$lokerId)->paginate(10);
                }else if(!empty($search)){
                    $lowongan = LowonganKerja::with('perusahaan')->where('nama_lowongan','like','%'.$search.'%')
                    ->paginate(10);
                }
                else{
                    $lowongan = LowonganKerja::with('perusahaan')->paginate(10);
                }
                $assets = ['chart', 'animation'];
                $kategori = KategoriPekerjaan::all();
                return view('dashboards.alumni-dashboard', compact('assets','lowongan','kategori'));
            }
        }
    }
    

    /*
     * Menu Style Routs
     */
    public function horizontal(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('menu-style.horizontal',compact('assets'));
    }
    public function dualhorizontal(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('menu-style.dual-horizontal',compact('assets'));
    }
    public function dualcompact(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('menu-style.dual-compact',compact('assets'));
    }
    public function boxed(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('menu-style.boxed',compact('assets'));
    }
    public function boxedfancy(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('menu-style.boxed-fancy',compact('assets'));
    }

    /*
     * Pages Routs
     */
    public function billing(Request $request)
    {
        return view('special-pages.billing');
    }

    public function calender(Request $request)
    {
        $assets = ['calender'];
        return view('special-pages.calender',compact('assets'));
    }

    public function kanban(Request $request)
    {
        return view('special-pages.kanban');
    }

    public function pricing(Request $request)
    {
        return view('special-pages.pricing');
    }

    public function rtlsupport(Request $request)
    {
        return view('special-pages.rtl-support');
    }

    public function timeline(Request $request)
    {
        return view('special-pages.timeline');
    }


    /*
     * Widget Routs
     */
    public function widgetbasic(Request $request)
    {
        return view('widget.widget-basic');
    }
    public function widgetchart(Request $request)
    {
        $assets = ['chart'];
        return view('widget.widget-chart', compact('assets'));
    }
    public function widgetcard(Request $request)
    {
        return view('widget.widget-card');
    }

    /*
     * Maps Routs
     */
    public function google(Request $request)
    {
        return view('maps.google');
    }
    public function vector(Request $request)
    {
        return view('maps.vector');
    }

    /*
     * Auth Routs
     */
    public function signin(Request $request)
    {
        return view('auth.login');
    }
    public function signup(Request $request)
    {
        return view('auth.register');
    }
    public function signup2(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'phone_number' => 'required',
            'password' =>  'required|confirmed|min:8',
        ]);
        $userData = array(
            'username' => $request->first_name,
            'role' => 'Alumni',
            'email' => $request->email,
            'password' => Hash::make($request->password)
        );
        $user = new User();
        $user->fill($userData);
        $alumni = new Alumni();
        $dataAlumni = array('nama' => $request->first_name . " " . $request->last_name, 'no_telp' => $request->phone_number);

        $alumni->fill($dataAlumni);

        $request->session()->put('user', $user);
        $request->session()->put('alumni', $alumni);

        return view('auth.register2', compact('user'));
    }
    public function confirmmail(Request $request)
    {
        return view('auth.confirm-mail');
    }
    public function lockscreen(Request $request)
    {
        return view('auth.lockscreen');
    }
    public function recoverpw(Request $request)
    {
        return view('auth.recoverpw');
    }
    public function userprivacysetting(Request $request)
    {
        return view('auth.user-privacy-setting');
    }

    /*
     * Error Page Routs
     */

    public function error404(Request $request)
    {
        return view('errors.error404');
    }

    public function error500(Request $request)
    {
        return view('errors.error500');
    }
    public function maintenance(Request $request)
    {
        return view('errors.maintenance');
    }

    /*
     * uisheet Page Routs
     */
    public function uisheet(Request $request)
    {
        return view('uisheet');
    }

    /*
     * Form Page Routs
     */
    public function element(Request $request)
    {
        return view('forms.element');
    }

    public function wizard(Request $request)
    {
        return view('forms.wizard');
    }

    public function validation(Request $request)
    {
        return view('forms.validation');
    }

     /*
     * Table Page Routs
     */
    public function bootstraptable(Request $request)
    {
        return view('table.bootstraptable');
    }

    public function datatable(Request $request)
    {
        return view('table.datatable');
    }

    /*
     * Icons Page Routs
     */

    public function solid(Request $request)
    {
        return view('icons.solid');
    }

    public function outline(Request $request)
    {
        return view('icons.outline');
    }

    public function dualtone(Request $request)
    {
        return view('icons.dualtone');
    }

    public function colored(Request $request)
    {
        return view('icons.colored');
    }

    /*
     * Extra Page Routs
     */
    public function privacypolicy(Request $request)
    {
        return view('privacy-policy');
    }
    public function termsofuse(Request $request)
    {
        return view('terms-of-use');
    }
}
