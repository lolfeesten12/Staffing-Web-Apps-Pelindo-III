<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterSubUnit extends Model
{
    use SoftDeletes;

    protected $table = "tb_master_sub_unit";

    protected $primaryKey = 'id_sub_unit';

    protected $fillable = [
        'id_unit_kerja',
        'nama_sub_unit',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function UnitKerja()
    {
        return $this->belongsTo(MasterUnitKerja::class, 'id_unit_kerja', 'id_unit_kerja');
    }
}
