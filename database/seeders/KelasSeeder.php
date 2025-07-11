<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'nama' => 'X RPL 1',
            'id_jurusan' => 1,
        ]);
        Kelas::create([
            'nama' => 'X RPL 2',
            'id_jurusan' => 1,
        ]);
        Kelas::create([
            'nama' => 'X RPL 3',
            'id_jurusan' => 1,
        ]);
        Kelas::create([
            'nama' => 'XI RPL 1',
            'id_jurusan' => 1,
        ]);
        Kelas::create([
            'nama' => 'XI RPL 2',
            'id_jurusan' => 1,
        ]);
        Kelas::create([
            'nama' => 'XI RPL 3',
            'id_jurusan' => 1,
        ]);
        Kelas::create([
            'nama' => 'XII RPL 1',
            'id_jurusan' => 1,
        ]);
        Kelas::create([
            'nama' => 'XII RPL 2',
            'id_jurusan' => 1,
        ]);
        Kelas::create([
            'nama' => 'XII RPL 3',
            'id_jurusan' => 1,
        ]);
        Kelas::create([
            'nama' => 'X TKR 1',
            'id_jurusan' => 2,
        ]);
        Kelas::create([
            'nama' => 'X TKR 2',
            'id_jurusan' => 2,
        ]);
        Kelas::create([
            'nama' => 'XI TKR 1',
            'id_jurusan' => 2,
        ]);
        Kelas::create([
            'nama' => 'XI TKR 2',
            'id_jurusan' => 2,
        ]);
        Kelas::create([
            'nama' => 'XII TKR 2',
            'id_jurusan' => 2,
        ]);
        Kelas::create([
            'nama' => 'XII TKR 2',
            'id_jurusan' => 2,
        ]);
        Kelas::create([
            'nama' => 'X TSM 1',
            'id_jurusan' => 3,
        ]);
        Kelas::create([
            'nama' => 'X TSM 2',
            'id_jurusan' => 3,
        ]);
        Kelas::create([
            'nama' => 'XI TSM 1',
            'id_jurusan' => 3,
        ]);
        Kelas::create([
            'nama' => 'XI TSM 2',
            'id_jurusan' => 3,
        ]);
        Kelas::create([
            'nama' => 'XII TSM 1',
            'id_jurusan' => 3,
        ]);
        Kelas::create([
            'nama' => 'XII TSM 2',
            'id_jurusan' => 3,
        ]);
    }
}
