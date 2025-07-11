<?php

namespace App\Http\Controllers;

use App\Models\Kandidats;
use App\Models\Suara;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahpemilih = User::where('is_admin', false)->count();
        $belummemilih = User::where('is_admin', false)->where('status_pemilih', 'belum memilih')->count();
        $sudahmemilih = User::where('is_admin', false)->where('status_pemilih', 'sudah memilih')->count();
        $jumlahkandidat = Kandidats::count();
        $suaramasuk = Suara::count();

        $kandidat = Kandidats::all();
        $kandidatData = Kandidats::select('no_urut', 'jumlah_suara')->get();

        // Total suara
        $totalsuara = $kandidatData->sum('jumlah_suara');

        // Chart Data
        $labels = $kandidatData->pluck('no_urut');
        $data = $kandidatData->pluck('jumlah_suara');

        return view('admin.index', compact(
            'jumlahpemilih',
            'jumlahkandidat',
            'suaramasuk',
            'totalsuara',
            'kandidat',
            'belummemilih',
            'sudahmemilih',
            'labels',
            'data'
        ));
    }
}
