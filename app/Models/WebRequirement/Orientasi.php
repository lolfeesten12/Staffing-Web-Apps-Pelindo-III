<?php

namespace App\Models\WebRequirement;

use App\Models\MasterData\MasterOrientasi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orientasi extends Model
{
    protected $table = "tb_peserta_orientasi";

    protected $primaryKey = 'id_peserta';

    protected $fillable = [
        'id_calon_pegawai',
        'id_orientasi',
        'no_sertifikat',
        'keterangan',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function CalonPegawai()
    {
        return $this->belongsTo(CalonPegawai::class, 'id_calon_pegawai', 'id_calon_pegawai');
    }

    public function MasterOrientasi()
    {
        return $this->belongsTo(MasterOrientasi::class, 'id_orientasi', 'id_orientasi');
    }
}
