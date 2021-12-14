<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_masjid',
        'nama',
        'jenis',
        'status_iuran',
        'status',
        'waktu',
        'tanggal'
    ];

    public function anggota()
    {
        return $this->hasMany(KegiatanAnggota::class, 'id_kegiatan', 'id');
    }
    public function iuran()
    {
        return $this->hasMany(KegiatanIuran::class, 'id_kegiatan', 'id');
    }
}
