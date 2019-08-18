<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKubikasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kubikasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nama');
            $table->String('panjang');
            $table->String('lebar');
            $table->String('tinggi');
            $table->String('berat');
            $table->String('luas');
            $table->String('dimensi');
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
        Schema::dropIfExists('kubikasi');
    }
}
