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
    public function Jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    //relasi ke user
    public function user()
    {
        return $this->hasMany(User::class, 'id_kelas');
    }

    //relasi ke kelas ketua
    public function kandidatKetua()
    {
        return $this->hasMany(Kandidats::class, 'id_kelas_ketua');
    }

    //relasi ke kelas wakil
    public function kandidatWakil()
    {
        return $this->hasMany(Kandidats::class, 'id_kelas_wakil');
    }


    protected static function booted()
    {
        static::deleting(function ($kelas) {
            if ($kelas->user()->count() > 0 || $kelas->kandidatKetua()->count() > 0 || $kelas->kandidatWakil()->count() > 0) {
                throw new \Exception("Kelas masih digunakan oleh data lain, tidak bisa dihapus.");
            }
        });
    }
}
