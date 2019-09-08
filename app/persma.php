<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persma extends Model
{
    //
    protected $table = "tbl_prestasi";
    protected $fillable = ['nama_kegiatan','waktu_kegiatan','prestasi_kejuaraan','kelompok','nama_mhs','jurusan'];

}
