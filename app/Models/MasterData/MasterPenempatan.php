<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPenempatan extends Model
{
    protected $table = "tb_master_penempatan";

    protected $primaryKey = 'id_penempatan';

    protected $fillable = [
        'nama_penempatan',
        'regional',
        'jenis_kantor'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;
}
