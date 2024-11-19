<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KondisiController;
use App\Http\Controllers\Mobile\HomeController;
use App\Http\Controllers\Mobile\MobileProfileController;
use App\Http\Controllers\Mobile\MobileWBTBController;
use App\Http\Controllers\Mobile\SplashController;
use App\Http\Controllers\PenetapanWbtbController;
use App\Http\Controllers\Settings\RoleController;
use App\Http\Controllers\Settings\UserController;
use App\Http\Controllers\VerifikasiWbtbController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\InstansiController;
use App\Http\Controllers\Web\LandingController;
use App\Http\Controllers\Web\LaporanController;
use App\Http\Controllers\Web\WebWBTBController;
use App\Http\Controllers\Web\Wilayah\KabkotController;
use App\Http\Controllers\Web\Wilayah\KecamatanController;
use App\Http\Controllers\Web\Wilayah\KelurahanController;
use App\Http\Controllers\Web\Wilayah\ProvinsiController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'postLogin']);

    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register', [RegisterController::class, 'postRegister'])->name('postRegister');

    Route::get('forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('forgot-password', [ForgotPasswordController::class, 'postForgotPassword']);

    Route::get('reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset-password');
    Route::post('reset-password', [ResetPasswordController::class, 'postResetPassword']);
});

Route::middleware(['auth'])->group(function () {
    # code...

    Route::group(['prefix' => 'dashboard'], function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['middleware' => ['role:operator_provinsi']], function () {

            Route::resource('instansi', InstansiController::class);

            // Pengaturan Wilayah
            Route::group(['prefix' => 'wilayah', 'as' => 'wilayah.'], function () {
                Route::resource('kabkot', KabkotController::class);
            });
            // Settings
            Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
                Route::resource('user', UserController::class);
                Route::resource('role', RoleController::class);
            });

            // Pencatatan WBTB
            Route::resource('kategori', KategoriController::class);
            Route::resource('kondisi', KondisiController::class);
        });

        Route::resource('wbtb', WebWBTBController::class);

        Route::group(['prefix' => 'laporan', 'as' => 'laporan.'], function () {
            Route::get('laporan-ditolak', [LaporanController::class, 'laporanDitolak'])->name('ditolak');
            Route::get('laporan-diverifikasi', [LaporanController::class, 'laporanDiverifikasi'])->name('diverifikasi');
            Route::get('laporan-ditetapkan', [LaporanController::class, 'laporanDitetapkan'])->name('ditetapkan');
            Route::get('laporan-diajukan', [LaporanController::class, 'laporanDiajukan'])->name('diajukan');


            Route::group(['prefix' => 'cetak', 'as' => 'cetak.'], function () {
                Route::get('laporan-ditolak', [LaporanController::class, 'laporanCetakDitolak'])->name('ditolak');
                Route::get('laporan-diverifikasi', [LaporanController::class, 'laporanCetakDiverifikasi'])->name('diverifikasi');
                Route::get('laporan-ditetapkan', [LaporanController::class, 'laporanCetakDitetapkan'])->name('ditetapkan');
                Route::get('laporan-diajukan', [LaporanController::class, 'laporanCetakDiajukan'])->name('diajukan');
            });

            Route::group(['prefix' => 'export', 'as' => 'export.'], function () {
                Route::get('export-ditolak', [LaporanController::class, 'exportDitolak'])->name('ditolak');
                Route::get('export-ditetapkan', [LaporanController::class, 'exportDitetapkan'])->name('ditetapkan');
                Route::get('export-diverifikasi', [LaporanController::class, 'exportDiverifikasi'])->name('diverifikasi');
                Route::get('export-diajukan', [LaporanController::class, 'exportDiajukan'])->name('diajukan');
            });
        });

        Route::match(['get', 'post'], 'logout', [LogoutController::class, 'logout'])->name('logout');
    });
});

Route::group(['prefix' => 'mobile', 'as' => 'mobile.'], function () {

    Route::middleware(['guest'])->group(function () {
        Route::get('/', [HomeController::class, 'splash'])->name('splash');

        Route::get('login', [LoginController::class, 'mobileLogin'])->name('login');
        Route::post('login', [LoginController::class, 'mobilePostLogin'])->name('postLogin');

        Route::get('register', [RegisterController::class, 'mobileRegister'])->name('register');
        Route::post('register', [RegisterController::class, 'mobilePostRegister'])->name('postRegister');

        Route::get('forgot-password', [ForgotPasswordController::class, 'mobileForgotPassword'])->name('forgot-password');
        Route::post('forgot-password', [ForgotPasswordController::class, 'mobilePostForgotPassword']);

        Route::get('reset-password', [ResetPasswordController::class, 'mobileResetPassword'])->name('reset-password');
        Route::post('reset-password', [ResetPasswordController::class, 'mobilePostResetPassword']);
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('home', [HomeController::class, 'home'])->name('home');

        // Profile
        Route::resource('profile', MobileProfileController::class);

        // Pengajuan WBTB
        Route::group(['prefix' => 'wbtb', 'as' => 'wbtb.'], function () {
            Route::get('list', [MobileWBTBController::class, 'list'])->name('list');
            Route::get('show/{slug}', [MobileWBTBController::class, 'show'])->name('show');
            Route::get('create', [MobileWBTBController::class, 'create'])->name('create');
            Route::post('store', [MobileWBTBController::class, 'store'])->name('store');
            Route::get('pengajuan', [MobileWBTBController::class, 'pengajuan'])->name('pengajuan');
            Route::delete('destroy/{slug}', [MobileWBTBController::class, 'destroy'])->name('destroy');

            // verifikasi
            Route::group(['prefix' => 'verifikasi', 'as' => 'verifikasi.'], function () {
                Route::get('/', [VerifikasiWbtbController::class, 'index'])->name('list');
                Route::get('{slug}', [VerifikasiWbtbController::class, 'verifikasi'])->name('tambahVerifikasi');
                Route::post('{slug}', [VerifikasiWbtbController::class, 'storeVerifikasi'])->name('storeVerifikasi');
            });

            // penetapan
            Route::group(['prefix' => 'penetapan', 'as' => 'penetapan.'], function () {
                Route::get('/', [PenetapanWbtbController::class, 'index'])->name('list');
                Route::get('{slug}', [PenetapanWbtbController::class, 'penetapan'])->name('tambahPenetapan');
                Route::post('{slug}', [PenetapanWbtbController::class, 'storePenetapan'])->name('storePenetapan');
            });
        });

        Route::match(['get', 'post'], 'logout', [LogoutController::class, 'mobileLogout'])->name('logout');
    });
});
