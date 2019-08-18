<?php

namespace App\Http\Controllers;

use App\Pallete;
use Illuminate\Http\Request;
use DB;

class PalleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pallete = Pallete::all();
        return view('admin.gudang.storrage.pallete')->withPallete($pallete);
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
            'panjang' => 'required|max:20',
            'lebar' => 'required|max:20'
        ]);



        $pallete = new Pallete();

        $pallete->nama = $request->nama;
        $pn = $pallete->nama;
        $kode_pallete = DB::table('pallete')->max('id') + 1;
        $kode_pallete = str_pad("$pn".$kode_pallete, 5, 0 , STR_PAD_LEFT);
        $pallete->kode = $kode_pallete;
        $pallete->panjang = $request->panjang;
        $pallete->lebar = $request->lebar;
        $p = $pallete->panjang;
        $l = $pallete->lebar;
        $pallete->dimensi = $p * $l;

        if ($pallete->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->back()->with('danger','Ups... Maaf');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pallete  $pallete
     * @return \Illuminate\Http\Response
     */
    public function show(Pallete $pallete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pallete  $pallete
     * @return \Illuminate\Http\Response
     */
    public function edit(Pallete $pallete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pallete  $pallete
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'panjang' => 'required|max:20',
            'lebar' => 'required|max:20'
        ]);



        $pallete = Pallete::findOrFail($id);

        $pallete->nama = $request->nama;
        $pn = $pallete->nama;
        $kode_pallete = DB::table('pallete')->max('id') + 1;
        $kode_pallete = str_pad("$pn".$kode_pallete, 5, 0 , STR_PAD_LEFT);
        $pallete->kode = $kode_pallete;
        $pallete->panjang = $request->panjang;
        $pallete->lebar = $request->lebar;
        $p = $pallete->panjang;
        $l = $pallete->lebar;
        $pallete->dimensi = $p * $l;

        if ($pallete->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->back()->with('danger','Ups... Maaf');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pallete  $pallete
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pallete = Pallete::find($id);
        if ($pallete->delete()) {
            return redirect()->back()->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }

    }
}
