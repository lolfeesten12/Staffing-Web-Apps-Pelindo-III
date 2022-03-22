<?php

use App\Http\Controllers\Jadwal\JadwalPegawaiController;
use App\Http\Controllers\MasterData\MasterJabatanController;
use App\Http\Controllers\MasterData\MasterPegawaiController;
use App\Http\Controllers\MasterData\MasterPelanggaranController;
use App\Http\Controllers\MasterData\MasterSanksiController;
use App\Http\Controllers\MasterData\MasterShiftController;
use App\Http\Controllers\MasterData\MasterUnitKerjaController;
use App\Http\Controllers\Riwayat\RiwayatCutiController;
use App\Http\Controllers\Riwayat\RiwayatPelanggaranController;
use App\Http\Controllers\Riwayat\RiwayatPendidikanController;
use App\Http\Controllers\Riwayat\RiwayatPrestasiController;
use App\Http\Controllers\Riwayat\RiwayatSanskiController;
use App\Http\Controllers\WebRequirement\CalonPegawaiController;
use App\Http\Controllers\WebRequirement\HasilSeleksiController;
use App\Http\Controllers\WebRequirement\PengumumanController;
use App\Http\Controllers\WebRequirement\WebRequirementController;
use App\Models\MasterData\MasterHubunganKeluarga;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\RiwayatKeluargaController;
use App\Models\Riwayat\RiwayatPendidikan;

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
Route::get('/home', [App\Http\Controllers\User\ProfileController::class, 'index'])->name('home');


// ---------------------user------------------
Route::prefix('User')
    // ->middleware(['Admin_Role','verified'])
    ->group(function () {
        Route::resource('profile', ProfileController::class);
        Route::resource('riwayat-keluarga', RiwayatKeluargaController::class);
        Route::resource('riwayat-pendidikan', RiwayatKeluargaController::class);
        Route::resource('riwayat-prestasi', RiwayatKeluargaController::class);
        Route::resource('riwayat-cuti', RiwayatKeluargaController::class);
        Route::resource('riwayat-pelanggaran', RiwayatKeluargaController::class);
        Route::resource('riwayat-sanksi', RiwayatKeluargaController::class);


    });


// MASTER DATA
Route::prefix('Masterdata')
    // ->middleware(['Admin_Role','verified'])
    ->group(function () {
        Route::resource('unit-kerja', MasterUnitKerjaController::class);
        Route::resource('jabatan', MasterJabatanController::class);
        Route::resource('pegawai', MasterPegawaiController::class);
        Route::resource('shift', MasterShiftController::class);
        Route::resource('sanksi', MasterSanksiController::class);
        Route::resource('pelanggaran', MasterPelanggaranController::class);
    });

// REQUIREMENT
Route::prefix('Requirement')
    ->group(function () {
        Route::resource('pengumuman', PengumumanController::class);
    });

Route::prefix('Requirement')
    ->group(function () {
        Route::get('/hasil_seleksi', [App\Http\Controllers\WebRequirement\CalonPegawaiController::class, 'HasilSeleksi'])->name('calon-pegawai-hasil');
        Route::get('/download_cv/{file_cv}', [App\Http\Controllers\WebRequirement\CalonPegawaiController::class, 'getFile'])->name('calon-pegawai-cv');
        Route::get('/download_pendukung/{file_pendukung}', [App\Http\Controllers\WebRequirement\CalonPegawaiController::class, 'getFilePendukung'])->name('calon-pegawai-pendukung');
        Route::post('Calon/{id_calon_pegawai}/Status', [App\Http\Controllers\WebRequirement\CalonPegawaiController::class, 'setStatus'])->name('calon-pegawai-status');
        Route::resource('calon-pegawai', CalonPegawaiController::class);
    });

Route::prefix('WebRequirement')
    ->group(function () {
        Route::resource('web-requirement', WebRequirementController::class);
    });


Route::prefix('Jadwal')
    ->group(function () {
        Route::resource('jadwal-pegawai', JadwalPegawaiController::class);
        Route::post('jadwal-pegawai/{id_pegawai}/tanggal', [App\Http\Controllers\Jadwal\JadwalpegawaiController::class, 'getJadwal']);
        Route::get('jadwal-pegawai/{id_pegawai}/tanggal', [App\Http\Controllers\Jadwal\JadwalpegawaiController::class, 'JadwalPegawai']);
        Route::post('jadwal-pegawai/{id_pegawai}/masuk', [App\Http\Controllers\Jadwal\JadwalpegawaiController::class, 'JadwalMasuk']);
        Route::post('jadwal-pegawai/{id_pegawai}/libur', [App\Http\Controllers\Jadwal\JadwalpegawaiController::class, 'JadwalLibur']);
    });
    
    Route::prefix('Riwayat')
    // ->middleware(['Admin_Role','verified'])
    ->group(function () {
            Route::resource('keluarga', RiwayatKeluargaController::class);
            Route::resource('pendidikan', RiwayatPendidikanController::class);
            Route::resource('riwayatpelanggaran', RiwayatPelanggaranController::class);
            Route::resource('cuti', RiwayatCutiController::class);
            Route::resource('prestasi', RiwayatPrestasiController::class);
            Route::resource('riwayatsanksi', RiwayatSanskiController::class);


    });
