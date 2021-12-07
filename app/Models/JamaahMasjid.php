<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamaahMasjid extends Model
{
    use HasFactory;
    protected $table = 'jamaah_masjid';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'id_masjid'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function jamaah(){
        return $this->hasOne(Jamaah::class, 'id_user', 'id_user');
    }
}
