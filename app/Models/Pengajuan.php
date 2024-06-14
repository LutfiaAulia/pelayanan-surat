<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';
    public $timestamps = true;

    protected $fillable = [
        'id_user',
        'tanggal_pengajuan',
        'status_pengajuan',
        'alasan_penolakan',
        'id_admin',
    ];

    // public function suratSktm()
    // {
    //     return $this->hasOne(SKTM::class, 'id_pengajuan');
    // }

    // public function suratPot()
    // {
    //     return $this->hasOne(POT::class, 'id_pengajuan');
    // }

    // public function suratSku()
    // {
    //     return $this->hasOne(SKU::class, 'id_pengajuan');
    // }
}
