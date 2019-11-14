<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$mhs = Mahasiswa::all();
        $mhs = DB::table('tbl_mahasiswa')->orderBy('npm', 'asc')->paginate(10);
        return view('admin.mahasiswa.index', ['mhs' => $mhs]);
    }

    public function create()
    {
        return view('admin.mahasiswa.createmhs');
    }
    public function lihat()
    {
        return view('admin.mahasiswa.createmhs');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
    		'npm' => 'required',
            'nama' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'asal' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'status' => 'required'
        ]);
	    $mhs = new \App\Mahasiswa();
        $mhs->npm = $request->get('npm');
        $mhs->nama = $request->get('nama');
        $mhs->jurusan = $request->get('jurusan');
        $mhs->angkatan = $request->get('angkatan');
        $mhs->asal = $request->get('asal');
        $mhs->jenis_kelamin = $request->get('jenis_kelamin');
        $mhs->tgl_lahir = $request->get('tgl_lahir');
        $mhs->status = $request->get('status');

        $mhs->save();

        if($request->get('action') == 'PUBLISH'){
            return redirect()
                  ->route('mahasiswa.index')
                  ->with('status', 'Mahasiswa Sukses ditambahkan dalam database <button onclick="window.history.back()">Go Back</button>');
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mhs = Mahasiswa::findOrFail($id);

        return view('admin.mahasiswa.editmhs', compact('mhs'));
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
        //
        $mhs = \App\Mahasiswa::findOrFail($id);
        $this->validate($request,[
    		'npm' => 'required',
            'nama' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'asal' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'status' => 'required'

        ]);
        $mhs->npm = $request->get('npm');
        $mhs->nama = $request->get('nama');
        $mhs->jurusan = $request->get('jurusan');
        $mhs->angkatan = $request->get('angkatan');
        $mhs->asal = $request->get('asal');
        $mhs->jenis_kelamin = $request->get('jenis_kelamin');
        $mhs->tgl_lahir = $request->get('tgl_lahir');
        $mhs->status = $request->get('status');


        $mhs->save();

        if($request->get('action') == 'PUBLISH'){
            return redirect()
                  ->route('mahasiswa.index')
                  ->with('status', 'Mahasiswa Sukses diupdate dalam database');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->delete();

        return redirect('/admin/mahasiswa')->with('success', 'Mahasiswa is successfully deleted');
    }
}
