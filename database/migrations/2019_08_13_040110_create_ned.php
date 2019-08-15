<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ned', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->date('tgl_produksi');
            $table->date('tgl_exp');
            $table->string('near_ed');
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
        Schema::dropIfExists('ned');
    }
}
