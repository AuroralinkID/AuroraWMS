<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePallete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pallete', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('kode');
            $table->string('panjang');
            $table->string('lebar');
            $table->string('dimensi');
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
        Schema::dropIfExists('pallete');
    }
}
