<?php

use App\Http\Controllers\Absensi\LaporanAbsensiController;
use App\Http\Controllers\Cuti\ApprovalCutiController;
use App\Http\Controllers\Jadwal\JadwalPegawaiController;
use App\Http\Controllers\Jadwal\JadwalSayaController;
use App\Http\Controllers\MasterData\MasterJabatanController;
use App\Http\Controllers\MasterData\MasterOrientasiController;
use App\Http\Controllers\MasterData\MasterPegawaiController;
use App\Http\Controllers\MasterData\MasterPelanggaranController;
use App\Http\Controllers\MasterData\MasterSanksiController;
use App\Http\Controllers\MasterData\MasterShiftController;
use App\Http\Controllers\MasterData\MasterUnitKerjaController;
use App\Http\Controllers\Pelanggaran\PelanggaranController;
use App\Http\Controllers\Pelatihan\AllPelatihanWebController;
use App\Http\Controllers\Pelatihan\ProgramPelatihanController;
use App\Http\Controllers\Penilaian\ApprovalPenilaianController;
use App\Http\Controllers\Penilaian\NilaiSayaController;
use App\Http\Controllers\Penilaian\PenilaianPegawaiController;
use App\Http\Controllers\Riwayat\RiwayatCutiController;
use App\Http\Controllers\Riwayat\RiwayatPelanggaranController;
use App\Http\Controllers\Riwayat\RiwayatPendidikanController;
use App\Http\Controllers\Riwayat\RiwayatPrestasiController;
use App\Http\Controllers\Riwayat\RiwayatKeluargaController;

use App\Http\Controllers\Riwayat\RiwayatSanskiController;
use App\Http\Controllers\Sanksi\SanksiController;
use App\Http\Controllers\WebRequirement\CalonPegawaiController;
use App\Http\Controllers\WebRequirement\HasilSeleksiController;
use App\Http\Controllers\WebRequirement\PengumumanController;
use App\Http\Controllers\WebRequirement\WebRequirementController;
use App\Models\MasterData\MasterHubunganKeluarga;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\WebRequirement\OrientasiCalonController;
use App\Models\MasterData\MasterOrientasi;
use App\Models\Pelatihan\ProgramPelatihan;
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
Auth::routes();



Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [App\Http\Controllers\User\ProfileController::class, 'index']);

    // ---------------------user------------------
    Route::prefix('User')
        // ->middleware(['Admin_Role','verified'])
        ->group(function () {
            Route::resource('profile', ProfileController::class);
        });

    // MASTER DATA
    Route::prefix('Masterdata')
    ->middleware(['hrd'])
    ->group(function () {
        Route::resource('unit-kerja', MasterUnitKerjaController::class);
        Route::resource('jabatan', MasterJabatanController::class);
        Route::resource('pegawai', MasterPegawaiController::class);
        Route::get('pegawai/{id_pegawai}/riwayat', [App\Http\Controllers\MasterData\MasterPegawaiController::class, 'GetRiwayat'])->name('pegawai-riwayat');
        Route::resource('shift', MasterShiftController::class);
        Route::resource('sanksi', MasterSanksiController::class);
        Route::resource('pelanggaran', MasterPelanggaranController::class);
        Route::resource('orientasi', MasterOrientasiController::class);
    });

    // RIWAYAT PEGAWAI
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

        // AKTIVITAS PEGAWAI
    Route::prefix('Jadwal')
        ->middleware(['gabungan', 'verified'])
        ->group(function () {
        Route::resource('jadwal-pegawai', JadwalPegawaiController::class);
        Route::post('jadwal-pegawai/{id_pegawai}/tanggal', [App\Http\Controllers\Jadwal\JadwalpegawaiController::class, 'getJadwal']);
        Route::get('jadwal-pegawai/{id_pegawai}/tanggal', [App\Http\Controllers\Jadwal\JadwalpegawaiController::class, 'JadwalPegawai']);
        Route::post('jadwal-pegawai/{id_pegawai}/masuk', [App\Http\Controllers\Jadwal\JadwalpegawaiController::class, 'JadwalMasuk']);
        Route::post('jadwal-pegawai/{id_pegawai}/libur', [App\Http\Controllers\Jadwal\JadwalpegawaiController::class, 'JadwalLibur']);
    });

    Route::prefix('Jadwal')
    ->group(function () {
        Route::resource('jadwal-saya', JadwalSayaController::class);
        Route::get('jadwal-saya/{id_pegawai}/tanggal', [App\Http\Controllers\Jadwal\JadwalSayaController::class, 'JadwalPegawai']);
    });

    Route::prefix('Approval')
    ->group(function () {
    Route::resource('approval-cuti', ApprovalCutiController::class);
    Route::post('approval-cuti/{id_riwayat_cuti}/set-status', [App\Http\Controllers\Cuti\ApprovalCutiController::class, 'Status'])->name('approval-cuti-status');
    Route::resource('approval-penilaian', ApprovalPenilaianController::class);
    Route::post('approval-penilaian/{id_penilaian}/set-status', [App\Http\Controllers\Penilaian\ApprovalPenilaianController::class, 'Status'])->name('approval-penilaian-status');
    });

    Route::prefix('Laporan')
    ->group(function () {
    Route::resource('laporan-absensi', LaporanAbsensiController::class);
    });

    Route::prefix('Penilaian')
    ->group(function () {
        Route::resource('penilaian-pegawai', PenilaianPegawaiController::class);
        Route::get('list-penilaian/{id_pegawai}', [App\Http\Controllers\Penilaian\PenilaianPegawaiController::class, 'DetailNilai'])->name('penilaian-list');
        Route::resource('nilai-saya', NilaiSayaController::class);
        Route::put('Nilai/{id_penilaian}/Tanggapan', [App\Http\Controllers\Penilaian\NilaiSayaController::class, 'Tanggapan'])->name('nilai-tanggapan');
        Route::put('Nilai/{id_penilaian}/Sesuai', [App\Http\Controllers\Penilaian\NilaiSayaController::class, 'Sesuai'])->name('nilai-sesuai');
    });

       // REQUIREMENT
       Route::prefix('Requirement')
       ->middleware(['hrd'])
       ->group(function () {
           Route::resource('pengumuman', PengumumanController::class);
       });
   
       Route::prefix('Requirement')
       ->middleware(['hrd'])
           ->group(function () {
               Route::get('/hasil_seleksi', [App\Http\Controllers\WebRequirement\CalonPegawaiController::class, 'HasilSeleksi'])->name('calon-pegawai-hasil');
               Route::get('/download_cv/{file_cv}', [App\Http\Controllers\WebRequirement\CalonPegawaiController::class, 'getFile'])->name('calon-pegawai-cv');
               Route::get('/download_pendukung/{file_pendukung}', [App\Http\Controllers\WebRequirement\CalonPegawaiController::class, 'getFilePendukung'])->name('calon-pegawai-pendukung');
               Route::post('Calon/{id_calon_pegawai}/Status', [App\Http\Controllers\WebRequirement\CalonPegawaiController::class, 'setStatus'])->name('calon-pegawai-status');
               Route::resource('calon-pegawai', CalonPegawaiController::class);
               Route::resource('peserta-orientasi', OrientasiCalonController::class);
               Route::post('peserta-orientasi/{id_calon_pegawai}/sertifikat', [App\Http\Controllers\WebRequirement\OrientasiCalonController::class, 'Sertifikat'])->name('perserta-orientasi-seritifikat');
       });

    Route::prefix('Pelanggaran')
        ->group(function () {
            Route::resource('pelanggaran-pegawai', PelanggaranController::class);
        });

    Route::prefix('Pelatihan')
        ->middleware(['hrd'])
        ->group(function () {
            Route::resource('program-pelatihan', ProgramPelatihanController::class);
        });

    Route::prefix('WebPelatihan')
        ->group(function () {
            Route::resource('web-pelatihan', AllPelatihanWebController::class);
        });

     

});



// WEB
Route::prefix('WebRequirement')
    ->group(function () {
        Route::resource('web-requirement', WebRequirementController::class);
    });
