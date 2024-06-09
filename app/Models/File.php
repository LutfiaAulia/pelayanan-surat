<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'files';
    protected $primaryKey = 'id_file';
    public $timestamps = true;

    protected $fillable = [
        'id_pengajuan',
        'file_path',
        'file_type',
    ];
}
