<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Mobile\HomeController;
use App\Http\Controllers\Mobile\SplashController;
use App\Http\Controllers\Web\DashboardController;
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
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'postLogin']);

    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register', [RegisterController::class, 'postRegister']);

    Route::get('forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('forgot-password', [ForgotPasswordController::class, 'postForgotPassword']);

    Route::get('reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset-password');
    Route::post('reset-password', [ResetPasswordController::class, 'postResetPassword']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::match(['get', 'post'], 'logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'mobile', 'as' => 'mobile.'], function () {

    Route::group(['middleware' => 'guest'], function () {
        Route::get('/', [HomeController::class, 'splash'])->name('splash');

        Route::get('login', [LoginController::class, 'mobileLogin'])->name('login');
        Route::post('login', [LoginController::class, 'mobilePostLogin'])->name('login');

        Route::get('register', [RegisterController::class, 'mobileRegister'])->name('register');
        Route::post('register', [RegisterController::class, 'mobilePostRegister']);

        Route::get('forgot-password', [ForgotPasswordController::class, 'mobileForgotPassword'])->name('forgot-password');
        Route::post('forgot-password', [ForgotPasswordController::class, 'mobilePostForgotPassword']);

        Route::get('reset-password', [ResetPasswordController::class, 'mobileResetPassword'])->name('reset-password');
        Route::post('reset-password', [ResetPasswordController::class, 'mobilePostResetPassword']);
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('home', [HomeController::class, 'home'])->name('home');

        Route::match(['get', 'post'], 'logout', [LogoutController::class, 'mobileLogout'])->name('logout');
    });
});
