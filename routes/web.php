<?php

use App\Http\Controllers\Absensi\AbsenController;
use App\Http\Controllers\Absensi\AbsenManualController;
use App\Http\Controllers\Absensi\AbsensController;
use App\Http\Controllers\Absensi\AbsensiController;
use App\Http\Controllers\Absensi\LaporanAbsensiController;
use App\Http\Controllers\Absensi\QrAbsensiController;
use App\Http\Controllers\Cuti\ApprovalCutiController;
use App\Http\Controllers\Cuti\PengajuanCutiController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Jadwal\JadwalPegawaiController;
use App\Http\Controllers\Jadwal\JadwalSayaController;
use App\Http\Controllers\MasterData\MasterJabatanController;
use App\Http\Controllers\MasterData\MasterOrientasiController;
use App\Http\Controllers\MasterData\MasterPangkatController;
use App\Http\Controllers\MasterData\MasterPegawaiController;
use App\Http\Controllers\MasterData\MasterPelanggaranController;
use App\Http\Controllers\MasterData\MasterSanksiController;
use App\Http\Controllers\MasterData\MasterShiftController;
use App\Http\Controllers\MasterData\MasterUnitKerjaController;
use App\Http\Controllers\Mutasi\ApprovalMutasiJabatanController;
use App\Http\Controllers\Mutasi\ApprovalMutasiPangkatController;
use App\Http\Controllers\Mutasi\ApprovalUsulanMutasiController;
use App\Http\Controllers\Mutasi\MutasiInternalController;
use App\Http\Controllers\Mutasi\MutasiJabatanController;
use App\Http\Controllers\Mutasi\MutasiPangkatController;
use App\Http\Controllers\Mutasi\MutasiPegawaiController;
use App\Http\Controllers\Mutasi\UsulanJabatanController;
use App\Http\Controllers\Mutasi\UsulanMutasiController;
use App\Http\Controllers\Mutasi\UsulanMutasiInternalController;
use App\Http\Controllers\Mutasi\UsulanPangkatController;
use App\Http\Controllers\Pelanggaran\PelanggaranController;
use App\Http\Controllers\Pelatihan\AllPelatihanWebController;
use App\Http\Controllers\Pelatihan\ProgramPelatihanController;
use App\Http\Controllers\Penilaian\ApprovalPenilaianController;
use App\Http\Controllers\Penilaian\NilaiSayaController;
use App\Http\Controllers\Penilaian\PenilaianDiriController;
use App\Http\Controllers\Penilaian\PenilaianPegawaiController;
use App\Http\Controllers\Penilaian\PeriodePenilaianController;
use App\Http\Controllers\Riwayat\RiwayatCutiController;
use App\Http\Controllers\Riwayat\RiwayatPelanggaranController;
use App\Http\Controllers\Riwayat\RiwayatPendidikanController;
use App\Http\Controllers\Riwayat\RiwayatPrestasiController;
use App\Http\Controllers\Riwayat\RiwayatKeluargaController;
use App\Http\Controllers\Riwayat\RiwayatPelatihanController;
use App\Http\Controllers\Riwayat\RiwayatSanskiController;
use App\Http\Controllers\Sanksi\SanksiController;
use App\Http\Controllers\User\PasswordController;
use App\Http\Controllers\WebRequirement\CalonPegawaiController;
use App\Http\Controllers\WebRequirement\HasilSeleksiController;
use App\Http\Controllers\WebRequirement\PengumumanController;
use App\Http\Controllers\WebRequirement\WebRequirementController;
use App\Models\MasterData\MasterHubunganKeluarga;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\WebRequirement\OrientasiCalonController;
use App\Models\Absensi\Absensi;
use App\Models\MasterData\MasterOrientasi;
use App\Models\MasterData\MasterPangkat;
use App\Models\Pelatihan\ProgramPelatihan;
use App\Models\Penilaian\PeriodePenilaian;
use App\Models\Riwayat\RiwayatPendidikan;
use Illuminate\Support\Facades\Auth;

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



Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\User\ProfileController::class, 'index']);
    Route::get('/dashboard', [App\Http\Controllers\DashboardHRDController::class, 'index'])->middleware(['hrd&direktur'])->name('dashboard');
    Route::post('/dashboard/role', [App\Http\Controllers\DashboardHRDController::class, 'role'])->name('pindah-role');
    Route::get('/dashboardunit', [App\Http\Controllers\DashboardHRDController::class, 'indexunit'])->middleware(['gabunganunit'])->name('dashboardunit');
    Route::get('/absen/{id}', [App\Http\Controllers\Absensi\AbsensiController::class, 'index']);
    Route::resource('absen', AbsensiController::class);
 
    
    // USER
    Route::prefix('User')
        ->group(function () {
            Route::resource('profile', ProfileController::class);
            Route::resource('password', PasswordController::class);
        });

    
    // MASTER DATA
    Route::prefix('Masterdata')
        ->middleware(['hrd&direktur'])
        ->group(function () {
            Route::resource('unit-kerja', MasterUnitKerjaController::class);
            Route::resource('pangkat', MasterPangkatController::class);
            Route::resource('jabatan', MasterJabatanController::class);
            Route::resource('pegawai', MasterPegawaiController::class);
            Route::get('pegawai/{id_pegawai}/riwayat', [App\Http\Controllers\MasterData\MasterPegawaiController::class, 'GetRiwayat'])->name('pegawai-riwayat');
            Route::get('pegawai/getpangkat/{id}', [App\Http\Controllers\MasterData\MasterPegawaiController::class, 'GetPangkat'])->name('pegawai-pangkat');
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
            Route::post('keluarga/tambahdetail', [App\Http\Controllers\Riwayat\RiwayatKeluargaController::class, 'storehubungan'])->name('keluarga-tambahdetail');
            Route::resource('pendidikan', RiwayatPendidikanController::class);
            Route::post('pendidikan/tambahdetail', [App\Http\Controllers\Riwayat\RiwayatPendidikanController::class, 'storependidikan'])->name('pendidikan-tambahdetail');
            Route::resource('riwayatpelanggaran', RiwayatPelanggaranController::class);
            Route::resource('cuti', RiwayatCutiController::class);
            Route::resource('prestasi', RiwayatPrestasiController::class);
            Route::resource('riwayatsanksi', RiwayatSanskiController::class);
            Route::resource('riwayatpelatihan', RiwayatPelatihanController::class);
        });
    Route::prefix('Cuti')
        // ->middleware(['Admin_Role','verified'])
        ->group(function () {
            Route::resource('pengajuan-cuti', PengajuanCutiController::class);
        });

    // AKTIVITAS PEGAWAI
    Route::prefix('Jadwal')
        ->middleware(['gabungan', 'verified'])
        ->group(function () {
            Route::resource('jadwal-pegawai', JadwalPegawaiController::class);
            Route::post('jadwal-pegawai/{id_pegawai}/tanggal', [App\Http\Controllers\Jadwal\JadwalPegawaiController::class, 'getJadwal']);
            Route::get('jadwal-pegawai/{id_pegawai}/tanggal', [App\Http\Controllers\Jadwal\JadwalPegawaiController::class, 'JadwalPegawai']);
            Route::post('jadwal-pegawai/{id_pegawai}/masuk', [App\Http\Controllers\Jadwal\JadwalPegawaiController::class, 'JadwalMasuk']);
            Route::post('jadwal-pegawai/{id_pegawai}/libur', [App\Http\Controllers\Jadwal\JadwalPegawaiController::class, 'JadwalLibur']);
        });

    Route::prefix('Jadwal')
        ->group(function () {
            Route::resource('jadwal-saya', JadwalSayaController::class);
            Route::get('jadwal-saya/{id_pegawai}/tanggal', [App\Http\Controllers\Jadwal\JadwalSayaController::class, 'JadwalPegawai']);
            Route::post('approval-jadwal/{id_jadwal}/status-tukar', [App\Http\Controllers\Jadwal\JadwalSayaController::class, 'ApprovalTukar'])->name('approval-tukar-jadwal');
        });

    Route::prefix('Approval')
        ->middleware(['hrd'])
        ->group(function () {
            Route::resource('approval-cuti', ApprovalCutiController::class);
            Route::post('approval-cuti/{id_riwayat_cuti}/set-status', [App\Http\Controllers\Cuti\ApprovalCutiController::class, 'Status'])->name('approval-cuti-status');
            Route::resource('approval-penilaian', ApprovalPenilaianController::class);
            Route::post('approval-penilaian/{id_penilaian}/set-status', [App\Http\Controllers\Penilaian\ApprovalPenilaianController::class, 'Status'])->name('approval-penilaian-status');
        });

    Route::prefix('Approval')
        ->middleware(['direktur'])
        ->group(function () {
            Route::resource('approval-mutasi', ApprovalUsulanMutasiController::class);
            Route::post('approval-mutasi/{id}/set-status', [App\Http\Controllers\Mutasi\ApprovalUsulanMutasiController::class, 'Status'])->name('status-approval-mutasi');
            Route::resource('approval-mutasi-pangkat', ApprovalMutasiPangkatController::class);
            Route::resource('approval-mutasi-jabatan', ApprovalMutasiJabatanController::class);
        });

    Route::prefix('Laporan')
        ->middleware(['hrd&direktur'])
        ->group(function () {
            Route::resource('laporan-absensi', LaporanAbsensiController::class);
            Route::resource('absen-manual', AbsenManualController::class);
            Route::resource('Absen', AbsenController::class);
        });

    Route::prefix('Mutasi')
    ->middleware(['hrd'])
    ->group(function () {
        Route::resource('usulan-mutasi', UsulanMutasiController::class);
        Route::get('usulan-mutasi/getpegawai/{id}', [App\Http\Controllers\Mutasi\UsulanMutasiController::class, 'GetUnit']);
        Route::resource('mutasi', MutasiPegawaiController::class);

        Route::get('/download_sk/{file_sk}', [App\Http\Controllers\Mutasi\MutasiPegawaiController::class, 'getFile'])->name('sk-mutasi');

        // MUTASI PANGKAT
        Route::resource('usulan-pangkat', UsulanPangkatController::class);
        Route::resource('mutasi-pangkat', MutasiPangkatController::class);
      
        // MUTASI JABATAN
        Route::resource('usulan-jabatan', UsulanJabatanController::class);
        Route::get('usulan-jabatan/getpegawai-jabatan/{id}', [App\Http\Controllers\Mutasi\UsulanJabatanController::class, 'GetJabatan']);
        Route::resource('mutasi-jabatan', MutasiJabatanController::class);
    });
        
    Route::prefix('Pengumuman')
    ->group(function(){
        Route::get('mutasi/pegawai', [App\Http\Controllers\Mutasi\Pegawai\PegumumanMutasiController::class, 'pegawai'])->name('mutasi.pegawai');
    });

    Route::prefix('Penilaian')
        ->group(function () {
            Route::resource('penilaian-diri', PenilaianDiriController::class);
            Route::post('penilaian-diri/periode', [App\Http\Controllers\Penilaian\PenilaianDiriController::class, 'StorePeriode'])->name('store-periode-nilai');
            Route::resource('penilaian-pegawai', PenilaianPegawaiController::class);
            Route::post('approval-nilai/{id_penilaian}/set-status', [App\Http\Controllers\Penilaian\PenilaianPegawaiController::class, 'Status'])->name('penilaian-status');
            Route::get('/download_skp/{file_skp}', [App\Http\Controllers\Penilaian\PenilaianPegawaiController::class, 'getFile'])->name('penilaian-file-skp');
            Route::get('list-penilaian/{id_pegawai}', [App\Http\Controllers\Penilaian\PenilaianDiriController::class, 'DetailNilai'])->name('penilaian-list');
            Route::resource('nilai-saya', NilaiSayaController::class);
            Route::put('Nilai/{id_penilaian}/Tanggapan', [App\Http\Controllers\Penilaian\NilaiSayaController::class, 'Tanggapan'])->name('nilai-tanggapan');
            Route::put('Nilai/{id_penilaian}/Sesuai', [App\Http\Controllers\Penilaian\NilaiSayaController::class, 'Sesuai'])->name('nilai-sesuai');
        });

    // REQUIREMENT
    Route::prefix('Requirement')
        ->middleware(['hrd&direktur'])
        ->group(function () {
            Route::resource('pengumuman', PengumumanController::class);
            Route::get('/hasil_seleksi', [App\Http\Controllers\WebRequirement\CalonPegawaiController::class, 'HasilSeleksi'])->name('calon-pegawai-hasil');
            Route::get('/download_cv/{file_cv}', [App\Http\Controllers\WebRequirement\CalonPegawaiController::class, 'getFile'])->name('calon-pegawai-cv');
            Route::get('/download_pendukung/{file_pendukung}', [App\Http\Controllers\WebRequirement\CalonPegawaiController::class, 'getFilePendukung'])->name('calon-pegawai-pendukung');
            Route::post('Calon/{id_calon_pegawai}/Status', [App\Http\Controllers\WebRequirement\CalonPegawaiController::class, 'setStatus'])->name('calon-pegawai-status');
            Route::resource('calon-pegawai', CalonPegawaiController::class);
            Route::resource('peserta-orientasi', OrientasiCalonController::class);
            Route::post('peserta-orientasi/{id_calon_pegawai}/sertifikat', [App\Http\Controllers\WebRequirement\OrientasiCalonController::class, 'Sertifikat'])->name('perserta-orientasi-seritifikat');
            Route::post('peserta-orientasi/filters', [App\Http\Controllers\WebRequirement\OrientasiCalonController::class, 'filter'])->name('orientasi-reset');
        });

    Route::prefix('Pelanggaran')
        ->group(function () {
            Route::resource('pelanggaran-pegawai', PelanggaranController::class);
        });

    Route::prefix('Pelatihan')
        ->middleware(['hrd&direktur'])
        ->group(function () {
            Route::resource('program-pelatihan', ProgramPelatihanController::class);
            Route::get('/peserta-program/{id_pelatihan}', [App\Http\Controllers\Pelatihan\ProgramPelatihanController::class, 'Peserta'])->name('program-pelatihan-peserta');
            Route::post('Program/{id_pelatihan}/Selesai', [App\Http\Controllers\Pelatihan\ProgramPelatihanController::class, 'Selesai'])->name('program-pelatihan-selesai');
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
