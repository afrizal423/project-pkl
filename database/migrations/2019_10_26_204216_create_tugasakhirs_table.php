<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTugasakhirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_tugasakhir', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('npm', 15);
            $table->string('nama');
            $table->string('jurusan', 50);
            $table->string('judul');
            $table->string('dospem1');
            $table->string('dospem2');
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
        Schema::dropIfExists('data_tugasakhir');
    }
}
