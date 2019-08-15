<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'logo'];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function getLogo(){
        if(!$this->logo){
            return asset('image/upload/default.jpg');
        }
        return asset('image/upload' .$this->logo);
    }
}
