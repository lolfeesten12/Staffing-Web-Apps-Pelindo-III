<?php

namespace App\Models\MasterData;
use Illuminate\Database\Eloquent\Model;

class MasterOrientasi extends Model
{
    protected $table = "tb_master_orientasi";

    protected $primaryKey = 'id_orientasi';

    protected $fillable = [
        'tanggal_orientasi',
        'periode_orientasi'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;
}
