<?php

namespace App\Http\Controllers;

use App\Jenis;
use App\Kategori;
use App\Pelanggan;
use Illuminate\Http\Request;
use DB;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        $kategori = Kategori::all();
        $jenis = Jenis::all();

        return view('admin.pelanggan.index')->withPelanggan($pelanggan)->withKategori($kategori)->withJenis($jenis);
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
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'email' => 'required|max:255|unique',
            // 'website' => 'required|max:255|unique',
        ]);
        $kd = $request->jenis_id;
        $cd = $request->kategori_id;
        $kode_pelanggan = DB::table('pelanggan')->max('id') + 1;
        $kode_pelanggan = str_pad('P'.$cd.$kd.$kode_pelanggan, 5, 0 , STR_PAD_LEFT);

        $pelanggan = new Pelanggan();
        $pelanggan->name = $request->name;
        $pelanggan->nama_pemilik = $request->nama_pemilik;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->telepon = $request->telepon;
        $pelanggan->email = $request->email;
        $pelanggan->website = $request->website;
        $pelanggan->npwp = $request->npwp;
        $pelanggan->kode_pelanggan = $kode_pelanggan;
        $pelanggan->kategori_id = $request->kategori_id;
        $pelanggan->jenis_id = $request->jenis_id;

        if($request->hasFile('logo'));
            $request->file('logo')->move('image/', $request->file('logo')->getClientOriginalName());
            $pelanggan->logo = $request->file('logo')->getClientOriginalName();

        if ($pelanggan->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->route('pelanggan.create')->with('danger','Ups... Maaf');
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
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.detail')->withPelanggan($pelanggan);

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
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'email' => 'required|max:255|unique',
            // 'website' => 'required|max:255|unique',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->name = $request->name;
        $pelanggan->nama_pemilik = $request->nama_pemilik;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->telepon = $request->telepon;
        $pelanggan->email = $request->email;
        $pelanggan->website = $request->website;
        $pelanggan->npwp = $request->npwp;
        $pelanggan->kategori_id = $request->kategori_id;
        $pelanggan->jenis_id = $request->jenis_id;

        if($request->hasFile('logo'));
            $request->file('logo')->move('image/', $request->file('logo')->getClientOriginalName());
            $pelanggan->logo = $request->file('logo')->getClientOriginalName();
        if ($pelanggan->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->route('pelanggan.create')->with('danger','Ups... Maaf');
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
        $pelanggan = Pelanggan::find($id);
        if ($pelanggan->delete()) {
            return redirect()->back()->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }

    }
}
