<?php

namespace App\Http\Controllers;

use App\Kubikasi;
use Illuminate\Http\Request;

class KubikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kubikasi = Kubikasi::all();

        return view('admin.barang.kubikasi')->withKubikasi($kubikasi);
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
            // 'luas' => 'required',
            // 'dimensi' => 'required',
        ]);

        $kubikasi = new Kubikasi();
        $kubikasi->nama = $request->nama;
        $kubikasi->panjang = $request->panjang;
        $kubikasi->lebar = $request->lebar;
        $kubikasi->tinggi = $request->tinggi;
        $kubikasi->berat = $request->berat;
        $p = $kubikasi->panjang;
        $l = $kubikasi->lebar;
        $t = $kubikasi->tinggi;
        $kubikasi->luas = $p * $l * $t;
        $kl = $kubikasi->luas;
        $kb =$kubikasi->berat;
        $kubikasi->dimensi = $kl + $kb;
        if ($kubikasi->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->route('perusahaan.kategori.create')->with('danger','Ups... Maaf');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kubikasi  $kubikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Kubikasi $kubikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kubikasi  $kubikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Kubikasi $kubikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kubikasi  $kubikasi
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            // 'luas' => 'required',
            // 'dimensi' => 'required',
        ]);

        $kubikasi = Kubikasi::findOrFail($id);
        $kubikasi->nama = $request->nama;
        $kubikasi->panjang = $request->panjang;
        $kubikasi->lebar = $request->lebar;
        $kubikasi->tinggi = $request->tinggi;
        $kubikasi->berat = $request->berat;
        $p = $kubikasi->panjang;
        $l = $kubikasi->lebar;
        $t = $kubikasi->tinggi;
        $kubikasi->luas = $p * $l * $t;
        $kl = $kubikasi->luas;
        $kb =$kubikasi->berat;
        $kubikasi->dimensi = $kl + $kb;
        if ($kubikasi->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->route('perusahaan.kategori.create')->with('danger','Ups... Maaf');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kubikasi  $kubikasi
     * @return \Illuminate\Http\Response
     * @param  int  $id
     */
    public function destroy($id)
    {
        $kubikasi = Kubikasi::find($id);
        if ($kubikasi->delete()) {
            return redirect()->back()->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }
    }
}
