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
        'alasan'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // // Contoh hubungan hasMany
    // public function someRelatedModels()
    // {
    //     return $this->hasMany(SomeRelatedModel::class);
    // }
}
