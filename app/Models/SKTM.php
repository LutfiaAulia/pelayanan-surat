<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKTM extends Model
{
    use HasFactory;

    protected $table = 'surat_sktm';
    protected $primaryKey = 'id_sktm';
    public $timestamps = true;

    protected $fillable = [
        'id_pengajuan',
        'nama',
        'nik',
        'tgl_lahir',
        'agama',
        'pekerjaan',
        'alamat',
        'alasan',
        'filektp',
        'filekk'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan');
    }
}
