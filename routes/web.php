<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\LaporanController;

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
    return view('login.index');
});

/* =======================================================================*/
/* ========================== Halaman Login  =========================*/
/* =======================================================================*/
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');
/* =======================================================================*/
/* ========================== Halaman Login  =========================*/
/* =======================================================================*/


Route::resource('/admin-profile', ProfileController::class)->middleware('auth');
Route::resource('/admin-kas', KasController::class)->middleware('auth');
Route::get('/kas-keluar', [KasController::class, 'kasKeluar'])->middleware('auth');
Route::post('/admin-kas/simpan', [KasController::class, 'simpan']);
Route::resource('/admin-laporan', LaporanController::class)->middleware('auth');

