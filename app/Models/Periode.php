<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $fillable = [
        'id',
        'mulai_vote',
        'selesai_vote'
    ];
    public function Kandidat(){
        return $this->hasMany(Kandidats::class, 'id_periode');
    }
}
