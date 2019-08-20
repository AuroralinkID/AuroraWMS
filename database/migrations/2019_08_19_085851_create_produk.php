<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->softDeletes();
            $table->timestamps();
            $table->string('sku');
            $table->string('barcode');
            $table->string('nama');
            $table->string('gambar');
            $table->string('deskripsi');
            $table->double('harga_jual');
            $table->double('harga_beli');
            $table->date('exp_date');
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('kategori_id');
            $table->unsignedInteger('varian_id');
            $table->unsignedInteger('satuan_id');
            $table->unsignedInteger('kubikasi_id');
            $table->unsignedInteger('ned_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
