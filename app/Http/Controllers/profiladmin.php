<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class profiladmin extends Controller
{
    //
    public function index()
    {
        //
        $usr = \App\User::where('users.username', \Auth::user()->username)
                ->join('detail_users', 'users.username', '=', 'detail_users.username')
                ->first();
        return view('admin.detail_profil.detail', ['dt' => $usr]);
        //$hasil = $usr->detail_users;
        //$hs = $hasil->email;
        echo json_encode($usr);
        //return view('admin.event.index', ['ev' => $event]);
    }

}
