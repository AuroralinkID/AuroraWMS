<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.perusahaan.kategori', compact('kategori'));
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
            'name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);
        $kat = new Kategori();
        $kat->name = $request->name;
        $kat->warna = $request->warna;
        $kat->description = $request->description;

        if ($kat->save()) {
            return redirect()->route('kategori.index')->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->route('kategori.create')->with('danger','Ups... Maaf');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kat = Kategori::findOrFail($id);
        return view('roles.edit')->withRoles($kat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        $kat = Kategori::findOrFail($id);
        $kat->name = $request->name;
        $kat->warna = $request->warna;
        $kat->description = $request->description;

        if ($kat->save()) {
            return redirect()->route('kategori.index')->with('success','Data Berhasil diupdate');
        } else {
            return redirect()->route('kategori.create')->with('danger','Ups...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kat = Kategori::find($id);
        if ($kat->delete()) {
            return redirect()->route('kategori.index')->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }
    }
}
