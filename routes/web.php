<?php

// Controllers

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Security\RolePermission;
use App\Http\Controllers\Security\RoleController;
use App\Http\Controllers\Security\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\LamaranKerjaController;
use App\Http\Controllers\LowonganKerjaController;
use App\Http\Controllers\PerusahaanController;
use Illuminate\Support\Facades\Artisan;
// Packages
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::get('/storage', function () {
    Artisan::call('storage:link');
});

// User Enviroment
Route::get('lowongan',[HomeController::class,'lowongan']);
Route::get('perusahaan/list',[PerusahaanController::class,'perusahaanList']);
Route::get('perusahaan/detail/{id}',[PerusahaanController::class,'detailPerusahaan'])->name('perusahaan.detail');
Route::get('lowongan/{id}',[LowonganKerjaController::class,'detailLowongan'])->name('detail.lowongan');

Route::get('/',[HomeController::class, 'landingPage'])->name('landingPage');

//UI Pages Routs
Route::get('/uisheet', [HomeController::class, 'uisheet'])->name('uisheet');

Route::group(['middleware' => 'auth'], function () {
    // Permission Module
    Route::get('/role-permission',[RolePermission::class, 'index'])->name('role.permission.list');
    Route::resource('permission',PermissionController::class);
    Route::resource('role', RoleController::class);

    // Dashboard Admin
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Page Alumni
    Route::resource('alumni', AlumniController::class);
    Route::get('listAlumni', [AlumniController::class, 'listAlumni']);

    // Page Admin
    Route::resource('admin', AdminController::class);
    Route::get('listAdmin',[AdminController::class,'listAdmin']);

    // Page Dokumen
    Route::resource('dokumen', DokumenController::class);
    Route::get('listDokumen', [DokumenController::class,'listDokumen']);
    Route::get('dokumen/download/{id}',[DokumenController::class,'download']);

    // Table Master
    Route::resource('jurusan', 'App\Http\Controllers\JurusanController');
    Route::get('isijurusan', [App\Http\Controllers\JurusanController::class, 'isi']);
    Route::resource('kategoripekerjaan', 'App\Http\Controllers\KategoriPekerjaanController');
    Route::get('isikategoripekerjaan', [App\Http\Controllers\KategoriPekerjaanController::class, 'isi']);

    // Users Module
    Route::resource('users', UserController::class);
    Route::post('download/resume/{id}', [UserController::class , 'download'])->name('download.resume');

    // Page Lowongan Kerja
    Route::resource('lowongan-kerja', LowonganKerjaController::class)->except('edit');
    Route::get('listLoker',[LowonganKerjaController::class,'listLoker']);
    Route::get('lowongan-kerja/update/{id?}',[LowonganKerjaController::class,'edit'])->name('lowongan-kerja.edits');

    
    // Page Perusahaan
    Route::resource('perusahaan', PerusahaanController::class)->except('edit');
    Route::get('listPerusahaan',[PerusahaanController::class,'listPerusahaan']);
    Route::get('perusahaan/update/{id?}',[PerusahaanController::class,'edit'])->name('perusahaan.edit');

    // Page Lamaran
    Route::resource('lamaran-kerja', LamaranKerjaController::class)->except('index');
    Route::get('lamaran',[LamaranKerjaController::class,'index']);
    Route::get('listLamaran',[LamaranKerjaController::class,'listLamaran']);
    Route::get('lamaran/{id}',[LamaranKerjaController::class,'show']);
});

//App Details Page => 'Dashboard'], function() {
Route::group(['prefix' => 'menu-style'], function() {
    //MenuStyle Page Routs
    Route::get('horizontal', [HomeController::class, 'horizontal'])->name('menu-style.horizontal');
    Route::get('dual-horizontal', [HomeController::class, 'dualhorizontal'])->name('menu-style.dualhorizontal');
    Route::get('dual-compact', [HomeController::class, 'dualcompact'])->name('menu-style.dualcompact');
    Route::get('boxed', [HomeController::class, 'boxed'])->name('menu-style.boxed');
    Route::get('boxed-fancy', [HomeController::class, 'boxedfancy'])->name('menu-style.boxedfancy');
});

//App Details Page => 'special-pages'], function() {
Route::group(['prefix' => 'special-pages'], function() {
    //Example Page Routs
    Route::get('billing', [HomeController::class, 'billing'])->name('special-pages.billing');
    Route::get('calender', [HomeController::class, 'calender'])->name('special-pages.calender');
    Route::get('kanban', [HomeController::class, 'kanban'])->name('special-pages.kanban');
    Route::get('pricing', [HomeController::class, 'pricing'])->name('special-pages.pricing');
    Route::get('rtl-support', [HomeController::class, 'rtlsupport'])->name('special-pages.rtlsupport');
    Route::get('timeline', [HomeController::class, 'timeline'])->name('special-pages.timeline');
});

//Widget Routs
Route::group(['prefix' => 'widget'], function() {
    Route::get('widget-basic', [HomeController::class, 'widgetbasic'])->name('widget.widgetbasic');
    Route::get('widget-chart', [HomeController::class, 'widgetchart'])->name('widget.widgetchart');
    Route::get('widget-card', [HomeController::class, 'widgetcard'])->name('widget.widgetcard');
});

//Maps Routs
Route::group(['prefix' => 'maps'], function() {
    Route::get('google', [HomeController::class, 'google'])->name('maps.google');
    Route::get('vector', [HomeController::class, 'vector'])->name('maps.vector');
});

//Auth pages Routs
Route::group(['prefix' => 'auth'], function() {
    Route::get('signin', [HomeController::class, 'signin'])->name('auth.signin');
    Route::get('signup', [HomeController::class, 'signup'])->name('auth.signup');
    Route::post('set-profile', [HomeController::class, 'signup2'])->name('auth.signup2');
    Route::get('confirmmail', [HomeController::class, 'confirmmail'])->name('auth.confirmmail');
    Route::get('lockscreen', [HomeController::class, 'lockscreen'])->name('auth.lockscreen');
    Route::get('recoverpw', [HomeController::class, 'recoverpw'])->name('auth.recoverpw');
    Route::get('userprivacysetting', [HomeController::class, 'userprivacysetting'])->name('auth.userprivacysetting');
});

//Error Page Route
Route::group(['prefix' => 'errors'], function() {
    Route::get('error404', [HomeController::class, 'error404'])->name('errors.error404');
    Route::get('error500', [HomeController::class, 'error500'])->name('errors.error500');
    Route::get('maintenance', [HomeController::class, 'maintenance'])->name('errors.maintenance');
});


//Forms Pages Routs
Route::group(['prefix' => 'forms'], function() {
    Route::get('element', [HomeController::class, 'element'])->name('forms.element');
    Route::get('wizard', [HomeController::class, 'wizard'])->name('forms.wizard');
    Route::get('validation', [HomeController::class, 'validation'])->name('forms.validation');
});


//Table Page Routs
Route::group(['prefix' => 'table'], function() {
    Route::get('bootstraptable', [HomeController::class, 'bootstraptable'])->name('table.bootstraptable');
    Route::get('datatable', [HomeController::class, 'datatable'])->name('table.datatable');
});

//Icons Page Routs
Route::group(['prefix' => 'icons'], function() {
    Route::get('solid', [HomeController::class, 'solid'])->name('icons.solid');
    Route::get('outline', [HomeController::class, 'outline'])->name('icons.outline');
    Route::get('dualtone', [HomeController::class, 'dualtone'])->name('icons.dualtone');
    Route::get('colored', [HomeController::class, 'colored'])->name('icons.colored');
});
//Extra Page Routs
Route::get('privacy-policy', [HomeController::class, 'privacypolicy'])->name('pages.privacy-policy');
Route::get('terms-of-use', [HomeController::class, 'termsofuse'])->name('pages.term-of-use');
