<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periode = Periode::all();
        return view('admin.periode.index', compact('periode'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.periode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mulai_vote' => 'required','date_format:"Y-m-d H:i:s"',
            'selesai_vote' => 'required','date_format:"Y-m-d H:i:s"',
        ]);
        $periode = new periode();
        $periode->mulai_vote = $request->mulai_vote ;
        $periode->selesai_vote = $request->selesai_vote;
        $periode->save();

        return redirect()->route('admin.periode.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periode $periode)
    {
        return view('admin.periode.edit', compact('periode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periode $periode)
    {
        $request->validate([
            'mulai_vote' => 'required','date_format:"Y-m-d H:i:s"',
            'selesai_vote' => 'required','date_format:"Y-m-d H:i:s"',
        ]);
        $periode->mulai_vote = $request->mulai_vote ;
        $periode->selesai_vote = $request->selesai_vote;
        $periode->save();

        return redirect()->route('admin.periode.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periode $periode)
    {
        $periode->delete();
        return redirect()->route('admin.periode.index')->with('success','Data Telah Berhasil Dihapus');;
    }
}
