<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    protected $table = 'gudang';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'jml_str', 'jml_rw', 'jml_plt', 'jml_grp' ,'lebar', 'panjang'];
}
