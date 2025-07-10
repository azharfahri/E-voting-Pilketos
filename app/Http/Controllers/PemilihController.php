<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class PemilihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemilih = User::where('is_admin', false)->get();
        return view('admin.pemilih.index', compact('pemilih'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.pemilih.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|numeric|digits:10|unique:users,nis',
            'id_kelas' => 'required|exists:kelas,id',
            'password' => 'required|string|min:8',
        ]);
        $pemilih = new User();
        $pemilih->nama = $request->nama;
        $pemilih->nis = $request->nis;
        $pemilih->id_kelas = $request->id_kelas;
        $pemilih->password = $request->password;
        $pemilih->save();

        return redirect()->route('admin.pemilih.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $pemilih)
    {
        $kelas = Kelas::all();
        return view('admin.pemilih.edit', compact('kelas' , 'pemilih'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $pemilih)
    {
        $request->validate([
            'nama' => 'required|string|max:255,' . $pemilih->id,
            'nis' => 'required|numeric|digits:10|unique:users,nis,' . $pemilih->id,
            'id_kelas' => 'required|exists:kelas,id',

        ]);
        $pemilih->nama = $request->nama;
        $pemilih->nis = $request->nis;
        $pemilih->id_kelas = $request->id_kelas;
        $pemilih->save();

        return redirect()->route('admin.pemilih.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $pemilih)
    {
        try {
            $pemilih->delete();
        return redirect()->route('admin.pemilih.index')->with('success','Data Telah Berhasil Dihapus');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
