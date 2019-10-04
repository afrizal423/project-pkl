<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\FusionChrt;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('revalidate');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('admin.app');
        $chart = new FusionChrt;
        $aa = \App\Mahasiswa::distinct()->orderBy('angkatan', 'asc')->pluck('angkatan')->toArray();
        $jur = \App\Mahasiswa::distinct()->orderBy('jurusan', 'asc')->pluck('jurusan')->toArray();
        $ab = DB::table('tbl_mahasiswa')->select(DB::raw('count(*) as user_count, angkatan'))->groupBy('angkatan')
        ->orderBy('angkatan', 'asc')->pluck('user_count')->toArray();
        $sumjur = DB::table('tbl_mahasiswa')->select(DB::raw('count(*) as user_count, jurusan'))->groupBy('jurusan')
        ->orderBy('jurusan', 'asc')->pluck('user_count')->toArray();
        $chart->labels($aa);
        $chart->dataset('Jumlah Mahasiswa', 'bar3d',$ab);

        $jurusan = new FusionChrt;
        $jur = \App\Mahasiswa::distinct()->orderBy('jurusan', 'asc')->pluck('jurusan')->toArray();
        $sumjur = DB::table('tbl_mahasiswa')->select(DB::raw('count(*) as user_count, jurusan'))->groupBy('jurusan')
        ->orderBy('jurusan', 'asc')->pluck('user_count')->toArray();
        $jurusan->labels($jur);
        $jurusan->dataset('Jurusan', 'bar3d',$sumjur);
        $chart->title('Jumlah Mahasiswa Fakultas Ilmu Komputer', 14, '#666', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
        $jurusan->title('Jumlah Mahasiswa Fakultas Ilmu Komputer Tiap Jurusan', 14, '#666', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");

        $aa = \App\Mahasiswa::distinct()->pluck('angkatan')->toArray();
        //echo json_encode($sumjur);
        return view('admin.app', ['chart' => $chart, 'jurusan' => $jurusan]);
    }

    public function mahasiswa()
    {
        # code...
        return view('admin.mhs');
    }
}
