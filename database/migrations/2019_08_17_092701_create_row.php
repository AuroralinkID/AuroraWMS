<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('row', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('jml_plt');
            $table->string('panjang');
            $table->string('lebar');
            $table->string('space');
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
        Schema::dropIfExists('row');
    }
}
