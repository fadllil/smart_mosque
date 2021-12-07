<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imam extends Model
{
    use HasFactory;
    protected $table = 'imam';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_jadwal_imam',
        'jadwal',
        'nama'
    ];
}
