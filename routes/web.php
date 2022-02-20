<?php

use App\Http\Controllers\MasterData\MasterJabatanController;
use App\Http\Controllers\MasterData\MasterPegawaiController;
use App\Http\Controllers\MasterData\MasterPelanggaranController;
use App\Http\Controllers\MasterData\MasterSanksiController;
use App\Http\Controllers\MasterData\MasterShiftController;
use App\Http\Controllers\MasterData\MasterUnitKerjaController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\WebRequirement\PengumumanController;
use App\Http\Controllers\WebRequirement\WebRequirementController;
use App\Models\MasterData\MasterHubunganKeluarga;
use Illuminate\Support\Facades\Route;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// ---------------------user------------------
Route::resource('profile', ProfileController::class);

// MASTER DATA
Route::prefix('Masterdata')
    // ->middleware(['Admin_Role','verified'])
    ->group(function () {
        Route::resource('unit-kerja', MasterUnitKerjaController::class);
    });

Route::prefix('Masterdata')
    // ->middleware(['Admin_Role','verified'])
    ->group(function () {
        Route::resource('jabatan', MasterJabatanController::class);
    });

Route::prefix('Masterdata')
    // ->middleware(['Admin_Role','verified'])
    ->group(function () {
        Route::resource('pegawai', MasterPegawaiController::class);
    });

Route::prefix('Masterdata')
    // ->middleware(['Admin_Role','verified'])
    ->group(function () {
        Route::resource('shift', MasterShiftController::class);
    });

Route::prefix('Masterdata')
    // ->middleware(['Admin_Role','verified'])
    ->group(function () {
        Route::resource('sanksi', MasterSanksiController::class);
    });

Route::prefix('Masterdata')
    // ->middleware(['Admin_Role','verified'])
    ->group(function () {
        Route::resource('pelanggaran', MasterPelanggaranController::class);
    });


// REQUIREMENT
Route::prefix('Requirement')
    // ->middleware(['Admin_Role','verified'])
    ->group(function () {
        Route::resource('pengumuman', PengumumanController::class);
    });

Route::prefix('WebRequirement')
    // ->middleware(['Admin_Role','verified'])
    ->group(function () {
        Route::resource('web-requirement', WebRequirementController::class);
    });