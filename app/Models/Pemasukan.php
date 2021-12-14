<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'pemasukan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_masjid',
        'nama',
        'nominal',
        'keterangan'
    ];

    public function detailPemasukan()
    {
        return $this->hasMany(PemasukanDetail::class, 'id_pemasukan', 'id');
    }
}
