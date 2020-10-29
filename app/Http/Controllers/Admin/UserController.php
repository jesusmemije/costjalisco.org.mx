<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
  
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('created_at', 'desc')->get();

        return view("admin.users.create", ['user' => new User(), 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPost $request)
    {   
        //dd($request->all());

        //dd($request->validated());

        User::create([
            'role_id'   => $request->rol,
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'address'   => $request->address,
            'phone'     => $request->phone,
            'status'    => 'Activo',
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        //return redirect('admin/users');

        return back()->with('status', '¡Usuario creado con éxito!');
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
    public function edit(User $user)
    {
        $roles = Role::orderBy('created_at', 'desc')->get();

        return view("admin.users.edit", ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserPost $request, User $user)
    {
        $user->update([
            'role_id'   => $request->rol,
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'address'   => $request->address,
            'phone'     => $request->phone,
            'status'    => 'Activo',
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        return back()->with('status', '¡Usuario editado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
