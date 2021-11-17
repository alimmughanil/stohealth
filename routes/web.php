<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('index');
});
Route::get('/resetpass', function () {
    return view('auth.reset');
});
Route::post('/resetpass', [HomeController::class, 'resetpass']);
Route::post('/feedback', [HomeController::class, 'feedback']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index']);
Route::group(['middleware' => ['Admin']], function () {    
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/data-pengguna', [AdminController::class, 'showUser']);
    Route::get('/admin/data-penyakit', [AdminController::class, 'showDiagnose']);
    Route::get('/admin/data-pemeriksaan', [AdminController::class, 'showHistory']);
    Route::get('/admin/data-feedback', [AdminController::class, 'showFeedback']);
    Route::get('/admin/getFeedback', [AdminController::class, 'getFeedback']);
    Route::post('/admin/data-pengguna/store', [AdminController::class, 'storeUser']);
    Route::post('/admin/data-gejala/store', [AdminController::class, 'storeGejala']);
    Route::post('/admin/data-penyakit/store', [AdminController::class, 'storePenyakit']);
    Route::get('/admin/data-penyakit/getDataPenyakit', [AdminController::class, 'getDataPenyakit']);
    Route::get('/admin/history/getDataUser', [AdminController::class, 'getDataUser']);
    Route::get('/admin/data-pengguna/getRoleUser', [AdminController::class, 'getRoleUser']);
    Route::patch('/admin/data-penyakit/edit', [AdminController::class, 'updatePenyakit']);
    Route::patch('/admin/data-pengguna/edit', [AdminController::class, 'updateDataPengguna']);
    Route::delete('/admin/data-pengguna/{datapengguna}', [AdminController::class, 'destroyDataPengguna']);
    Route::delete('/admin/data-penyakit/{datapenyakit}', [AdminController::class, 'destroyPenyakit']);
  });
Route::group(['middleware' => ['User']], function () {    
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/data-diri', [UserController::class, 'showProfile']);
    Route::get('/user/pemeriksaan-kesehatan', [UserController::class, 'showHealthCheck']);
    Route::get('/user/data-pemeriksaan', [UserController::class, 'showHistory']);
    Route::post('/user/pemeriksaan-kesehatan/save', [UserController::class, 'diagnose']);
    Route::get('/user/data-pemeriksaan/getSaranDokter', [UserController::class, 'getSaranDokter']);
    Route::get('/user/data-diri/getDataUser', [UserController::class, 'getDataUser']);
    Route::delete('/user/data-diri/{datadiri}', [UserController::class, 'destroy']);
    Route::patch('/user/data-diri/{datadiri}/edit', [UserController::class, 'update']);
});

