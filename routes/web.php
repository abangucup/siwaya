<?php

use App\Http\Controllers\Mobile\HomeController;
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

Route::group(['middleware' => 'guest'], function () {
    // Route::get('/login')
});

Route::group(['middleware' => 'auth'], function () {

});

Route::group(['prefix' => 'mobile', 'as' => 'mobile.'], function () {

    Route::group(['middleware' => 'guest'], function () {
        Route::get('/', [HomeController::class, 'splash'])->name('splash');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('home', [HomeController::class, 'home'])->name('home');
    });
});
