<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Varian extends Model
{
    //
    protected $table = 'varian';

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
