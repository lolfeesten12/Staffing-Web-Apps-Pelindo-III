<?php

namespace App\Models\WebRequirement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonPegawai extends Model
{
    protected $table = "tb_calon_pegawai";

    protected $primaryKey = 'id_calon_pegawai';

    protected $fillable = [
        'id_pengumuman',
        'nama_lengkap',
        'nama_panggilan',
        'email',
        'no_telp',
        'alamat_lengkap',
        'file_cv',
        'file_pendukung',
        'status_calon',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function Pengumuman()
    {
        return $this->belongsTo(Pengumuman::class, 'id_pengumuman', 'id_pengumuman');
    }
}
