<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'no_wa',
        'deskripsi_keb',
        'kebutuhan_tentang',
        'id_jenisKeb',
        'id_bagian',
        'desk_video',
        'urgen',
        'kategori',
        'progres',
        'pic'
    ];
}
