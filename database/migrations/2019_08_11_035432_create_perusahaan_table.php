<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('email')->unique();
            $table->string('website')->unique();
            $table->string('npwp');
            $table->string('logo');
            $table->timestamps();
        });

        // Create table for storing kategori
        Schema::create('kategori', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->string('warna');
            $table->timestamps();
        });

        // Create table for storing jenis
        Schema::create('jenis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
        });
        // Create table for storing jenis_perusahaan
        Schema::create('jenis_perusahaan', function (Blueprint $table) {
            $table->unsignedInteger('jenis_id');
            $table->unsignedInteger('perusahaan_id');
            $table->string('perusahaan_type');

            $table->foreign('jenis_id')->references('id')->on('jenis')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['perusahaan_id', 'jenis_id', 'perusahaan_type']);
        });
        // Create table for storing jenis_perusahaan
        Schema::create('ketegori_jenis', function (Blueprint $table) {
            $table->unsignedInteger('jenis_id');
            $table->unsignedInteger('kategori_id');
            $table->string('jenis_type');

            $table->foreign('kategori_id')->references('id')->on('kategori')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['kategori_id', 'jenis_id', 'jenis_type']);
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
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('jenis');
        Schema::dropIfExists('jenis_perusahaan');
        Schema::dropIfExists('ketegori_jenis');
    }
}
