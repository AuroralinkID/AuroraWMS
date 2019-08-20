<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ned extends Model
{
        //
        protected $table = 'ned';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = ['name'];

        public function produk()
        {
            return $this->hasOne(Produk::class);
        }
}
