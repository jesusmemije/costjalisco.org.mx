<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{   

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
  
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::orderBy('created_at', 'desc')->get();

        return view("admin.users.create", ['user' => new User(), 'roles' => $roles]);
    }

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

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('created_at', 'desc')->get();

        return view("admin.users.edit", ['user' => $user, 'roles' => $roles]);
    }

    public function update(UpdateUserPut $request, User $user)
    {
        $user->update([
            'role_id'   => $request->rol,
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'address'   => $request->address,
            'phone'     => $request->phone,
            'status'    => 'Activo'
        ]);

        return back()->with('status', '¡Usuario editado con éxito!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('status', '¡Usuario eliminado con éxito!');
    }
}
