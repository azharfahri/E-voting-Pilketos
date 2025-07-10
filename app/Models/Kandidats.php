<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kandidats extends Model
{
    protected $fillable = [
        'no_urut',
        'nama_ketua',
        'nama_wakil',
        'id_kelas_ketua',
        'id_kelas_wakil',
        'id_periode',
        'visi',
        'misi',
        'foto_ketua',
        'foto_wakil',
        'jumlah_suara'
    ];

    public function kelasKetua()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas_ketua');
    }

    public function kelasWakil()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas_wakil');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode');
    }
}
