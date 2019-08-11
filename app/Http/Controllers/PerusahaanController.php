<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaan;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $perusahaan = Perusahaan::all();
        return view('perusahaan.index', compact('perusahaan'));
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
        $perusahaan = new Perusahaan();
        $perusahaan->name = $request->name;
        $perusahaan->alamat = $request->alamat;
        $perusahaan->telepon = $request->telepon;
        $perusahaan->email = $request->email;
        $perusahaan->website = $request->website;
        $perusahaan->npwp = $request->npwp;
        // $perusahaan->logo = $request->logo;

        if($request->hasFile('logo'));
            $request->file('logo')->move('image/', $request->file('logo')->getClientOriginalName());
            $perusahaan->logo = $request->file('logo')->getClientOriginalName();

        if ($perusahaan->save()) {
            return redirect()->route('perusahaan.index')->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->route('perusahaan.create')->with('danger','Ups... Maaf');
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
        $perusahaan = Perusahaan::findOrFail($id);
        return view('perusahaan.detail')->withUser($perusahaan);
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

        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->name = $request->name;
        $perusahaan->alamat = $request->alamat;
        $perusahaan->telepon = $request->telepon;
        $perusahaan->email = $request->email;
        $perusahaan->website = $request->website;
        $perusahaan->npwp = $request->npwp;

        if($request->hasFile('logo'));
            $request->file('logo')->move('image/', $request->file('logo')->getClientOriginalName());
            $perusahaan->logo = $request->file('logo')->getClientOriginalName();

        if ($perusahaan->save()) {
            return redirect()->route('perusahaan.index')->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->route('perusahaan.create')->with('danger','Ups... Maaf');
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
       $perusahaan = Perusahaan::find($id);
        if ($perusahaan->delete()) {
            return redirect()->route('perusahaan.index')->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }

        }

}
