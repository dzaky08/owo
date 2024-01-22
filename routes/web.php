<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Controllers\Middleware;
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

//route di masukkan kedalam middleware sehingga di perlukan login terlebih dahulu
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/hotel', [UserController::class, 'hotel'])->name('hotel');
    Route::get('/home', [UserController::class, 'home'])->name('home');
});
