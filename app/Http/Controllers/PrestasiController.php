<?php

namespace App\Http\Controllers;

use App\persma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PrestasiController extends Controller
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
        $mhs = DB::table('tbl_prestasi')->orderBy('id', 'asc')->paginate(10);
        return view('admin.prestasi.index', ['mhs' => $mhs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.prestasi.create');
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
    		'nama_mhs' => 'required',
            'jurusan' => 'required',
            'nama_kegiatan' => 'required',
            'waktu_kegiatan' => 'required',
            'prestasi_kejuaraan' => 'required',
            'kelompok' => 'required'
        ]);
	    $mhs = new \App\Persma();
        $mhs->nama_mhs = $request->get('nama_mhs');
        $mhs->jurusan = $request->get('jurusan');
        $mhs->nama_kegiatan = $request->get('nama_kegiatan');
        $mhs->waktu_kegiatan = $request->get('waktu_kegiatan');
        $mhs->prestasi_kejuaraan = $request->get('prestasi_kejuaraan');
        $mhs->kelompok = $request->get('kelompok');

        $mhs->save();

        if($request->get('action') == 'PUBLISH'){
            return redirect()
                  ->route('prestasi.create')
                  ->with('status', 'Data Sukses ditambahkan dalam database <button onclick="window.history.back()">Go Back</button>');
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
        $mhs = Persma::findOrFail($id);
        $mhs->delete();

        return redirect('/admin/prestasi')->with('success', 'Prestasi is successfully deleted');
    }
}
