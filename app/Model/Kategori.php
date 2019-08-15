<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'color'];

    public function perusahaan()
    {
        return $this->hasOne(Perusahaan::class);
    }

}
