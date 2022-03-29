<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;

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


Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/modul/lab', [LabController::class, 'index']);
    Route::post('/modul/lab', [LabController::class, 'store']);
    Route::get('/modul/lab/add', [LabController::class, 'create']);
    Route::get('/modul/lab/edit/{id}', [LabController::class, 'edit']);
    Route::post('/modul/lab/update', [LabController::class, 'update']);
    Route::get('/modul/lab/delete/{id}', [LabController::class, 'destroy']);

    Route::get('/modul/club', [ClubController::class, 'index']);
    Route::post('/modul/club', [ClubController::class, 'store']);
    Route::get('/modul/club/add', [ClubController::class, 'create']);
    Route::get('/modul/club/edit/{id}', [ClubController::class, 'edit']);
    Route::post('/modul/club/update', [ClubController::class, 'update']);
    Route::get('/modul/club/delete/{id}', [ClubController::class, 'destroy']);
    
    Route::get('/modul/mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/modul/mahasiswa', [MahasiswaController::class, 'index']);
    Route::post('/modul/mahasiswa', [MahasiswaController::class, 'store']);
    Route::get('/modul/mahasiswa/add', [MahasiswaController::class, 'create']);
    Route::get('/modul/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit']);
    Route::post('/modul/mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
    Route::get('/modul/mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy']);
});

