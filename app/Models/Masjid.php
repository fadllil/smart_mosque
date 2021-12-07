<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    use HasFactory;
    protected $table = 'masjid';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'alamat',
        'status'
    ];

    public function profilMasjid(){
        return $this->hasOne(ProfilMasjid::class, 'id_masjid', 'id');
    }
}
