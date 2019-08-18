<?php

namespace App\Http\Controllers;

use App\Group;
use App\Storrage;
use Illuminate\Http\Request;

class StorrageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $str = Storrage::all();
        $group = Group::all();
       return view('admin.gudang.storrage.storage')->withStr($str)->withGroup($group);
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
            'jml_raw' => 'required|max:255',
            'panjang' => 'required|max:255',
            'lebar' => 'required|max:255'
        ]);

        $str = new Storrage();
        $str->nama = $request->nama;
        $str->jml_plt = $request->jml_plt;
        $str->jml_raw = $request->jml_raw;
        $str->panjang = $request->panjang;
        $str->lebar = $request->lebar;
        $p =$str->panjang;
        $l =$str->lebar;
        $str->space = $p*$l;
        $str->group_id = $request->group_id;

        if ($str->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->back()->with('danger','Ups... Maaf');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Storrage  $storrage
     * @return \Illuminate\Http\Response
     */
    public function show(Storrage $storrage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Storrage  $storrage
     * @return \Illuminate\Http\Response
     */
    public function edit(Storrage $storrage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Storrage  $storrage
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'jml_plt' => 'required|max:255',
            'jml_raw' => 'required|max:255',
            'panjang' => 'required|max:255',
            'lebar' => 'required|max:255'
        ]);

        $str = Storrage::findOrFail($id);
        $str->nama = $request->nama;
        $str->jml_plt = $request->jml_plt;
        $str->jml_raw = $request->jml_raw;
        $str->panjang = $request->panjang;
        $str->lebar = $request->lebar;
        $p =$str->panjang;
        $l =$str->lebar;
        $str->space = $p*$l;
        $str->group_id = $request->group_id;

        if ($str->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->back()->with('danger','Ups... Maaf');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Storrage  $storrage
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $str = Storrage::find($id);
        if ($str->delete()) {
            return redirect()->back()->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }

    }
}
