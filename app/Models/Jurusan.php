<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = [
        'id',
        'nama',
    ];
    public function Kelas(){
        return $this->hasMany(Kelas::class, 'id_jurusan');
    }
}
