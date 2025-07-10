<?php

namespace App\Http\Controllers;

use App\Models\Kandidats;
use App\Models\Kelas;
use App\Models\Periode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class KandidatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kandidat = Kandidats::all();
        return view('admin.kandidat.index', compact('kandidat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        $periode = Periode::all();
        return view('admin.kandidat.create', compact('kelas', 'periode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_urut' => 'required|integer|unique:kandidats,no_urut',
            'nama_ketua' => 'required|string|max:255',
            'nama_wakil' => 'required|string|max:255',
            'id_kelas_ketua' => 'required|exists:kelas,id',
            'id_kelas_wakil' => 'required|exists:kelas,id',
            'id_periode' => 'required|exists:periodes,id',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'foto_ketua' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'foto_wakil' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $gambarKetua = null;
        $gambarWakil = null;
        if ($request->hasFile('foto_ketua')) {
            $gambarKetua = $request->file('foto_ketua')->store('kandidats', 'public');
        }
        if ($request->hasFile('foto_wakil')) {
            $gambarWakil = $request->file('foto_wakil')->store('kandidats', 'public');
        }

        $kandidat = new Kandidats();
        $kandidat->no_urut = $request->no_urut;
        $kandidat->nama_ketua = $request->nama_ketua;
        $kandidat->nama_wakil = $request->nama_wakil;
        $kandidat->id_kelas_ketua = $request->id_kelas_ketua;
        $kandidat->id_kelas_wakil = $request->id_kelas_wakil;
        $kandidat->id_periode = $request->id_periode;
        $kandidat->visi = $request->visi;
        $kandidat->misi = $request->misi;
        $kandidat->foto_ketua = $gambarKetua;
        $kandidat->foto_wakil = $gambarWakil;
        $kandidat->save();

        return redirect()->route('admin.kandidat.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kandidats $kandidats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kandidats $kandidat)
    {
        $kelas = Kelas::all();
        $periode = Periode::all();
        return view('admin.kandidat.edit', compact('kelas', 'periode', 'kandidat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kandidats $kandidat)
    {
        $request->validate([
            'no_urut' => 'required|integer|unique:kandidats,no_urut,' . $kandidat->id,
            'nama_ketua' => 'required|string|max:255',
            'nama_wakil' => 'required|string|max:255',
            'id_kelas_ketua' => 'required|exists:kelas,id',
            'id_kelas_wakil' => 'required|exists:kelas,id',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'foto_ketua' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'foto_wakil' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        $gambarKetua = $kandidat->foto_ketua;
        $gambarWakil = $kandidat->foto_wakil;
        if ($request->hasFile('foto_ketua')) {
            if ($kandidat->foto_ketua) {
                Storage::disk('public')->delete($kandidat->foto_ketua);
            }
            $gambarKetua = $request->file('foto_ketua')->store('kandidats', 'public');
        }
        if ($request->hasFile('foto_wakil')) {
            if ($kandidat->foto_wakil) {
                Storage::disk('public')->delete($kandidat->foto_wakil);
            }
            $gambarWakil = $request->file('foto_wakil')->store('kandidats', 'public');
        }



        $kandidat->no_urut = $request->no_urut;
        $kandidat->nama_ketua = $request->nama_ketua;
        $kandidat->nama_wakil = $request->nama_wakil;
        $kandidat->id_kelas_ketua = $request->id_kelas_ketua;
        $kandidat->id_kelas_wakil = $request->id_kelas_wakil;
        $kandidat->visi = $request->visi;
        $kandidat->misi = $request->misi;
        $kandidat->foto_ketua = $gambarKetua;
        $kandidat->foto_wakil = $gambarWakil;
        $kandidat->save();

        return redirect()->route('admin.kandidat.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kandidats $kandidat)
    {
        $kandidat->delete();
        return redirect()->route('admin.kandidat.index')->with('success','Data Telah Berhasil Dihapus');
    }
}
