<?php

namespace App\Http\Controllers;

use App\persma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PersmaController extends Controller
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
        $mhs = DB::table('tbl_prestasi')->orderBy('id', 'asc')->paginate(10);
        return view('admin.prestasi.index', ['mhs' => $mhs]);
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
     * @param  \App\persma  $persma
     * @return \Illuminate\Http\Response
     */
    public function show(persma $persma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\persma  $persma
     * @return \Illuminate\Http\Response
     */
    public function edit(persma $persma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\persma  $persma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, persma $persma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\persma  $persma
     * @return \Illuminate\Http\Response
     */
    public function destroy(persma $persma)
    {
        //
    }
}
