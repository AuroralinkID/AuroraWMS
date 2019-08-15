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
        protected $fillable = ['name', 'description', 'tgl_produksi', 'tgl_expired', 'near_ed'];

        // public function barang()
        // {
        //     return $this->hasOne(Barang::class);
        // }
}
