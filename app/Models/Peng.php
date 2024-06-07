<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peng extends Model
{
    use HasFactory;

    protected $table = 'surat_peng';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'nik',
        'penghasilan',
        'alasan',
        'filekk'
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
