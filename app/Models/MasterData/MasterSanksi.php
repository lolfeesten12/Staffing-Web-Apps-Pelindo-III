<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSanksi extends Model
{
    protected $table = "tb_master_sanksi";

    protected $primaryKey = 'id_sanksi';

    protected $fillable = [
        'nama_sanksi',
        'keterangan',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;
}
