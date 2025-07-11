<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidats;
use App\Models\Suara;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::guard('user')->user();

        if ($user->status_pemilih === 'sudah memilih') {
            return view('user.dashboard', ['sudah_memilih' => true]);
        }

        $kandidats = Kandidats::all();
        return view('user.dashboard', [
            'sudah_memilih' => false,
            'kandidats' => $kandidats
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

        return redirect()->route('user.dashboard')->with('success', 'Terima kasih, suara kamu berhasil dikirim yaa');
    }
}
