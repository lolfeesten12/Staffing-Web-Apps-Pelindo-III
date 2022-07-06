<?php

namespace App\Models\Mutasi;

use App\Models\MasterData\MasterJabatan;
use App\Models\MasterData\MasterPangkat;
use App\Models\MasterData\MasterPegawai;
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
        'jenis_mutasi',
        'alasan_usulan',
        'tanggal_surat',
        'nomor_surat',
        'status_approval',
        'file'
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

    public function Pangkat()
    {
        return $this->belongsTo(MasterPangkat::class, 'id_pangkat_tujuan', 'id_pangkat');
    }
}
