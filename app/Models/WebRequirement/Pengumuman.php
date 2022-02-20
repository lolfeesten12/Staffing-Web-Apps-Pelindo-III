<?php

namespace App\Models\WebRequirement;

use App\Models\MasterData\MasterJabatan;
use App\Models\MasterData\MasterUnitKerja;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = "tb_pengumuman";

    protected $primaryKey = 'id_pengumuman';

    protected $fillable = [
        'id_jabatan',
        'job_description',
        'job_requirement',
        'job_type',
        'penempatan',
        'kisaran_gaji',
        'job_years_experience',
        'tanggal_mulai',
        'tanggal_selesai',
        'qualification',
        'nama_pengumuman'
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

  
}
