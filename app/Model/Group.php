<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'group';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama'];

    public function storage(){
        return $this->hasOne(Storrage::class);
    }
    public function produk()
    {
        return $this->hasOne(Produk::class);
    }
}
