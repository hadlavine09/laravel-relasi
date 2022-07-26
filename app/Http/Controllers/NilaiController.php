<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan semua data dari model nilai
        $nilai = Nilai::all();
        return view('nilai.index', compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('nilai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'nis' => 'required|unique:nilais|max:255',
            'kode_mata_pelajaran' => 'required',
            'nilai' => 'required',
        ]);

        $nilai = new nilai();
        $nilai->nis = $request->nis;
        $nilai->kode_mata_pelajaran = $request->kode_mata_pelajaran;
        $nilai->nilai = $request->nilai;
        if($request->nilai >= 90 && $request->nilai <= 100){
            $grade = "A";
        }elseif ($request->nilai >= 80 && $request->nilai <= 89) {
            $grade = "B";
        }elseif ($request->nilai >= 70 && $request->nilai <= 79) {
            $grade = "C";
        }elseif ($request->nilai >= 60 && $request->nilai <= 69) {
            $grade = "D";
        }else{
            $grade ="E";
        }
        $nilai->nilai_index = $grade;
        $nilai->save();
        return redirect()->route('nilai.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nilai = Nilai::findOrFail($id);
        return view('nilai.show', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        return view('nilai.edit', compact('nilai'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi
        $validated = $request->validate([
            'nis' => 'required|max:255',
            'kode_mata_pelajaran' => 'required',
            'nilai' => 'required',
        ]);

        $nilai =  nilai::findOrFail($id);
        $nilai->nis = $request->nis;
        $nilai->kode_mata_pelajaran = $request->kode_mata_pelajaran;
        $nilai->nilai = $request->nilai;
        if($request->nilai >= 90 && $request->nilai <= 100){
            $grade = "A";
        }elseif ($request->nilai >= 80 && $request->nilai <= 89) {
            $grade = "B";
        }elseif ($request->nilai >= 70 && $request->nilai <= 79) {
            $grade = "C";
        }elseif ($request->nilai >= 60 && $request->nilai <= 69) {
            $grade = "D";
        }else{
            $grade ="E";
        }
        $nilai->nilai_index = $grade;
        $nilai->save();
        return redirect()->route('nilai.index')
            ->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();
        return redirect()->route('nilai.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
