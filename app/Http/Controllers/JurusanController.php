<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
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
        //menampilkan semua data dari model Jurusan
        $data_jurusan = Jurusan::all();
        return view('jurusan.index', compact('data_jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jurusan.create');
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
            'kode_mata_pelajaran' => 'required|unique:Jurusans|max:255',
            'nama_mata_pelajaran' => 'required',
            'semester' => 'required',
            'jurusan' => 'required',
        ]);

        $data_jurusan = new Jurusan();
        $data_jurusan->kode_mata_pelajaran = $request->kode_mata_pelajaran;
        $data_jurusan->nama_mata_pelajaran = $request->nama_mata_pelajaran;
        $data_jurusan->semester = $request->semester;
        $data_jurusan->jurusan = $request->jurusan;
        $data_jurusan->save();
        return redirect()->route('jurusan.index')
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
        $data_jurusan = Jurusan::findOrFail($id);
        return view('jurusan.show', compact('data_jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('data_jurusan'));

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
            'kode_mata_pelajaran' => 'required|max:255',
            'nama_mata_pelajaran' => 'required',
            'semester' => 'required',
            'jurusan' => 'required',
        ]);

        $data_jurusan =  Jurusan::findOrFail($id);
        $data_jurusan->kode_mata_pelajaran = $request->kode_mata_pelajaran;
        $data_jurusan->nama_mata_pelajaran = $request->nama_mata_pelajaran;
        $data_jurusan->semester = $request->semester;
        $data_jurusan->jurusan = $request->jurusan;
        $data_jurusan->save();
        return redirect()->route('jurusan.index')
            ->with('success', 'Data berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_jurusan = Jurusan::findOrFail($id);
        $data_jurusan->delete();
        return redirect()->route('jurusan.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
