<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilMasjid extends Model
{
    use HasFactory;
    protected $table = 'profil_masjid';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_masjid',
        'tipe',
        'luas_tanah',
        'status_tanah',
        'luas_bangunan',
        'tahun_berdiri'
    ];
}
