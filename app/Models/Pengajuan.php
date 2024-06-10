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
        'id_jenis',
        'tanggal_pengajuan',
        'status_pengajuan',
        'alasan_penolakan',
        'id_admin',
        'file_path',
    ];

    public function files()
    {
        return $this->hasMany(File::class, 'id_pengajuan');
    }
}
