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
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('revalidate');
    }
    public function index()
    {
        //
        $event = DB::table('tbl_event')->join('users', 'tbl_event.username', '=', 'users.username')->where('tbl_event.username', \Auth::user()->username)->orderBy('tbl_event.id', 'asc')->paginate(10);
        return view('admin.event.index', ['ev' => $event]);
    }

    public function manage()
    {
        //
        $info = DB::table('tbl_event')->join('users', 'tbl_event.username', '=', 'users.username')->where('tbl_event.username', \Auth::user()->username)->select('tbl_event.*', 'users.username')->paginate(10);
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
            $cover_path = $gambar->store('event-covers', 'public');

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
                  ->route('event.index')
                  ->with('status', 'event successfully saved and published');
          } else {
            return redirect()
                  ->route('event.index')
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
            $info = DB::table('tbl_event')
            ->join('users', 'tbl_event.username', '=', 'users.username')
            ->join('detail_users', 'tbl_event.username', '=', 'detail_users.username')
            ->where('slug', $id)->where('tbl_event.username', \Auth::user()->username)
            ->select('tbl_event.*', 'detail_users.nama')->first();
            return view('admin.event.show', ['inf' => $info]);
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
        //$inf =  DB::table('tbl_event')->where('tbl_event.id', $id)->first();
        $info = DB::table('tbl_event')->where('id', $id)->first();

        if ($info!=NULL) {
            if ($info->username != \Auth::user()->username) {
                abort(403, 'Anda tidak memiliki cukup hak akses kepemilikan');
            } elseif ($info->username == \Auth::user()->username) {
                $inf = DB::table('tbl_event')->where('tbl_event.id', $id)->first();
                return view('admin.event.editdata', ['ev' => $inf]);
            } else {
                abort(404, 'eror');
            }
        } else {
            abort(404, 'eror');
        }
        /*if ($info->username != \Auth::user()->username) {
            abort(403, 'Anda tidak memiliki cukup hak akses kepemilikan');
        } elseif ($info->username == \Auth::user()->username) {
            $inf = DB::table('tbl_event')->where('tbl_event.id', $id)->first();
            return view('admin.event.edit', ['ev' => $inf]);
        } else {
            abort(404, 'eror');
        }*/
        //echo $inf;

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
            //'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $info = \App\Event::findOrFail($id);
        $info->username = \Auth::user()->username;
        $info->judul = $request->get('judul');
        $info->slug = str_slug($request->get('judul'));
        $gambar = $request->file('gambar');

        if($gambar){
            if($info->gambar && file_exists(storage_path('app/public/' . $info->gambar))){
                \Storage::delete('public/'. $info->gambar);
            }

            $new_cover_path = $gambar->store('event-covers', 'public');

            $info->gambar = $new_cover_path;
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
                  ->route('event.index')
                  ->with('status', 'event successfully saved and published');
          } else {
            return redirect()
                  ->route('event.index')
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
        $mhs = Event::findOrFail($id);
        \Storage::delete('public/'. $mhs->gambar);
        //Storage::delete($mhs->gambar);
        $mhs->delete();

        return redirect('/admin/event')->with('status', 'pengumuman is successfully deleted');
    }
}
