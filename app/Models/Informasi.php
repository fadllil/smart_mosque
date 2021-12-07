<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;
    protected $table = 'informasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_masjid',
        'judul',
        'isi',
        'tanggal',
        'waktu',
        'keterangan'
    ];

    public function masjid(){
        return $this->hasOne(Masjid::class, 'id', 'id_masjid');
    }
}
