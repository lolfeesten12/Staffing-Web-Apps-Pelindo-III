<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJabatan extends Model
{
    protected $table = "tb_master_jabatan";

    protected $primaryKey = 'id_jabatan';

    protected $fillable = [
        'nama_jabatan',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function pegawai()
    {
        return $this->hasMany(MasterPegawai::class, 'id_jabatan');
    }
}
