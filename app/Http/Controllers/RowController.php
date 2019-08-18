<?php

namespace App\Http\Controllers;

use App\Row;
use Illuminate\Http\Request;

class RowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raw = Row::all();
        return view('admin.gudang.storrage.raw')->withRaw($raw);
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
            'jml_plt' => 'required|max:255',
            'panjang' => 'required|max:255',
            'lebar' => 'required|max:255'
        ]);

        $raw = new Row();
        $raw->nama = $request->nama;
        $raw->jml_plt = $request->jml_plt;
        $raw->panjang = $request->panjang;
        $raw->lebar = $request->lebar;
        $p =$raw->panjang;
        $l =$raw->lebar;
        $raw->space = $p*$l;

        if ($raw->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->back()->with('danger','Ups... Maaf');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Row  $row
     * @return \Illuminate\Http\Response
     */
    public function show(Row $row)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Row  $row
     * @return \Illuminate\Http\Response
     */
    public function edit(Row $row)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Row  $row
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'jml_plt' => 'required|max:255',
            'panjang' => 'required|max:255',
            'lebar' => 'required|max:255'
        ]);

        $raw = Row::findOrFail($id);
        $raw->nama = $request->nama;
        $raw->jml_plt = $request->jml_plt;
        $raw->panjang = $request->panjang;
        $raw->lebar = $request->lebar;
        $p =$raw->panjang;
        $l =$raw->lebar;
        $raw->space = $p*$l;

        if ($raw->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->back()->with('danger','Ups... Maaf');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Row  $row
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $raw = Row::find($id);
        if ($raw->delete()) {
            return redirect()->back()->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }

    }
}
