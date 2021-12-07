<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMasjid extends Model
{
    use HasFactory;
    protected $table = 'admin_masjid';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'id_masjid',
        'no_hp',
        'alamat',
        'jabatan'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function masjid(){
        return $this->hasOne(Masjid::class, 'id', 'id_masjid');
    }
}
