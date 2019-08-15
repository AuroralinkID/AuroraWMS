<?php

namespace App\Http\Controllers;

use App\Jenis;
use App\Kategori;
use App\Supplier;
use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        $kategori = Kategori::all();
        $jenis = Jenis::all();
        return view('admin.supplier.index')->withSupplier($supplier)->withKategori($kategori)->withJenis($jenis);
    }

    /**
     * Show the form for creating a new resource.
        * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->validate($request, [
        //     'name' => 'required|max:255',
        //     'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     // 'email' => 'required|max:255|unique',
        //     // 'website' => 'required|max:255|unique',
        // ]);

        // $supplier = Supplier::all();
        // $kd = $request->jenis_id;
        // $cd = $request->kategori_id;
        // $code = DB::table('supplier')->max('id') + 1;
        // $code = str_pad('S'.$cd.$kd.$code, 5, 0 , STR_PAD_LEFT);
        // return view('admin.supplier.index')->withCode($code)->withSupplier($supplier);

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
        $kode_supplier = DB::table('supplier')->max('id') + 1;
        $kode_supplier = str_pad('S'.$cd.$kd.$kode_supplier, 5, 0 , STR_PAD_LEFT);

        $sup = new Supplier();
        $sup->name = $request->name;
        $sup->nama_pic = $request->nama_pic;
        $sup->alamat = $request->alamat;
        $sup->telepon = $request->telepon;
        $sup->email = $request->email;
        $sup->website = $request->website;
        $sup->npwp = $request->npwp;
        $sup->kode_supplier = $kode_supplier;
        $sup->kategori_id = $request->kategori_id;
        $sup->jenis_id = $request->jenis_id;

        if($request->hasFile('logo'));
            $request->file('logo')->move('image/', $request->file('logo')->getClientOriginalName());
            $sup->logo = $request->file('logo')->getClientOriginalName();

        if ($sup->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->route('supplier.create')->with('danger','Ups... Maaf');
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
        $sup = Supplier::findOrFail($id);
        return view('supplier.detail')->withSup($sup);
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

        $supplier = Supplier::findOrFail($id);
        $supplier->name = $request->name;
        $supplier->alamat = $request->alamat;
        $supplier->telepon = $request->telepon;
        $supplier->email = $request->email;
        $supplier->website = $request->website;
        $supplier->npwp = $request->npwp;
        $supplier->kategori_id = $request->kategori_id;
        $supplier->jenis_id = $request->jenis_id;

        if($request->hasFile('logo'));
            $request->file('logo')->move('image/', $request->file('logo')->getClientOriginalName());
            $supplier->logo = $request->file('logo')->getClientOriginalName();
        if ($supplier->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->route('admin.perusahaan.create')->with('danger','Ups... Maaf');
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
        $sup = Supplier::find($id);
        if ($sup->delete()) {
            return redirect()->back()->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }
    }
}
