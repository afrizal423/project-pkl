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
        $chart->dataset('Angkatan', 'bar3d',$ab);

        $jurusan = new FusionChrt;
        $jur = \App\Mahasiswa::distinct()->orderBy('jurusan', 'asc')->pluck('jurusan')->toArray();
        $sumjur = DB::table('tbl_mahasiswa')->select(DB::raw('count(*) as user_count, jurusan'))->groupBy('jurusan')
        ->orderBy('jurusan', 'asc')->pluck('user_count')->toArray();
        $jurusan->labels($jur);
        $jurusan->dataset('Jurusan', 'bar3d',$sumjur);
        $chart->title('Jumlah Mahasiswa Fakultas Ilmu Komputer Tiap Angkatan', 14, '#666', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
        $jurusan->title('Jumlah Mahasiswa Fakultas Ilmu Komputer Tiap Jurusan', 14, '#666', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");

        $aa = \App\Mahasiswa::distinct()->pluck('angkatan')->toArray();

        $thn = \App\persma::select(DB::raw('year(waktu_kegiatan) as waktu'))->distinct()->orderBy('waktu', 'asc')->pluck('waktu')->toArray();
        $jur = DB::table('tbl_prestasi')->select(DB::raw('count(*) as user_count, year(waktu_kegiatan) as waktu'))->groupBy('waktu')
        ->orderBy('waktu', 'asc')->pluck('user_count')->toArray();

        $prestasi = new FusionChrt;
        $pr = \App\persma::select(DB::raw('year(waktu_kegiatan) as waktu, jurusan'))->distinct()->orderBy('jurusan', 'asc')->pluck('jurusan')->toArray();
        $pres = DB::table('tbl_prestasi')->select(DB::raw('count(*) as user_count, year(waktu_kegiatan) as waktu'))->groupBy('waktu')
        ->orderBy('waktu', 'asc')->pluck('user_count')->toArray();
        $prestasi->labels($pr);
        $prestasi->dataset('Jurusan', 'bar3d',$pres);
        $prestasi->title('Prestasi Mahasiswa Fakultas Ilmu Komputer Tiap Jurusan', 14, '#666', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");

        $jumlahmhs= \App\Mahasiswa::count();
        $thnmhs = \App\Mahasiswa::where('angkatan',\Carbon\Carbon::now()->format('Y'))->count();
        $jumlahpkl= \App\Pkl::count();
        $thnpkl = \App\Pkl::whereYear('created_at', '=', \Carbon\Carbon::now()->format('Y'))->count();
        $jumlahprestasi= \App\persma::count();
        $thnprestasi= \App\persma::whereYear('waktu_kegiatan', '=', \Carbon\Carbon::now()->format('Y'))->count();
        $jumlahalumni = \App\Mahasiswa::where('status','Alumni')->orderBy('npm', 'asc')->count();
        $thnalumni = \App\Mahasiswa::where('status','Alumni')->whereYear('updated_at', '=', \Carbon\Carbon::now()->format('Y'))->orderBy('npm', 'asc')->count();
        //echo json_encode($thnalumni);
        return view('admin.app', ['chart' => $chart, 'jurusan' => $jurusan, 'prestasi' => $prestasi, 'jumlahmhs'  => $jumlahmhs,
        'jumlahpkl' => $jumlahpkl, 'jumlahprestasi' => $jumlahprestasi, 'jumlahalumni' => $jumlahalumni,
        'thnprestasi' => $thnprestasi, 'thnpkl' => $thnpkl, 'thnmhs' => $thnmhs, 'thnalumni' => $thnalumni]);
    }

    public function mahasiswa()
    {
        # code...
        return view('admin.mhs');
    }
}
