<?php


use App\Models\Landingpage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\DataPendaftarController;
use App\Http\Controllers\DashboardInformasiController;
use App\Http\Controllers\DashboardLowonganController;
use App\Http\Controllers\DashboardLamaranController;
use App\Http\Controllers\DashboardLowonganTersediaController;
use App\Http\Controllers\DashboardProfilController;
use App\Http\Middleware\CheckRole;
use App\Models\Informasi;
use GuzzleHttp\Middleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/lowongan', [LowonganController::class, 'lowongan']);
Route::get('/lowongan/{lowongan:slug}', [LowonganController::class, 'show']);

Route::get('/informasi', [InformasiController::class, 'informasi']);
Route::get('/informasi/{informasi:slug}', [InformasiController::class, 'show']);


// Login
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::group(['middleware'  => 'checkRole:admin,pendaftar'], function () {
    Route::get('/dashboard/profil', [DashboardProfilController::class, 'index']);
    Route::put('/dashboard/profil', [DashboardProfilController::class, 'update']);
});

Route::group(['middleware' => 'checkRole:admin'], function () {
    Route::get('/dashboard/lowongan/checkSlug', [DashboardLowonganController::class, 'checkSlug']);
    Route::resource('/dashboard/lowongan', DashboardLowonganController::class);

    Route::get('/dashboard/pendaftar', [DataPendaftarController::class, 'index']);
    Route::get('/dashboard/pendaftar/{lowongan:slug}', [DataPendaftarController::class, 'pendaftar']);
    Route::get('/dashboard/pendaftar/print-pdf/{lowongan:slug}', [DataPendaftarController::class, 'printPdf']);
    route::get('/dashboard/pendaftar/exportexcel/{id}', [DataPendaftarController::class, 'exportexcel'])->name('exportexcel');

    Route::get('/dashboard/informasi/checkSlug', [DashboardInformasiController::class, 'checkSlug']);
    Route::resource('/dashboard/informasi', DashboardInformasiController::class);
});


Route::group(['middleware' => 'checkRole:pendaftar'], function () {
    Route::get('/dashboard/lowongan-tersedia/', [DashboardLowonganTersediaController::class, 'index']);
    Route::get('/dashboard/lowongan-tersedia/daftar/{lowongan:slug}', [DashboardLowonganTersediaController::class, 'daftar']);
    Route::POST('/dashboard/lowongan-tersedia', [DashboardLowonganTersediaController::class, 'store'])->name('store');

    Route::get('/dashboard/lamaran/', [DashboardLamaranController::class, 'index']);
    Route::get('/dashboard/lamaran/edit/{lowongan:slug}/', [DashboardLamaranController::class, 'edit']);
    Route::post('/dashboard/lamaran/', [DashboardLamaranController::class, 'update'])->name('update-lamaran');
    Route::delete('/dashboard/lamaran/{id}', [DashboardLamaranController::class, 'destroy']);
    Route::get('/dashboard/lamaran/cetak/{lowongan:slug}', [DashboardLamaranController::class, 'cetak']);
});
