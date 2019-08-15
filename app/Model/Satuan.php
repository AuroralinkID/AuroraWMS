<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
        //
        protected $table = 'satuan';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = ['name', 'description'];

        // public function barang()
        // {
        //     return $this->hasOne(Barang::class);
        // }
}
