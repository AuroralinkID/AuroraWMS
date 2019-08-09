<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Alert;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles= Role::all();
        return view('roles.index')->withRoles($roles);
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
        $roles = new Role();
        $roles->name = $request->name;
        $roles->display_name = $request->display_name;
        $roles->description = $request->description;

        if ($roles->save()) {
            return redirect()->route('roles.index')->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->route('roles.create')->with('danger','Ups... Maaf');
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
        $roles = Role::findOrFail($id);
        return view('roles.index')->withRoles($roles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::findOrFail($id);
        return view('roles.edit')->withRoles($roles);
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

        $roles = Role::findOrFail($id);
        $roles->name = $request->name;
        $roles->display_name = $request->display_name;
        $roles->description = $request->description;

        if ($roles->save()) {
            return redirect()->route('roles.index')->with('success','Data Berhasil diupdate');
        } else {
            return redirect()->route('roles.create')->with('danger','Ups...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Role  $role
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $roles->delete();
        // return redirect()->back()->with('success','Data Berhasil dihapus');
        $roles = Role::find($id);
        if ($roles->delete()) {
            return redirect()->route('roles.index')->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }
    }
}
