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
    
    Route::get('/modul/mahasiswa', [MahasiswaController::class, 'index']);
});

