<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    public function perusahaan()
    {
        return $this->hasOne(Perusahaan::class);
    }
}
