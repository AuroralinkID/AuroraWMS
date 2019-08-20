<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
        //
        protected $table = 'supplier';

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
        public function getLogo(){
            if(!$this->logo){
                return asset('image/upload/default.jpg');
            }
            return asset('image/upload' .$this->logo);
        }
        public function jenis()
        {
            return $this->belongsTo(Jenis::class);
        }
        public function kategori()
        {
            return $this->belongsTo(Kategori::class);
        }
        public function getNumberAttribute()
        {

            return str_pad($this->id, 5, 0, STR_PAD_LEFT);

        }
        public function produk()
        {
            return $this->hasOne(Produk::class);
        }
}
