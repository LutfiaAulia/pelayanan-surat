<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POT extends Model
{
    use HasFactory;

    protected $table = 'surat_pot';
    protected $primaryKey = 'id_pot';
    public $timestamps = true;

    protected $fillable = [
        'id_pengajuan',
        'nama',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'pekerjaan',
        'alamat',
        'penghasilan',
        'alasan',
        'filekk'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan');
    }

}
