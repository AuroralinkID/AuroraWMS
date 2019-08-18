<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGudang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gudang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('jml_str');
            $table->string('jml_rw');
            $table->string('jml_plt');
            $table->string('jml_grp');
            $table->string('panjang');
            $table->string('lebar');
            $table->string('diameter');
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
        Schema::dropIfExists('gudang');
    }
}
