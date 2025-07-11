<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::create([
            'nama' => 'Rekayasa Perangkat Lunak',
            'singkatan' => 'rpl'
        ]);
        Jurusan::create([
            'nama' => 'Teknik Kendaraan Ringan',
            'singkatan' => 'tkr'
        ]);
        Jurusan::create([
            'nama' => 'Teknik Sepeda Motor',
            'singkatan' => 'tsm'
        ]);
    }
}
