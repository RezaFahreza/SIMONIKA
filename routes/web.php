<?php

use App\Http\Controllers\AkademikController;
use App\Http\Controllers\AkademikDepartemenController;
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
//     return view('dosenWali.akademik.rekap.rekapPklMahasiswa');
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


// untuk operator
Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/operator/dashboard', [OperatorController::class, 'index'])->name('operator.dashboard');
    Route::get('/operator/generateakunmahasiswa', [UserController::class, 'generateUserMahasiswa'])->name('generate.user.mahasiswa');
    Route::post('/operator', [UserController::class, 'storeUserMahasiswa'])->name('store.user.mahasiswa');
    Route::post('/operator/storeexcel', [UserController::class, 'storeUserMahasiswaExcel'])->name('store.user.mahasiswa.excel');
});

// untuk untuk departemen
Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/departemen/dashboard', [DepartemenController::class, 'index'])->name('departemen.dashboard');
    Route::get('/departemen/profile', [DepartemenController::class, 'profilDepartemen'])->name('departemen.profile');

    // Progress Studi Akademik
    Route::get('/departemen/akademik', [AkademikDepartemenController::class, 'index'])->name('departemen.akademik');
    Route::get('/departemen/akademik-search', [AkademikDepartemenController::class, 'searchMahasiswa'])->name('departemen.akademik.search');
    Route::get('/departemen/akademik/profile/{nim}', [AkademikDepartemenController::class, 'indexAkademik'])->name('departemen.akademik.profile');

    // Rekap Progress Studi Akademik
});

// untuk untuk dosenWali
Route::group(['middleware' => ['auth', 'checkrole:3']], function () {
    Route::get('/dosenwali/dashboard', [DosenWaliController::class, 'index'])->name('dosenWali.dashboard');
    // Route::get('/dosenwali/dashboard/akademik/{dosenWali}', [AkademikDosenWaliController::class, 'index'])->name('dosenWali.dashboard.akademik');
    // Route::get('/dosenwali/dashboard/akademik/{dosenWali}/perwalian/{id}', [AkademikDosenWaliController::class, 'profilMahasiswa'])->name('dosenWali.dashboard.akademik.perwalian');

    // verifikasi progress studi
    // IRS
    Route::get('/dosenwali/dashboard/verifikasiprogressstudi/irs', [VerifikasiProgressStudiController::class, 'indexIrs'])->name('dosenWali.verifikasi.irs');
    Route::get('/dosenwali/dashboard/verifikasiprogressstudi/irs/show/{id}', [VerifikasiProgressStudiController::class, 'showIrs'])->name('dosenWali.verifikasi.irs.show');
    Route::get('/dosenwali/dashboard/verifikasiprogressstudi/irs/edit/{id}', [VerifikasiProgressStudiController::class, 'editIrs'])->name('dosenWali.verifikasi.irs.edit');
    Route::put('/dosenwali/dashboard/verifikasiprogressstudi/irs/update/{id}', [VerifikasiProgressStudiController::class, 'updateIrs'])->name('dosenWali.verifikasi.irs.update');
    Route::put('/dosenwali/dashboard/verifikasiprogressstudi/irs/validate/{id}', [VerifikasiProgressStudiController::class, 'validateIrs'])->name('dosenWali.verifikasi.irs.validate');

    // KHS
    Route::get('/dosenwali/dashboard/verifikasiprogressstudi/khs', [VerifikasiProgressStudiController::class, 'indexKhs'])->name('dosenWali.verifikasi.khs');
    Route::get('/dosenwali/dashboard/verifikasiprogressstudi/khs/show/{id}', [VerifikasiProgressStudiController::class, 'showKhs'])->name('dosenWali.verifikasi.khs.show');
    Route::get('/dosenwali/dashboard/verifikasiprogressstudi/khs/edit/{id}', [VerifikasiProgressStudiController::class, 'editKhs'])->name('dosenWali.verifikasi.khs.edit');
    Route::put('/dosenwali/dashboard/verifikasiprogressstudi/khs/update/{id}', [VerifikasiProgressStudiController::class, 'updateKhs'])->name('dosenWali.verifikasi.khs.update');
    Route::put('/dosenwali/dashboard/verifikasiprogressstudi/khs/validate/{id}', [VerifikasiProgressStudiController::class, 'validateKhs'])->name('dosenWali.verifikasi.khs.validate');

    // PKL
    Route::get('/dosenwali/dashboard/verifikasiprogressstudi/pkl', [VerifikasiProgressStudiController::class, 'indexPkl'])->name('dosenWali.verifikasi.pkl');
    Route::get('/dosenwali/dashboard/verifikasiprogressstudi/pkl/show/{id}', [VerifikasiProgressStudiController::class, 'showPkl'])->name('dosenWali.verifikasi.pkl.show');
    Route::get('/dosenwali/dashboard/verifikasiprogressstudi/pkl/edit/{id}', [VerifikasiProgressStudiController::class, 'editPkl'])->name('dosenWali.verifikasi.pkl.edit');
    Route::put('/dosenwali/dashboard/verifikasiprogressstudi/pkl/update/{id}', [VerifikasiProgressStudiController::class, 'updatePkl'])->name('dosenWali.verifikasi.pkl.update');
    Route::put('/dosenwali/dashboard/verifikasiprogressstudi/pkl/validate/{id}', [VerifikasiProgressStudiController::class, 'validatePkl'])->name('dosenWali.verifikasi.pkl.validate');

    // Skripsi
    Route::get('/dosenwali/dashboard/verifikasiprogressstudi/skripsi', [VerifikasiProgressStudiController::class, 'indexSkripsi'])->name('dosenWali.verifikasi.skripsi');
    Route::get('/dosenwali/dashboard/verifikasiprogressstudi/skripsi/show/{id}', [VerifikasiProgressStudiController::class, 'showSkripsi'])->name('dosenWali.verifikasi.skripsi.show');
    Route::get('/dosenwali/dashboard/verifikasiprogressstudi/skripsi/edit/{id}', [VerifikasiProgressStudiController::class, 'editSkripsi'])->name('dosenWali.verifikasi.skripsi.edit');
    Route::put('/dosenwali/dashboard/verifikasiprogressstudi/skripsi/update/{id}', [VerifikasiProgressStudiController::class, 'updateSkripsi'])->name('dosenWali.verifikasi.skripsi.update');
    Route::put('/dosenwali/dashboard/verifikasiprogressstudi/skripsi/validate/{id}', [VerifikasiProgressStudiController::class, 'validateSkripsi'])->name('dosenWali.verifikasi.skripsi.validate');

    // Progress Studi Akademik
    Route::get('/dosenwali/akademik', [AkademikDosenWaliController::class, 'index'])->name('dosenWali.akademik.index');
    Route::get('/dosenwali/akademik-search', [AkademikDosenWaliController::class, 'searchMahasiswa'])->name('dosenWali.akademik.search');
    Route::get('/dosenwali/akademik/profile/{nim}', [AkademikDosenWaliController::class, 'indexAkademik'])->name('dosenWali.akademik.profile');

    // Rekap Progress Studi Akademik
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

});