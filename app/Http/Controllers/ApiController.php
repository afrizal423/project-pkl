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
    public function detailMhs($id)
    {
        //$mhs = Mahasiswa::all();
        $ev = DB::table('tbl_mahasiswa')->where('npm', $id)->first();
        $response = [
            'data' => $ev
        ];
        return response()->json($response, 200);
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
    public function detailPengumuman($id)
    {
        //$mhs = Mahasiswa::all();
        $ev = DB::table('tbl_pengumuman')->where('slug', $id)->first();
        $response = [
            'data' => $ev
        ];
        return response()->json($response, 200);
    }

    public function getPrestasi()
    {
        //$mhs = Mahasiswa::all();
        $mhs = DB::table('tbl_prestasi')->orderBy('id', 'asc')->paginate(10);
        return response()->json($mhs, 200);
    }
    public function detailPrestasi($id)
    {
        //$mhs = Mahasiswa::all();
        $ev = DB::table('tbl_prestasi')->where('id', $id)->first();
        $response = [
            'data' => $ev
        ];
        return response()->json($response, 200);
    }

    public function getPkl()
    {
        //$mhs = Mahasiswa::all();
        $mhs = DB::table('data_pkl')->orderBy('id', 'asc')->paginate(10);
        return response()->json($mhs, 200);
    }
    public function detailPkl($id)
    {
        //$mhs = Mahasiswa::all();
        $ev = DB::table('data_pkl')->where('id', $id)->first();
        $response = [
            'data' => $ev
        ];
        return response()->json($response, 200);
    }

    public function getTugasakhir()
    {
        //$mhs = Mahasiswa::all();
        $mhs = DB::table('data_tugasakhir')->orderBy('id', 'asc')->paginate(10);
        return response()->json($mhs, 200);
    }
    public function detailTugasakhir($id)
    {
        //$mhs = Mahasiswa::all();
        $ev = DB::table('data_tugasakhir')->where('id', $id)->first();
        $response = [
            'data' => $ev
        ];
        return response()->json($response, 200);
    }

    public function getAlumni()
    {
        //$mhs = Mahasiswa::all();
        $mhs = DB::table('tbl_mahasiswa')->where('status','Alumni')->orderBy('npm', 'asc')->paginate(10);
        return response()->json($mhs, 200);
    }
    public function detailAlumni($id)
    {
        //$mhs = Mahasiswa::all();
        $ev = DB::table('tbl_mahasiswa')->where('npm', $id)->where('status','Alumni')->orderBy('npm', 'asc')->first();
        $response = [
            'data' => $ev
        ];
        return response()->json($response, 200);
    }
}
