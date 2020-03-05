<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePklsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pkl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('npm', 15);
            $table->string('nama');
            $table->string('jurusan', 50);
            $table->string('judulpkl');
            $table->string('namainstansi');
            $table->string('alamatinstansi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pkls');
    }
}
