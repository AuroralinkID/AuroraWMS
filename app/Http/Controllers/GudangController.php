<?php

namespace App\Http\Controllers;

use App\Gudang;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gudang =Gudang::all();
        return view('admin.gudang.index')->withGudang($gudang);
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
            'jml_str' => 'required|max:255',
            'jml_rw' => 'required|max:255',
            'jml_plt' => 'required|max:255',
            'jml_grp' => 'required|max:255',
            'panjang' => 'required|max:255',
            'lebar' => 'required|max:255',
        ]);

        $gudang = new Gudang();
        $gudang->nama = $request->nama;
        $gudang->jml_str = $request->jml_str;
        $gudang->jml_rw = $request->jml_rw;
        $gudang->jml_plt = $request->jml_plt;
        $gudang->jml_grp = $request->jml_grp;
        $gudang->panjang = $request->panjang;
        $gudang->lebar = $request->lebar;
        $p = $gudang->panjang;
        $l = $gudang->lebar;
        $gudang->diameter = $p * $l;

        if ($gudang->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->back()->with('danger','Ups... Maaf');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function show(Gudang $gudang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function edit(Gudang $gudang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gudang  $gudang
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'jml_str' => 'required|max:255',
            'jml_rw' => 'required|max:255',
            'jml_plt' => 'required|max:255',
            'jml_grp' => 'required|max:255',
            'panjang' => 'required|max:255',
            'lebar' => 'required|max:255',
        ]);

        $gudang = Gudang::findOrFail($id);
        $gudang->nama = $request->nama;
        $gudang->jml_str = $request->jml_str;
        $gudang->jml_rw = $request->jml_rw;
        $gudang->jml_plt = $request->jml_plt;
        $gudang->jml_grp = $request->jml_grp;
        $gudang->panjang = $request->panjang;
        $gudang->lebar = $request->lebar;
        $p = $gudang->panjang;
        $l = $gudang->lebar;
        $gudang->diameter = $p * $l;

        if ($gudang->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->back()->with('danger','Ups... Maaf');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gudang  $gudang
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gudang = Gudang::find($id);
        if ($gudang->delete()) {
            return redirect()->back()->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }
    }
}
