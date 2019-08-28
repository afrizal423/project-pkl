<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $event = DB::table('tbl_event')->join('users', 'tbl_event.username', '=', 'users.username')->where('tbl_event.username', \Auth::user()->username)->orderBy('tbl_event.id', 'asc')->paginate(10);
        return view('admin.event.index', ['ev' => $event]);
    }

    public function manage()
    {
        //
        $info = DB::table('tbl_event')->join('users', 'tbl_event.username', '=', 'users.username')->where('tbl_event.username', \Auth::user()->username)->select('tbl_event.*', 'users.name')->paginate(10);
        return view('admin.event.manage', ['info' => $info]);
        //echo $info;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.event.create');
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
        $info = new \App\Event();
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
                  ->route('event.create')
                  ->with('status', 'event successfully saved and published');
          } else {
            return redirect()
                  ->route('event.create')
                  ->with('status', 'event saved as draft');
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
        $info = DB::table('tbl_event')->where('slug', $id)->first();

        if ($info->username != \Auth::user()->username) {
            abort(403, 'Anda tidak memiliki cukup hak akses kepemilikan');
        } elseif ($info->username == \Auth::user()->username) {
            $info = DB::table('tbl_event')->join('users', 'tbl_event.username', '=', 'users.username')->where('slug', $id)->where('tbl_event.username', \Auth::user()->username)->select('tbl_event.*', 'users.name')->first();
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
        $inf =  DB::table('tbl_event')->where('tbl_event.id', $id)->first();
        //echo $inf;
        return view('admin.event.edit', ['ev' => $inf]);
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
            'kategori' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $info = \App\Pengumuman::findOrFail($id);
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
                  ->route('event.edit',['inf' => $info->id])
                  ->with('status', 'event successfully saved and published');
          } else {
            return redirect()
                  ->route('event.edit',['inf' => $info->id])
                  ->with('status', 'event saved as draft');
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
    }
}
