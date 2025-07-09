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

    protected static function booted()
    {
        static::deleting(function ($jurusan) {
            if ($jurusan->kelas()->count() > 0) {
                throw new \Exception("Jurusan masih digunakan oleh data kelas, tidak bisa dihapus.");
            }
        });
    }
}
