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
    public function search(Request $request)
    {
    if($request->ajax())
    {
        $output="";
        //$products=DB::table('tbl_mahasiswa')->where('nama','LIKE','%'.$request->search."%")->get();
        $mhs = DB::table('tbl_prestasi')
                    ->where('nama_kegiatan', 'like', '%'.$request->search.'%')
                    ->orWhere('nama_mhs', 'like', '%'.$request->search.'%')
                    ->orWhere('jurusan', 'like', '%'.$request->search.'%')
                    ->orWhere('prestasi_kejuaraan', 'like', '%'.$request->search.'%')
                    ->orWhere('kelompok', 'like', '%'.$request->search.'%')
                    ->orderBy('id', 'asc')
                    ->get();
        if($mhs)
        {
             return view('admin.prestasi.search', compact('mhs'))->render();
        // foreach ($mhs as $key => $product) {
        // $output.='<tr>'.
        // '<td>'.$product->npm.'</td>'.
        // '<td>'.$product->nama.'</td>'.
        // '<td>'.$product->jurusan.'</td>'.
        // '<td>'.$product->asal.'</td>'.
        // '</tr>';
        // }
        return Response($output);
        } else {
            echo "<script>console.log('hahal');</script>";
        }
    }
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
	    $mhs = new \App\persma();
        $mhs->nama_mhs = $request->get('nama_mhs');
        $mhs->jurusan = $request->get('jurusan');
        $mhs->nama_kegiatan = $request->get('nama_kegiatan');
        $mhs->waktu_kegiatan = $request->get('waktu_kegiatan');
        $mhs->prestasi_kejuaraan = $request->get('prestasi_kejuaraan');
        $mhs->kelompok = $request->get('kelompok');

        $mhs->save();

        if($request->get('action') == 'PUBLISH'){
            return redirect()
                  ->route('prestasi.index')
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
