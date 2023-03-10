<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterJabatan extends Model
{
    use SoftDeletes;
    
    protected $table = "tb_master_jabatan";

    protected $primaryKey = 'id_jabatan';

    protected $fillable = [
        'nama_jabatan',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function pegawai()
    {
        return $this->hasMany(MasterPegawai::class, 'id_jabatan');
    }
}
