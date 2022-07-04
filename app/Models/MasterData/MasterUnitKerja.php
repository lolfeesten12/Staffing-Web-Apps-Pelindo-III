<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterUnitKerja extends Model
{
    use SoftDeletes;
    
    protected $table = "tb_master_unit_kerja";

    protected $primaryKey = 'id_unit_kerja';

    protected $fillable = [
        'unit_kerja',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function pegawai()
    {
        return $this->hasMany(MasterPegawai::class, 'id_unit_kerja');
    }
}
