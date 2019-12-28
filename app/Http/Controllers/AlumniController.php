<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AlumniController extends Controller
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
        //
        $mhs = DB::table('tbl_mahasiswa')->where('status','Alumni')->orderBy('npm', 'asc')->paginate(10);
        return view('admin.alumni.index', ['mhs' => $mhs]);
    }
    public function search(Request $request)
    {
    if($request->ajax())
    {
        $output="";
        //$products=DB::table('tbl_mahasiswa')->where('nama','LIKE','%'.$request->search."%")->get();
        $mhs = DB::table('tbl_mahasiswa')
                    ->where('status','=','Alumni')
                    ->orWhere('npm', 'like', '%'.$request->search.'%')
                    ->orWhere('nama', 'like', '%'.$request->search.'%')
                    ->orderBy('npm', 'asc')
                    ->get();
        if($mhs)
        {
             return view('admin.mahasiswa.search', compact('mhs'))->render();
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
    }
}
