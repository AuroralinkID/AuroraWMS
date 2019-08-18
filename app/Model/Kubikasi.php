<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kubikasi extends Model
{
    protected $table = 'kubikasi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'panjang', 'lebar', 'tinggi', 'berat'];
}
