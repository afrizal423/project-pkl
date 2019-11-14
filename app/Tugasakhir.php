<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugasakhir extends Model
{
    //
    protected $table = "data_tugasakhir";
    protected $fillable = ['npm','nama','jurusan','judul','dospem1','dospem2'];
}
