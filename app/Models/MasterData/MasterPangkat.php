<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterPangkat extends Model
{
    use SoftDeletes;

    protected $table = "tb_master_pangkat";

    protected $primaryKey = 'id_pangkat';

    protected $fillable = [
        'nama_pangkat',
        'id_jabatan',
        'golongan',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Jabatan()
    {
        return $this->belongsTo(MasterJabatan::class, 'id_jabatan', 'id_jabatan');
    }
}
