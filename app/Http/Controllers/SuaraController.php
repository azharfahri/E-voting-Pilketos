<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kandidats;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SuaraController extends Controller
{
    public function index(Request $request)
    {
        $selectedJurusan  = $request->jurusan;
        $selectedJenjang  = $request->jenjang;
        $selectedKelas    = $request->kelas;

        // ambil kelas untuk dropdown berdasarkan jurusan dan jenjang
        // 1. Ambil jenjang dari semua kelas (tidak terfilter)
        $jenjangList = Kelas::all()->map(function ($item) {
            return strtoupper(strtok($item->nama, ' '));
        })->unique()->sort()->values();

        // 2. Baru filter kelas seperti biasa
        $kelasQuery = Kelas::query();

        if ($selectedJurusan) {
            $kelasQuery->where('id_jurusan', $selectedJurusan);
        }

        if ($selectedJenjang) {
            $kelasQuery->whereRaw("UPPER(nama) LIKE ?", [strtoupper($selectedJenjang) . ' %']);
        }

        $filteredKelas = $kelasQuery->orderBy('nama')->get();


        // jurusan & kelas untuk rekap
        $queryJurusan = Jurusan::with(['kelas.user']);
        $queryKelas   = Kelas::with('user');

        if ($selectedJurusan) {
            $queryJurusan->where('id', $selectedJurusan);
        }

        if (empty($selectedKelas)) {
            $queryKelas->where(function ($q) use ($selectedJenjang, $selectedJurusan) {
                if ($selectedJenjang) {
                    $q->whereRaw("UPPER(nama) LIKE ?", [strtoupper($selectedJenjang) . ' %']);
                }
                if ($selectedJurusan) {
                    $q->where('id_jurusan', $selectedJurusan);
                }
            });
        } else {
            $queryKelas->where('id', $selectedKelas);
        }


        return view('admin.suara.index', [
            'jurusan'         => $queryJurusan->get(),
            'kelas'           => $queryKelas->get(),
            'allJurusan'      => Jurusan::all(),
            'allKelas'        => $filteredKelas,
            'jenjangList'     => $jenjangList,
            'selectedJurusan' => $selectedJurusan,
            'selectedJenjang' => $selectedJenjang,
            'selectedKelas'   => $selectedKelas,
            'kandidat'        => Kandidats::all(),
        ]);
    }

    public function getKelas(Request $request)
    {
        $jenjang = $request->jenjang;
        $jurusan = $request->jurusan;

        if (!$jenjang || !$jurusan) return response()->json([]);

        $kelas = Kelas::where('id_jurusan', $jurusan)
            ->whereRaw("UPPER(nama) LIKE ?", [strtoupper($jenjang) . ' %'])
            ->orderBy('nama')
            ->get();


        return response()->json($kelas);
    }
}
