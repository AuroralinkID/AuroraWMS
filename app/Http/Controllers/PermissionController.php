<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Alert;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hak= Permission::all();
        return view('permission.index', compact('hak'));
        //  dd($hak);
        // return view('permission.index')->withPermissions($hak);
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
            'display_name' => 'required|max:255'
        ]);
        $hak = new Permission();
        $hak->name = $request->name;
        $hak->display_name = $request->display_name;
        $hak->description = $request->description;

        if ($hak->save()) {
            return redirect()->route('permission.index')->with('success','Data Berhasil disimpan');
        } else {
            Session::flash('danger', 'Ups... Maaf');
            return redirect()->route('permission.index');
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
        $hak = Permission::findOrFail($id);
        return view('permission.detail')->withRoles($hak);
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
            'display_name' => 'required|max:255'
        ]);

        $hak = Permission::findOrFail($id);
        $hak->name = $request->name;
        $hak->display_name = $request->display_name;
        $hak->description = $request->description;

        if ($hak->save()) {
            return redirect()->route('permission.index')->with('success','Data Berhasil diupdate');
        } else {
            Alert::flash('danger', 'Ups... Maaf');
            return redirect()->route('permission.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param App\Permissions $hak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $hak = Permission::find($id);
        if ($hak->delete()) {
            return redirect()->route('permission.index')->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }
    }
}
