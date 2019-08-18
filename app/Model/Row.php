<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    protected $table = 'row';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'jml_plt', 'panjang', 'lebar'];
}
