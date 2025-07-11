<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidats;
use App\Models\Suara;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::guard('user')->user();

        $sudah_memilih = $user->status_pemilih === 'sudah memilih';
        $kandidats = Kandidats::all();

        $labels = [];
        $dataSuara = [];

        foreach ($kandidats as $kandidat) {
            $labels[] = 'Paslon No. ' . $kandidat->no_urut;
            $dataSuara[] = $kandidat->jumlah_suara;
        }


        return view('user.dashboard', [
            'user' => $user,
            'sudah_memilih' => $sudah_memilih,
            'kandidats' => $kandidats,
            'chart_labels' => $labels,
            'chart_data' => $dataSuara,
        ]);
    }

    public function vote($id)
    {
        $user = Auth::guard('user')->user();

        if ($user->status_pemilih === 'sudah memilih') {
            return redirect()->route('user.dashboard');
        }

        Suara::create([
            'id_user' => $user->id,
            'id_kandidat' => $id,
        ]);

        $user->update(['status_pemilih' => 'sudah memilih']);

        $kandidat = Kandidats::findOrFail($id);
        $kandidat->increment('jumlah_suara');


        return redirect()->route('user.dashboard')->with('success', 'Terima kasih, suara kamu berhasil dikirim.');
    }
}
