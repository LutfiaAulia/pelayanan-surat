<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKU extends Model
{
    use HasFactory;

    protected $table = 'surat_sku';
    protected $primaryKey = 'id_sku';
    public $timestamps = true;

    protected $fillable = [
        'id_pengajuan',
        'nama',
        'nik',
        'tgl_lahir',
        'agama',
        'status',
        'pekerjaan',
        'alamat',
        'usaha',
        'alasan',
        'filektp',
        'fotousaha'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan');
    }

}
