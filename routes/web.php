<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KategoriController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/backend/beranda', [BerandaController::class, 'berandaBackend'])->name('backend.beranda')->middleware('auth');
Route::get('/backend/login', [LoginController::class, 'loginBackend'])->name('backend.login');
Route::post('/backend/login', [LoginController::class, 'authenticateBackend'])->name('backend.login');
Route::post('/backend/logout', [LoginController::class, 'logoutBackend'])->name('backend.logout');
// Route::resource('backend/user', UserController::class)->middleware('auth');
Route::resource('/backend/user', UserController::class, ['as' => 'backend'])->middleware('auth');
Route::resource('/backend/kategori', KategoriController::class, ['as' => 'backend'])->middleware('auth');
Route::resource('/backend/produk', ProdukController::class, ['as' => 'backend'])->middleware('auth');
