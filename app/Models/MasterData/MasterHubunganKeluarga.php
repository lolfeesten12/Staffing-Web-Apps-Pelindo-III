<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterHubunganKeluarga extends Model
{
    protected $table = "tb_master_hub_keluarga";

    protected $primaryKey = 'id_hub_keluarga';

    public $timestamps = true;

}
