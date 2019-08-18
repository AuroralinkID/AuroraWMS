<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storrage extends Model
{
    protected $table = 'storrage';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'panjang', 'lebar', 'jml_plt', 'jml_raw'];

    public function group(){
        return $this->belongsTo(Group::class);
    }
}
