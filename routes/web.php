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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/data-pengguna', [AdminController::class, 'showUser']);
Route::get('/admin/data-penyakit', [AdminController::class, 'showDiagnose']);
Route::get('/admin/data-pemeriksaan', [AdminController::class, 'showHistory']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/data-diri', [UserController::class, 'showProfile']);
Route::get('/user/pemeriksaan-kesehatan', [UserController::class, 'showHealthCheck']);
Route::get('/user/data-pemeriksaan', [UserController::class, 'showHistory']);
