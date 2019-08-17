<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table = "tbl_mahasiswa";
    protected $fillable = ['npm','nama','jurusan','angkatan','asal','jenis_kelamin','tgl_lahir'];

}
