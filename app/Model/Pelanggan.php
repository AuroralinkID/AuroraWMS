<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
        //
        protected $table = 'pelanggan';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = ['name', 'email'];

        // public function barang()
        // {
        //     return $this->hasOne(Barang::class);
        // }
        public function jenis()
        {
            return $this->belongsTo(Jenis::class);
        }
        public function kategori()
        {
            return $this->belongsTo(Kategori::class);
        }
}
