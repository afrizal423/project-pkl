<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PengumumanController extends Controller
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
        $info = DB::table('tbl_pengumuman')->join('users', 'tbl_pengumuman.username', '=', 'users.username')->where('tbl_pengumuman.username', \Auth::user()->username)->where('tbl_pengumuman.kategori','!=','Berita' )->orderBy('tbl_pengumuman.id', 'asc')->paginate(10);
        return view('admin.pengumuman.index', ['info' => $info]);
        //echo $info;
    }
    public function manage()
    {
        //
        $info = DB::table('tbl_pengumuman')->join('users', 'tbl_pengumuman.username', '=', 'users.username')->where('tbl_pengumuman.username', \Auth::user()->username)->where('tbl_pengumuman.kategori','!=','Berita' )->orderBy('tbl_pengumuman.id', 'asc')->select('tbl_pengumuman.*')->paginate(10);
        return view('admin.pengumuman.manage', ['info' => $info]);
        //echo $info;
    }

    public function search(Request $request)
    {
    if($request->ajax())
    {
        $output="";
        //$products=DB::table('tbl_mahasiswa')->where('nama','LIKE','%'.$request->search."%")->get();
        $info = DB::table('tbl_pengumuman')
                    ->where('judul', 'like', '%'.$request->search.'%')
                    ->orWhere('slug', 'like', '%'.$request->search.'%')
                    ->orWhere('kategori', 'like', '%'.$request->search.'%')
                    ->orderBy('id', 'asc')
                    ->get();
        if($info)
        {
             return view('admin.pengumuman.car1', compact('info'))->render();
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
    public function search2(Request $request)
    {
    if($request->ajax())
    {
        $output="";
        //$products=DB::table('tbl_mahasiswa')->where('nama','LIKE','%'.$request->search."%")->get();
        $info = DB::table('tbl_pengumuman')
                    ->where('judul', 'like', '%'.$request->search.'%')
                    ->orWhere('slug', 'like', '%'.$request->search.'%')
                    ->orWhere('kategori', 'like', '%'.$request->search.'%')
                    ->orderBy('id', 'asc')
                    ->get();
        if($info)
        {
             return view('admin.pengumuman.car2', compact('info'))->render();
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
        return view('admin.pengumuman.create');
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
    		'judul' => 'required',
            'konten' => 'required',
            'kategori' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $info = new \App\Pengumuman();
        $info->username = \Auth::user()->username;
        $info->judul = $request->get('judul');
        $info->slug = str_slug($request->get('judul'));
        $gambar = $request->file('gambar');
        if($gambar){
            $cover_path = $gambar->store('info-covers', 'public');

            $info->gambar = $cover_path;
          }
        $info->konten = $request->get('konten');
        $info->kategori = $request->get('kategori');
        $info->status = $request->get('action');


        /*
         if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time() . '.' . $gambar->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($gambar)->resize(800, 400)->save($location);
            $info->gambar = $filename;
          }
          $gambar = $request->file('gambar');
        if($gambar){
            $cover_path = $gambar->store('info-covers', 'public');

            $info->gambar = $cover_path;
          }
        */

          $info->save();

          if($request->get('action') == 'PUBLISH'){
            return redirect()
                  ->route('pengumuman.index')
                  ->with('status', 'pengumuman successfully saved and published');
          } else {
            return redirect()
                  ->route('pengumuman.index')
                  ->with('status', 'pengumuman saved as draft');
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
        $info = DB::table('tbl_pengumuman')->where('slug', $id)->first();

        if ($info->username != \Auth::user()->username) {
            abort(403, 'Anda tidak memiliki cukup hak akses kepemilikan');
        } elseif ($info->username == \Auth::user()->username) {
            $info = DB::table('tbl_pengumuman')
            ->join('users', 'tbl_pengumuman.username', '=', 'users.username')
            ->join('detail_users', 'tbl_pengumuman.username', '=', 'detail_users.username')
            ->where('slug', $id)->where('tbl_pengumuman.username', \Auth::user()->username)
            ->select('tbl_pengumuman.*', 'detail_users.nama')->first();
            //echo json_encode($info);
            return view('admin.pengumuman.show', ['inf' => $info]);
        } else {
            abort(404, 'eror');
        }




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
        $inf =  DB::table('tbl_pengumuman')->where('tbl_pengumuman.id', $id)->where('tbl_pengumuman.kategori','!=','Berita' )->first();
        //echo $inf;
        if ($inf) {
            # code...
            return view('admin.pengumuman.edit', ['inf' => $inf]);

        } else {
            abort(403, 'Anda tidak memiliki cukup hak akses kepemilikan');
        }
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
    		'judul' => 'required',
            'konten' => 'required',
            'kategori' => 'required'
            //'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $info = \App\Pengumuman::findOrFail($id);
        $info->username = \Auth::user()->username;
        $info->judul = $request->get('judul');
        $info->slug = str_slug($request->get('judul'));
        $gambar = $request->file('gambar');

        if($gambar){
            if($info->gambar && file_exists(storage_path('app/public/' . $info->gambar))){
                \Storage::delete('public/'. $info->gambar);
            }

            $new_cover_path = $gambar->store('info-covers', 'public');

            $info->gambar = $new_cover_path;
        }

        /*if($gambar){
            $cover_path = $gambar->store('info-covers', 'public');

            $info->gambar = $cover_path;
          }*/
        $info->konten = $request->get('konten');
        $info->kategori = $request->get('kategori');
        $info->status = $request->get('action');


        /*
         if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time() . '.' . $gambar->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($gambar)->resize(800, 400)->save($location);
            $info->gambar = $filename;
          }
          $gambar = $request->file('gambar');
        if($gambar){
            $cover_path = $gambar->store('info-covers', 'public');

            $info->gambar = $cover_path;
          }
        */

          $info->save();

          if($request->get('action') == 'PUBLISH'){
            return redirect()
                  //->route('pengumuman.edit',['inf' => $info->id])
                  ->route('pengumuman.index')
                  ->with('status', 'pengumuman successfully saved and published');
          } else {
            return redirect()
                  ->route('pengumuman.index')
                  ->with('status', 'pengumuman saved as draft');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pengumuman)
    {
        //
        $mhs = Pengumuman::findOrFail($id_pengumuman);
        \Storage::delete('public/'. $mhs->gambar);
        $mhs->delete();

        return redirect('/admin/pengumuman')->with('status', 'pengumuman is successfully deleted');
    }
}
