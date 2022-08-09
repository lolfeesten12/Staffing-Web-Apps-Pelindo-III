<?php

namespace App\Models\Mutasi;

use App\Models\MasterData\MasterJabatan;
use App\Models\MasterData\MasterPangkat;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterPenempatan;
use App\Models\MasterData\MasterSubUnit;
use App\Models\MasterData\MasterUnitKerja;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanMutasi extends Model
{
    protected $table = "tb_usulan_mutasi";

    protected $primaryKey = 'id_usulan';

    protected $fillable = [
        'id_pegawai',
        'id_pengusul',
        'id_divisi_tujuan',
        'id_pangkat_tujuan',
        'id_jabatan_tujuan',
        'id_sub_unit_tujuan',
        'jenis_mutasi',
        'alasan_usulan',
        'tanggal_surat',
        'nomor_surat',
        'status_approval',
        'file',
        'keterangan_approval',
        'nomor_sk',
        'tanggal_sk',
        'id_pejabat',
        'file_sk',
        'id_penempatan'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function Pegawai()
    {
        return $this->belongsTo(MasterPegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function Penempatan()
    {
        return $this->belongsTo(MasterPenempatan::class, 'id_penempatan', 'id_penempatan');
    }

    public function Pejabat()
    {
        return $this->belongsTo(MasterPegawai::class, 'id_pejabat', 'id_pegawai');
    }

    public function Pengusul()
    {
        return $this->belongsTo(MasterPegawai::class, 'id_pengusul', 'id_pegawai');
    }

    public function Jabatan()
    {
        return $this->belongsTo(MasterJabatan::class, 'id_jabatan_tujuan', 'id_jabatan');
    }

    public function Unit()
    {
        return $this->belongsTo(MasterUnitKerja::class, 'id_divisi_tujuan', 'id_unit_kerja');
    }

    public function SubUnit()
    {
        return $this->belongsTo(MasterSubUnit::class, 'id_sub_unit_tujuan', 'id_sub_unit');
    }

    public function Pangkat()
    {
        return $this->belongsTo(MasterPangkat::class, 'id_pangkat_tujuan', 'id_pangkat');
    }

    public function scopeActive($query)
    {
        return $query->where('status_approval', '=', 'Dimutasi')->orWhere('status_approval','=','Terima');
    }

    public function scopePangkat($query)
    {
        return $query->where('jenis_mutasi', '=', 'Promosi Pangkat')->orWhere('jenis_mutasi','=','Demosi Pangkat');
    }

    public function scopeInternal($query)
    {
        return $query->where('jenis_mutasi', '=', 'Mutasi Internal')->orWhere('jenis_mutasi','=','Resign')->orWhere('jenis_mutasi','=','Mutasi Eksternal');
    }

    public function scopeJabatan($query)
    {
        return $query->where('jenis_mutasi', '=', 'Promosi Jabatan')->orWhere('jenis_mutasi','=','Demosi Jabatan');
    }
}
