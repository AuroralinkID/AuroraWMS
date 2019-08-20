<?php

namespace App\Http\Controllers;

use App\Ned;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ned = Ned::all();
        return view('admin.produk.ned')->withNed($ned);
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
            'nama' => 'request|max:25',
            // 'description' => 'request|max:255',
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $ned = new Ned();
        $ned->name = $request->name;
        $ned->description = $request->description;
        $ned->tgl_produksi = $request->tgl_produksi;
        $ned->tgl_exp = $request->tgl_exp;
        $p = $ned->tgl_produksi;
        $e = $ned->tgl_ex;
        $ned->near_ed = date('m/Y', strtotime($e <= $p.+90 ));
        if ($ned->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->back()->with('danger','Ups... Maaf');
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
        //
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
            'nama' => 'request|max:25',
            // 'description' => 'request|max:255',
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $ned = Ned::findOrFail($id);
        $ned->name = $request->name;
        $ned->description = $request->description;
        $ned->tgl_produksi = $request->tgl_produksi;
        $ned->tgl_exp = $request->tgl_exp;
        $p = $ned->tgl_produksi;
        $e = $ned->tgl_ex;
        $ned->near_ed = date('m/Y', strtotime($e <= $p.+90 ));
        if ($ned->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->back()->with('danger','Ups... Maaf');
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
        $ned = Ned::find($id);
        if ($ned->delete()) {
            return redirect()->back()->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }
    }
}
