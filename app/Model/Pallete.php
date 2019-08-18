<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pallete extends Model
{
    protected $table = 'pallete';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'panjang', 'lebar'];
}
