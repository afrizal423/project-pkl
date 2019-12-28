<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tugasakhir;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TugasakhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('revalidate');
    }
    public function index()
    {
        $mhs = DB::table('data_tugasakhir')->orderBy('id', 'asc')->paginate(10);
        return view('admin.tugasakhir.index', ['mhs' => $mhs]);
    }
    public function search(Request $request)
    {
    if($request->ajax())
    {
        $output="";
        //$products=DB::table('tbl_mahasiswa')->where('nama','LIKE','%'.$request->search."%")->get();
        $mhs = DB::table('data_tugasakhir')
                    ->where('npm', 'like', '%'.$request->search.'%')
                    ->orWhere('nama', 'like', '%'.$request->search.'%')
                    ->orWhere('jurusan', 'like', '%'.$request->search.'%')
                    ->orWhere('judul', 'like', '%'.$request->search.'%')
                    ->orWhere('dospem1', 'like', '%'.$request->search.'%')
                    ->orWhere('dospem2', 'like', '%'.$request->search.'%')
                    ->orderBy('npm', 'asc')
                    ->get();
        if($mhs)
        {
             return view('admin.tugasakhir.search', compact('mhs'))->render();
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
        return view('admin.tugasakhir.create');
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
            'nama' => 'required',
            'npm' => 'required',
            'jurusan' => 'required',
            'judul' => 'required',
            'dospem1' => 'required',
            'dospem2' => 'required'
        ]);
	    $mhs = new \App\Tugasakhir();
        $mhs->nama = $request->get('nama');
        $mhs->npm = $request->get('npm');
        $mhs->jurusan = $request->get('jurusan');
        $mhs->judul = $request->get('judul');
        $mhs->dospem1 = $request->get('dospem1');
        $mhs->dospem2 = $request->get('dospem2');

        $mhs->save();

        if($request->get('action') == 'PUBLISH'){
            return redirect()
                  ->route('ta.index')
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
        $mhs = Tugasakhir::findOrFail($id);
        return view('admin.tugasakhir.editta', compact('mhs'));
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
            'judul' => 'required',
            'dospem1' => 'required',
            'dospem2' => 'required'
        ]);
        $mhs = Tugasakhir::findOrFail($id);
        $mhs->nama = $request->get('nama');
        $mhs->npm = $request->get('npm');
        $mhs->jurusan = $request->get('jurusan');
        $mhs->judul = $request->get('judul');
        $mhs->dospem1 = $request->get('dospem1');
        $mhs->dospem2 = $request->get('dospem2');

        $mhs->save();

        if($request->get('action') == 'PUBLISH'){
            return redirect()
                  ->route('ta.index')
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
        $mhs = Tugasakhir::findOrFail($id);
        $mhs->delete();

        return redirect('/admin/ta')->with('success', 'Data TA is successfully deleted');
    }
}
