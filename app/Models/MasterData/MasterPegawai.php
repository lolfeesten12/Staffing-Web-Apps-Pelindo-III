<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPegawai extends Model
{
    protected $table = "tb_master_pegawai";

    protected $primaryKey = 'id_pegawai';

    protected $fillable = [
        'id_unit_kerja',
        'id_jabatan',
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
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function Jabatan()
    {
        return $this->belongsTo(MasterJabatan::class, 'id_jabatan', 'id_jabatan');
    }

    public function UnitKerja()
    {
        return $this->belongsTo(MasterUnitKerja::class, 'id_unit_kerja', 'id_unit_kerja');
    }
}
