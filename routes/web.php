<?php


use App\Models\Landingpage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\Admin\DataPendaftarController;
use App\Http\Controllers\Admin\DashboardInformasiController;
use App\Http\Controllers\Admin\DashboardLowonganController;
use App\Http\Controllers\Pendaftar\DashboardLamaranController;
use App\Http\Controllers\Pendaftar\DashboardLowonganTersediaController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Landing Page
Route::get('/', [IndexController::class, 'index']);
Route::resource('/lowongan', LowonganController::class);
Route::resource('/informasi', InformasiController::class);


// Login
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::group(['middleware' => 'checkRole:admin'], function(){ 
    Route::get('/dashboard/lowongan/checkSlug', [DashboardLowonganController::class, 'checkSlug']);
    Route::resource('/dashboard/lowongan/', DashboardLowonganController::class);
    
    Route::get('/dashboard/pendaftar/', [DataPendaftarController::class, 'index']);
    Route::get('/dashboard/pendaftar/{lowongan:slug}', [DataPendaftarController::class, 'pendaftar']);
    route::get('/dashboard/pendaftar/exportexcel/{id}', [DataPendaftarController::class, 'exportexcel'])->name('exportexcel');
    
    Route::get('/dashboard/informasi/checkSlug', [DashboardInformasiController::class, 'checkSlug']);
    Route::resource('/dashboard/informasi', DashboardInformasiController::class);
});


Route::group(['middleware' => 'checkRole:pendaftar'], function(){
    Route::get('/dashboard/lowongan-tersedia/', [DashboardLowonganTersediaController::class, 'index']);
    Route::get('/dashboard/lowongan-tersedia/daftar/{lowongan:slug}', [DashboardLowonganTersediaController::class, 'daftar']);
    Route::POST('/dashboard/lowongan-tersedia', [DashboardLowonganTersediaController::class, 'store'])->name('store');

    Route::get('/dashboard/lamaran/', [DashboardLamaranController::class, 'index']);
    Route::get('/dashboard/lamaran/edit/{lowongan:slug}/', [DashboardLamaranController::class, 'edit']);
    Route::post('/dashboard/lamaran/', [DashboardLamaranController::class, 'update'])->name('update-lamaran');
    Route::delete('/dashboard/lamaran/{id}', [DashboardLamaranController::class, 'destroy']);
    Route::get('/dashboard/lamaran/cetak/{lowongan:slug}', [DashboardLamaranController::class, 'cetak']);
});



