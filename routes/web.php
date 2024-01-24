<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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
//route awal sehingga si pengguna di wajibkan login terlebih dahulu
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('post-login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//route di masukkan kedalam middleware sehingga di perlukan login terlebih dahulu
Route::middleware(['auth'])->group(function () {
    Route::get('/kamar/{hotel}', [UserController::class, 'kamar'])->name('kamar');
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::post('/booking/{kamar}', [UserController::class, 'booking'])->name('booking');
    Route::get('/biodata/{detailtransaksi}', [UserController::class, 'biodata'])->name('biodata');
    Route::post('/post-biodata/{detailtransaksi}', [UserController::class, 'postBiodata'])->name('post-biodata');
    Route::get('/bayar/{detailtransaksi}', [UserController::class, 'bayar'])->name('bayar');
    Route::post('/postbayar/{detailtransaksi}', [UserController::class, 'postbayar'])->name('postbayar');
    Route::get('/sumary', [UserController::class, 'sumary'])->name('sumary');
});
