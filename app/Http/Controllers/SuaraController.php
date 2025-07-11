<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kandidats;
use App\Models\Kelas;
use App\Models\Suara;
use App\Models\User;
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
        $jumlahpemilih = User::where('is_admin', false)->count();
        $belummemilih = User::where('is_admin', false)->where('status_pemilih', 'belum memilih')->count();
        $sudahmemilih = User::where('is_admin', false)->where('status_pemilih', 'sudah memilih')->count();
        $jumlahkandidat = Kandidats::count();
        $suaramasuk = Suara::count();
        $kandidat = Kandidats::all();

        return view('admin.suara.index', compact('suaramasuk','jumlahkandidat','sudahmemilih','belummemilih','jumlahpemilih','jurusan', 'kelas', 'allJurusan', 'allKelas', 'selectedJurusan', 'selectedKelas', 'kandidat'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Suara $suara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suara $suara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suara $suara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suara $suara)
    {
        //
    }
}
