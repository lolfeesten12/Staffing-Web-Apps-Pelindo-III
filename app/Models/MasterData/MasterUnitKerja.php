<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterUnitKerja extends Model
{
    protected $table = "tb_master_unit_kerja";

    protected $primaryKey = 'id_unit_kerja';

    protected $fillable = [
        'unit_kerja',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function pegawai()
    {
        return $this->hasMany(MasterPegawai::class, 'id_unit_kerja');
    }
}
