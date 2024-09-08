<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuperAdmin\KelolaAkunController;
use App\Http\Controllers\SuperAdmin\PersetujuanAkunController;
use App\Http\Controllers\SuperAdmin\PersetujuanMobilController;
use App\Http\Controllers\AdminRental\KelolaMobilController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PembayaranController;

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

Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'index')->name('landingPage');
    Route::get('/mobil/{id}', 'show')->name('landingPage.show');
});

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
    Route::name('pembayaran.')->group(function () {
        Route::controller(PembayaranController::class)->group(function () {
            Route::post('/pembayaran/store/{id}', 'store')->name('store');
            Route::get('/invoice', 'invoice')->name('invoice');
        });
    });

    Route::middleware('role:Super Admin')->group(function () {
        Route::prefix('dashboard/superAdmin')->group(function () {
            Route::name('superAdmin.')->group(function () {
                Route::controller(KelolaAkunController::class)->group(function () {
                    Route::get('/kelolaAkun', 'index')->name('kelolaAkun.index');
                    Route::post('/kelolaAkun', 'store')->name('kelolaAkun.store');
                    Route::get('/kelolaAkun/{id}/edit', 'edit')->name('kelolaAkun.edit');
                    Route::put('/kelolaAkun/{id}', 'update')->name('kelolaAkun.update');
                    Route::delete('/kelolaAkun/{id}', 'destroy')->name('kelolaAkun.destroy');
                });
                Route::controller(PersetujuanAkunController::class)->group(function () {
                    Route::get('/persetujuanAkun', 'index')->name('persetujuanAkun.index');
                    Route::get('/persetujuanAkun/{id}', 'profile')->name('persetujuanAkun.profile');
                    Route::post('/persetujuanAkun/setujuiAkun/{id}', 'setujui')->name('persetujuanAkun.setujui');
                    Route::post('/persetujuanAkun/tolakAkun/{id}', 'tolak')->name('persetujuanAkun.tolak');
                });
                Route::controller(PersetujuanMobilController::class)->group(function () {
                    Route::get('/persetujuanMobil', 'index')->name('persetujuanMobil.index');
                    Route::get('/persetujuanMobil/{id}', 'mobil')->name('persetujuanMobil.mobil');
                    Route::post('/persetujuanMobil/setujuiMobil/{id}', 'setujui')->name('persetujuanMobil.setujui');
                    Route::post('/persetujuanMobil/tolakMobil/{id}', 'tolak')->name('persetujuanMobil.tolak');
                });
            });
        });
    });
    Route::middleware('role:Admin Rental')->group(function () {
        Route::prefix('dashboard/adminRental')->group(function () {
            Route::name('adminRental.')->group(function () {
                Route::controller(KelolaMobilController::class)->group(function () {
                    Route::get('/kelolaMobil', 'index')->name('kelolaMobil.index');
                    Route::get('/kelolaMobil/create', 'create')->name('kelolaMobil.create');
                    Route::post('/kelolaMobil', 'store')->name('kelolaMobil.store');
                    Route::get('/kelolaMobil/{id}/edit', 'edit')->name('kelolaMobil.edit');
                    Route::put('/kelolaMobil/{id}', 'update')->name('kelolaMobil.update');
                    Route::patch('/kelolaMobil/{id}', 'aktif')->name('kelolaMobil.aktif');
                    Route::delete('/kelolaMobil/{id}', 'destroy')->name('kelolaMobil.destroy');
                });
            });
        });
    });
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile.index');
        Route::get('/profile/create', 'create')->name('profile.create');
        Route::post('/profile', 'store')->name('profile.store');
        Route::put('/profile', 'update')->name('profile.update');
        Route::patch('/profile/akun', 'akunUpdate')->name('profile.akunUpdate');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
