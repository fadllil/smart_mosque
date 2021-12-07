<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;
    protected $table = 'inventaris';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_masjid',
        'nama',
        'jumlah',
        'keterangan'
    ];
}
