<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $user= User::all();
        return view('users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users'
        ]);

        if($request->role == null){
            $role = 0;
        }
        else{
            $role = $request->role;
        }
        // $role = null;
        $password = '123456';
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->save();
        $user->attachRole($role);
        return redirect()->route('users.index')->with('success','Data Berhasil disimpan');
        // if ($user->save()) {
        //     return redirect()->route('users.index')->with('success','Data Berhasil disimpan');
        // } else {
        //     return redirect()->route('users.create')->with('danger','Ups... Maaf');
        // }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.detail')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param Role $roles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $role = Role::all($roles);
        $user = User::where('id', $id)->with('roles')->first();
        return view('users.edit')->withUsers($user);
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
            'email' => 'required|email|unique:users,email,'.$id,
            // 'role' => 'boolean',
        ]);

        if($request->role == null){
            $role = 0;
        }
        else{
            $role = $request->role;
        }
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->attachRole($role);
        if ($user->save()) {
            return redirect()->route('users.index', $id);
        } else {
            Session::flash('error', 'ups.... maaf');
            return redirect()->route('users.edit', $id);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success','Data Berhasil dihapus');
    }
}
