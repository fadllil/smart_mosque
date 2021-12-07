<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    use HasFactory;
    protected $table = 'jamaah';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'no_hp',
        'alamat'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
