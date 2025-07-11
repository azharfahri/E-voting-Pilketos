<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suara extends Model
{
    use HasFactory;

    protected $table = 'votes';

    protected $fillable = ['id_user', 'id_kandidat'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kandidat()
    {
        return $this->belongsTo(Kandidats::class, 'id_kandidat');
    }
}
