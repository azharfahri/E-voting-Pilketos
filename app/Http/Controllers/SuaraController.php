<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kandidats;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SuaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $selectedJurusan = $request->jurusan;
        $selectedKelas = $request->kelas;

        // Ambil semua jurusan dan kelas (buat dropdown)
        $allJurusan = Jurusan::all();
        $allKelas = Kelas::all();

        // Buat query dasar
        $queryJurusan = Jurusan::with(['kelas.user']);
        $queryKelas = Kelas::with('user');

        // Filter jika ada jurusan
        if ($selectedJurusan) {
            $queryJurusan->where('id', $selectedJurusan);
        }

        // Filter jika ada kelas
        if ($selectedKelas) {
            $queryKelas->where('id', $selectedKelas);
        }

        $jurusan = $queryJurusan->get();
        $kelas = $queryKelas->get();

        $kandidat = Kandidats::all();

        return view('admin.suara.index', compact('jurusan', 'kelas', 'allJurusan', 'allKelas', 'selectedJurusan', 'selectedKelas', 'kandidat'));
    }



}
