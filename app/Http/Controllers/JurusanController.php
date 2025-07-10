<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('admin.jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:jurusans,nama',
            'singkatan' => 'required|string|max:10|unique:jurusans,singkatan',
        ]);
        $jurusan = new Jurusan();
        $jurusan->nama = $request->nama ;
        $jurusan->singkatan = $request->singkatan;
        $jurusan->save();

        return redirect()->route('admin.jurusan.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:jurusans,nama,'. $jurusan->id,
            'singkatan' => 'required|string|max:10|unique:jurusans,singkatan,' . $jurusan->id,
        ]);

        $jurusan->nama = $request->nama ;
        $jurusan->singkatan = $request->singkatan;
        $jurusan->save();

        return redirect()->route('admin.jurusan.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        try {
            $jurusan->delete();
            return redirect()->route('admin.jurusan.index')->with('success','Data Telah Berhasil Dihapus');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
