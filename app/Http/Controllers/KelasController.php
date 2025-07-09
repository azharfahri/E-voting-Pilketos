<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('admin.kelas.create', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:kelas,nama',
            'id_jurusan'=> 'required|exists:jurusans,id',
        ]);
        $kelas = new Kelas();
        $kelas->nama = $request->nama;
        $kelas->id_jurusan = $request->id_jurusan;
        $kelas->save();

        return redirect()->route('admin.kelas.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        $jurusan = Jurusan::all();
        //$kelas = Kelas::FindOrFail($id);
        return view('admin.kelas.edit', compact('kelas','jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:kelas,nama,' . $kelas->id,
            'id_jurusan'=> 'required|exists:jurusans,id',
        ]);
        $kelas->nama = $request->nama;
        $kelas->id_jurusan = $request->id_jurusan;
        $kelas->save();
        return redirect()->route('admin.kelas.index')->with('success','Data Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('admin.kelas.index')->with('success','Data Telah Berhasil Dihapus');;
    }
}
