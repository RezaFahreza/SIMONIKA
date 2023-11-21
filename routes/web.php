<?php

use App\Http\Controllers\AkademikController;
use App\Http\Controllers\AkademikDosenWaliController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\DosenWaliController;
use App\Http\Controllers\IRSController;
use App\Http\Controllers\KHSController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PKLController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifikasiProgressStudiController;

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

// Route::get('/', function () {
// });

// jika user belom login
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);
});

// jika sudah login
Route::group(['middleware' => ['auth', 'checkrole:1,2,3,4']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk untuk mahasiswa
Route::group(['middleware' => ['auth', 'checkrole:4']], function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');
    Route::get('/mahasiswa/lengkapidata', [MahasiswaController::class, 'firstEdit'])->name('mahasiswa.firstEdit');
    Route::put('/mahasiswa/lengkapidata/{nim}', [MahasiswaController::class, 'firstUpdate'])->name('mahasiswa.firstUpdate');

    Route::get('/mahasiswa/dashboard/akademik', [AkademikController::class, 'indexMahasiswa'])->name('mahasiswa.dashboard.akademik');
    // IRS
    Route::get('/mahasiswa/dashboard/akademik/irs', [IRSController::class, 'index'])->name('mahasiswa.dashboard.akademik.irs');
    Route::get('/mahasiswa/dashboard/akademik/irs/tambahentryirs', [IRSController::class, 'create'])->name('mahasiswa.dashboard.akademik.irs.create');
    Route::post('/mahasiswa/dashboard/akademik/irs', [IRSController::class, 'store'])->name('mahasiswa.dashboard.akademik.irs.store');
    Route::get('/mahasiswa/dashboard/akademik/irs/{id}', [IRSController::class, 'show'])->name('mahasiswa.dashboard.akademik.irs.show');
    Route::get('/mahasiswa/dashboard/akademik/irs/edit/{id}', [IRSController::class, 'edit'])->name('mahasiswa.dashboard.akademik.irs.edit');
    Route::put('/mahasiswa/dashboard/akademik/irs/{id}', [IRSController::class, 'update'])->name('mahasiswa.dashboard.akademik.irs.update');

    // KHS
    Route::get('/mahasiswa/dashboard/akademik/khs', [KHSController::class, 'index'])->name('mahasiswa.dashboard.akademik.khs');
    Route::get('/mahasiswa/dashboard/akademik/khs/tambahentryirs', [KHSController::class, 'create'])->name('mahasiswa.dashboard.akademik.khs.create');
    Route::post('/mahasiswa/dashboard/akademik/khs', [KHSController::class, 'store'])->name('mahasiswa.dashboard.akademik.khs.store');
    Route::get('/mahasiswa/dashboard/akademik/khs/{id}', [KHSController::class, 'show'])->name('mahasiswa.dashboard.akademik.khs.show');
    Route::get('/mahasiswa/dashboard/akademik/khs/edit/{id}', [KHSController::class, 'edit'])->name('mahasiswa.dashboard.akademik.khs.edit');
    Route::put('/mahasiswa/dashboard/akademik/khs/{id}', [KHSController::class, 'update'])->name('mahasiswa.dashboard.akademik.khs.update');

    // PKL
    Route::get('/mahasiswa/dashboard/akademik/pkl', [PKLController::class, 'index'])->name('mahasiswa.dashboard.akademik.pkl');
    Route::put('/mahasiswa/dashboard/akademik/pkl/{id}', [PKLController::class, 'storeBerkas'])->name('mahasiswa.dashboard.akademik.pkl.storeBerkas');
    Route::get('/mahasiswa/dashboard/akademik/pkl/edit/{id}', [PKLController::class, 'edit'])->name('mahasiswa.dashboard.akademik.pkl.edit');
    Route::put('/mahasiswa/dashboard/akademik/pkl/edit/{id}', [PKLController::class, 'update'])->name('mahasiswa.dashboard.akademik.pkl.update');

    // Skripsi
    Route::get('/mahasiswa/dashboard/akademik/skripsi', [SkripsiController::class, 'index'])->name('mahasiswa.dashboard.akademik.skripsi');
    Route::put('/mahasiswa/dashboard/akademik/skripsi/{id}', [SkripsiController::class, 'storeBerkas'])->name('mahasiswa.dashboard.akademik.skripsi.storeBerkas');
    Route::get('/mahasiswa/dashboard/akademik/skripsi/edit/{id}', [SkripsiController::class, 'edit'])->name('mahasiswa.dashboard.akademik.skripsi.edit');
    Route::put('/mahasiswa/dashboard/akademik/skripsi/edit/{id}', [SkripsiController::class, 'update'])->name('mahasiswa.dashboard.akademik.skripsi.update');

    Route::get('/search', [SearchController::class, 'index'])->name('search.index');
    Route::post('/search', [SearchController::class, 'search'])->name('search');
});
