<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;
    protected $table = 'pengurus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_masjid',
        'nama',
        'jabatan',
        'alamat'
    ];
}
