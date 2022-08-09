<?php

namespace App\Models\MasterData;

use App\Models\Riwayat\RiwayatCuti;
use App\Models\Riwayat\RiwayatKeluarga;
use App\Models\Riwayat\RiwayatPelanggaran;
use App\Models\Riwayat\RiwayatPendidikan;
use App\Models\Riwayat\RiwayatPrestasi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterPegawai extends Model
{
    protected $table = "tb_master_pegawai";

    protected $primaryKey = 'id_pegawai';

    protected $fillable = [
        'id_unit_kerja',
        'id_jabatan',
        'id_pangkat',
        'nama_pegawai',
        'nama_panggilan',
        'nik_pegawai',
        'npwp_pegawai',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'no_telp',
        'agama',
        'alamat',
        'kota_asal',
        'foto_pegawai',
        'role',
        'id_penempatan',
        'id_sub_unit'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function Jabatan()
    {
        return $this->belongsTo(MasterJabatan::class, 'id_jabatan', 'id_jabatan')->withTrashed();;
    }

    public function Penempatan()
    {
        return $this->belongsTo(MasterPenempatan::class, 'id_penempatan', 'id_penempatan');
    }

    public function Pangkat()
    {
        return $this->belongsTo(MasterPangkat::class, 'id_pangkat', 'id_pangkat')->withTrashed();
    }

    public function UnitKerja()
    {
        return $this->belongsTo(MasterUnitKerja::class, 'id_unit_kerja', 'id_unit_kerja')->withTrashed();
    }

    public function SubUnit()
    {
        return $this->belongsTo(MasterSubUnit::class, 'id_sub_unit', 'id_sub_unit')->withTrashed();
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'id_pegawai', 'id_pegawai');
    }

    public function RiwayatKeluarga()
    {
        return $this->hasMany(RiwayatKeluarga::class, 'id_pegawai', 'id_pegawai');
    }

    public function RiwayatPendidikan()
    {
        return $this->hasMany(RiwayatPendidikan::class, 'id_pegawai', 'id_pegawai');
    }

    public function RiwayatPrestasi()
    {
        return $this->hasMany(RiwayatPrestasi::class, 'id_pegawai', 'id_pegawai');
    }

    public function RiwayatCuti()
    {
        return $this->hasMany(RiwayatCuti::class, 'id_pegawai', 'id_pegawai');
    }

    public function RiwayatPelanggaran()
    {
        return $this->hasMany(RiwayatPelanggaran::class, 'id_pegawai', 'id_pegawai');
    }

    // public static function getId()
    // {
    //     $getId = DB::table('tb_master_pegawai')->orderBy('id_pegawai', 'DESC')->take(1)->get();
    //     if (count($getId) > 0) return $getId;
    //     return (object)[
    //         (object)[
    //             'id_pegawai' => 0
    //         ]
    //     ];
    // }
}
