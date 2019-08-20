<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;
use DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();

        return view('admin.produk.index')->withProduk($produk);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $this->validate($request, [
           'nama' => 'required|max:255',
           'deskripsi' => 'required|max:255',
           'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

       $produk = new Produk();
       $produk->nama = $request->nama;
       $produk->deskripsi = $request->deskripsi;
       $produk->harga_jual = $request->harga_jual;
       $produk->harga_beli = $request->harga_beli;
       $produk->exp_date = $request->exp_date;
    //    $produk->stock = $request->stock;
       $produk->kategori_id = $request->kategori_id;
       $produk->varian_id = $request->varian_id;
       $produk->satuan_id = $request->satuan_id;
       $produk->kubikasi_id = $request->kubikasi_id;
       $produk->supplier_id = $request->supplier_id;
       $produk->ned_id = $request->ned_id;
       $ks = $produk->supplier_id;
        $kd = $produk->kategori_id;
        $sku = DB::table('produk')->max('id') + 1;
        $sku = str_pad($ks.$kd.$sku, 8, 0 , STR_PAD_LEFT);
        $produk->sku = $sku;
        $produk->barcode = $sku;

        if($request->hasFile('gambar'));
            $request->file('gambar')->move('image/', $request->file('gambar')->getClientOriginalName());
            $produk->gambar = $request->file('gambar')->getClientOriginalName();

        if ($produk->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->back()->with('danger','Ups... Maaf');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
               'nama' => 'required|max:25',
               'deskripsi' => 'required|max:255',
               'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);

           $produk = Produk::findOrFail($id);
           $produk->nama = $request->nama;
           $produk->deskripsi = $request->deskripsi;
           $produk->harga_jual = $request->harga_jual;
           $produk->harga_beli = $request->harga_beli;
           $produk->exp_date = $request->exp_date;
        //    $produk->stock = $request->stock;
            $produk->kategori_id = $request->kategori_id;
            $produk->varian_id = $request->varian_id;
            $produk->satuan_id = $request->satuan_id;
            $produk->kubikasi_id = $request->kubikasi_id;
            $produk->supplier_id = $request->supplier_id;
           $produk->ned_id = $request->ned_id;
           $ks = $produk->supplier_id;
            $kd = $produk->kategori_id;
            $sku = DB::table('produk')->max('id') + 1;
            $sku = str_pad($ks.$kd.$sku, 6, 0 , STR_PAD_LEFT);
            $produk->sku = $sku;
            $produk->barcode = $sku;
            // $produk->gambar = $sku;

            if($request->hasFile('gambar'));
                $request->file('gambar')->move('image/', $request->file('gambar')->getClientOriginalName());
                $produk->gambar = $request->file('gambar')->getClientOriginalName();

            if ($produk->save()) {
                return redirect()->back()->with('success','Data Berhasil disimpan');
            } else {
                return redirect()->back()->with('danger','Ups... Maaf');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        if ($produk->delete()) {
            return redirect()->back()->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }

    }
}
