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
        $ab = DB::table('tbl_mahasiswa')->select(DB::raw('count(*) as user_count, angkatan'))->groupBy('angkatan')
        ->orderBy('angkatan', 'asc')->pluck('user_count')->toArray();
        $chart->labels($aa);
        $chart->dataset('Jumlah Mahasiswa', 'bar3d',$ab);
        //$chart->title('Data Mahasiswa Fakultas Ilmu Komputer', 14, '#666', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");

        $aa = \App\Mahasiswa::distinct()->pluck('angkatan')->toArray();
        //echo json_encode($ab);
        return view('admin.app', ['chart' => $chart]);
    }

    public function mahasiswa()
    {
        # code...
        return view('admin.mhs');
    }
}
