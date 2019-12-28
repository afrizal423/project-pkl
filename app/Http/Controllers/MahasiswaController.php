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
        $mhs = DB::table('tbl_mahasiswa')->orderBy('npm', 'asc')->paginate(5);
        return view('admin.mahasiswa.index', ['mhs' => $mhs]);
    }


    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('tbl_mahasiswa')
         ->where('npm', 'like', '%'.$query.'%')
         ->orWhere('nama', 'like', '%'.$query.'%')
         ->orWhere('jurusan', 'like', '%'.$query.'%')
         ->orWhere('angkatan', 'like', '%'.$query.'%')
         ->orWhere('asal', 'like', '%'.$query.'%')
         ->orWhere('status', 'like', '%'.$query.'%')
         ->orderBy('npm', 'asc')
         ->get();

      }
      else
      {
       $data = DB::table('mahasiswa')
         ->orderBy('CustomerID', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->CustomerName.'</td>
         <td>'.$row->Address.'</td>
         <td>'.$row->City.'</td>
         <td>'.$row->PostalCode.'</td>
         <td>'.$row->Country.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    public function create()
    {
        return view('admin.mahasiswa.createmhs');
    }
    public function lihat()
    {
        return view('admin.mahasiswa.createmhs');
    }
    public function cr()
    {
        return view('admin.mahasiswa.cr');
    }
    function cari(Request $request)
    {
     if($request->ajax())
     {
      $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
      $data = DB::table('tbl_mahasiswa')
                    ->where('npm', 'like', '%'.$query.'%')
                    ->orWhere('nama', 'like', '%'.$query.'%')
                    ->orWhere('jurusan', 'like', '%'.$query.'%')
                    ->orWhere('angkatan', 'like', '%'.$query.'%')
                    ->orWhere('asal', 'like', '%'.$query.'%')
                    ->orWhere('status', 'like', '%'.$query.'%')
                    ->orderBy('npm', 'asc')
                    ->paginate(1);
      return view('admin.mahasiswa.search', compact('mhs'))->render();
     }
    }
    public function search(Request $request)
    {
    if($request->ajax())
    {
        $output="";
        //$products=DB::table('tbl_mahasiswa')->where('nama','LIKE','%'.$request->search."%")->get();
        $mhs = DB::table('tbl_mahasiswa')
                    ->where('npm', 'like', '%'.$request->search.'%')
                    ->orWhere('nama', 'like', '%'.$request->search.'%')
                    ->orWhere('jurusan', 'like', '%'.$request->search.'%')
                    ->orWhere('angkatan', 'like', '%'.$request->search.'%')
                    ->orWhere('asal', 'like', '%'.$request->search.'%')
                    ->orWhere('status', 'like', '%'.$request->search.'%')
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
