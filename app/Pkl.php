<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pkl extends Model
{
    //
    protected $table = "data_pkl";
    protected $fillable = ['npm','nama','jurusan','judulpkl','namainstansi','alamatinstansi'];

}
