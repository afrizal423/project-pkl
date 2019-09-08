<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{
    //
    public function getMhs()
    {
        //$mhs = Mahasiswa::all();
        $mhs = DB::table('tbl_mahasiswa')->orderBy('npm', 'asc')->paginate(10);
        return response()->json($mhs, 200);
    }
    public function getEvent()
    {
        //$mhs = Mahasiswa::all();
        $ev = DB::table('tbl_event')->orderBy('id', 'asc')->paginate(10);
        return response()->json($ev, 200);
    }
    public function detailEvent($id)
    {
        //$mhs = Mahasiswa::all();
        $ev = DB::table('tbl_event')->where('slug', $id)->first();
        $response = [
            'data' => $ev
        ];
        return response()->json($response, 200);
    }
    public function getPengumuman()
    {
        //$mhs = Mahasiswa::all();
        $pe = DB::table('tbl_pengumuman')->orderBy('id', 'asc')->paginate(10);
        return response()->json($pe, 200);
    }

    public function getPrestasi()
    {
        //$mhs = Mahasiswa::all();
        $mhs = DB::table('tbl_prestasi')->orderBy('id', 'asc')->paginate(10);
        return response()->json($mhs, 200);
    }
}
