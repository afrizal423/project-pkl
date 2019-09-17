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
        $usr = \App\User::first();
        $hasil = $usr->detail_users;
        //$hs = $hasil->email;
        echo json_encode($usr);
        //return view('admin.event.index', ['ev' => $event]);
    }

}
