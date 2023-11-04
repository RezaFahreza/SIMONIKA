<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\DosenWaliController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\MahasiswaController;

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
//     return view('welcome');
// });

// jika user belom login
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);
});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2,3,4']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk operator
Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/operator', [OperatorController::class, 'index']);
});

// untuk untuk departemen
Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/departemen', [DepartemenController::class, 'index']);
});

// untuk untuk dosenWali
Route::group(['middleware' => ['auth', 'checkrole:3']], function () {
    Route::get('/dosenWali', [DosenWaliController::class, 'index']);
});

// untuk untuk departemen
Route::group(['middleware' => ['auth', 'checkrole:4']], function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
});
