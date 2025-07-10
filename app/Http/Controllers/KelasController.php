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
        ]);

        $nama = strtolower($request->nama);
        $id_jurusan = $this->deteksiJurusan($nama);

        if (!$id_jurusan) {
            return back()->with('error', 'Nama kelas tidak valid, tidak sesuai jurusan.');
        }

        $kelas = new Kelas();
        $kelas->nama = $request->nama;
        $kelas->id_jurusan = $id_jurusan;
        $kelas->save();

        return redirect()->route('admin.kelas.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    private function deteksiJurusan($namaKelas)
    {
        $namaKelas = strtolower($namaKelas);
        $jurusans = Jurusan::all();

        foreach ($jurusans as $jurusan) {
            if ($jurusan->singkatan && str_contains($namaKelas, strtolower($jurusan->singkatan))) {
                return $jurusan->id;
            }
        }

        return null;
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
        return view('admin.kelas.edit', compact('kelas', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
{
    $request->validate([
        'nama' => 'required|string|max:255|unique:kelas,nama,' . $kelas->id,
    ]);

    $id_jurusan = $this->deteksiJurusan(strtolower($request->nama));

    if (!$id_jurusan) {
        return back()->with('error', 'Nama kelas tidak valid, tidak sesuai jurusan.');
    }

    $kelas->nama = $request->nama;
    $kelas->id_jurusan = $id_jurusan;
    $kelas->save();

    return redirect()->route('admin.kelas.index')->with('success', 'Data Berhasil Diubah');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {

        try {
            $kelas->delete();
            return redirect()->route('admin.kelas.index')->with('success', 'Data Telah Berhasil Dihapus');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
