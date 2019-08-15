<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerusahaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('email')->unique();
            $table->string('website')->unique();
            $table->string('npwp');
            $table->string('logo');
            $table->unsignedInteger('kategori_id');
            $table->unsignedInteger('jenis_id');
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
        Schema::dropIfExists('perusahaan');
    }
}
