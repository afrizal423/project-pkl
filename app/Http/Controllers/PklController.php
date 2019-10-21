<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pkl;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PklController extends Controller
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
    public function index()
    {
        $mhs = DB::table('data_pkl')->orderBy('id', 'asc')->paginate(10);
        return view('admin.pkl.index', ['mhs' => $mhs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pkl.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'npm' => 'required',
            'jurusan' => 'required',
            'judulpkl' => 'required',
            'namainstansi' => 'required',
            'alamatinstansi' => 'required'
        ]);
	    $mhs = new \App\Pkl();
        $mhs->nama = $request->get('nama');
        $mhs->npm = $request->get('npm');
        $mhs->jurusan = $request->get('jurusan');
        $mhs->judulpkl = $request->get('judulpkl');
        $mhs->namainstansi = $request->get('namainstansi');
        $mhs->alamatinstansi = $request->get('alamatinstansi');

        $mhs->save();

        if($request->get('action') == 'PUBLISH'){
            return redirect()
                  ->route('pkl.create')
                  ->with('status', 'Data Sukses ditambahkan dalam database');
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
        $mhs = Pkl::findOrFail($id);
        return view('admin.pkl.editpkl', compact('mhs'));
        //echo json_encode($mhs);
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
        $this->validate($request,[
            'nama' => 'required',
            'npm' => 'required',
            'jurusan' => 'required',
            'judulpkl' => 'required',
            'namainstansi' => 'required',
            'alamatinstansi' => 'required'
        ]);
        $mhs = Pkl::findOrFail($id);
        $mhs->nama = $request->get('nama');
        $mhs->npm = $request->get('npm');
        $mhs->jurusan = $request->get('jurusan');
        $mhs->judulpkl = $request->get('judulpkl');
        $mhs->namainstansi = $request->get('namainstansi');
        $mhs->alamatinstansi = $request->get('alamatinstansi');

        $mhs->save();

        if($request->get('action') == 'PUBLISH'){
            return redirect()
                  ->route('pkl.edit', ['id'=>$mhs->id])
                  ->with('status', 'Data Sukses diupdate dalam database');
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
        $mhs = Pkl::findOrFail($id);
        $mhs->delete();

        return redirect('/admin/pkl')->with('success', 'Data PKL is successfully deleted');
    }
}
