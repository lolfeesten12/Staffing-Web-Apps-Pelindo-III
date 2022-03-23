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
        'status_nilai',
        'nilai_psikotes',
        'nilai_keahlian',
        'nilai_wawancara',
        'nilai_total',
        'rata_rata',
        'pendidikan_terakhir',
        'jurusan'
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

    public function PesertaOrientasi()
    {
        return $this->belongsTo(Orientasi::class, 'id_calon_pegawai', 'id_calon_pegawai');
    }
}
