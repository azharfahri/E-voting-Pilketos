<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'id',
        'nama',
        'id_jurusan'
    ];
    public function Jurusan(){
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
}
