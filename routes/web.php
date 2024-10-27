<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LandingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LandingController::class, 'home'])->name('home');
Route::get('demografis', [LandingController::class, 'demografis'])->name('demografis');
Route::get('pencatatan-wbtb', [LandingController::class, 'pencatatanWbtb'])->name('pencatatanWbtb');
Route::get('penetapan-wbtb', [LandingController::class, 'penetapanWbtb'])->name('penetapanWbtb');
Route::get('kontak', [LandingController::class, 'kontak'])->name('kontak');