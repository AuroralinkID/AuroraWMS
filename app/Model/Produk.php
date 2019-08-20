<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'deskripsi', 'harga_jual', 'harga_beli', 'exp_date'];

    public function getGambar(){
        // if(!$this->gambar){
        //     return asset('image/upload/default.jpg');
        // }
        // return asset('image/upload' .$this->gambar);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function satuan(){
        return $this->belongsTo('App\Satuan');
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function kubikasi(){
        return $this->belongsTo(Kubikasi::class);
    }
    public function varian(){
        return $this->belongsTo(Varian::class);
    }
    public function ned(){
        return $this->belongsTo(Ned::class);
    }
}
