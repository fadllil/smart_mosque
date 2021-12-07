<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalImam extends Model
{
    use HasFactory;
    protected $table = 'jadwal_imam';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_masjid',
        'hari'
    ];

    public function detailImam(){
        return $this->hasMany(Imam::class, 'id_jadwal_imam', 'id');
    }
}
