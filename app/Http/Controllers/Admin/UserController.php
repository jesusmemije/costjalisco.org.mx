<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

//Agregadas 13/07/2021 por un error.

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;


class UserController extends Controller //implements Authenticatable esta clase generaba un error. 13/07/2021.
{   

    use HasApiTokens, HasFactory, Notifiable;

    public function __construct()
    {
        $this->middleware('knowroute');
        
    }


    function getAuthIdentifierName(){}
    function  getAuthIdentifier(){}
    function getAuthPassword(){}
    function getRememberToken(){}
    function setRememberToken(string $value){}
    function getRememberTokenName(){}
    

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
      
  
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::orderBy('created_at', 'desc')->get();
        $organizations= Organization::orderBy('created_at', 'desc')->get();
        return view("admin.users.create", ['user' => new User(), 'roles' => $roles,'organizations'=>$organizations]);
    }

    public function store(StoreUserPost $request)
    {   

      
        if($request->auxrol=='Agente sectorial'){
            $id_organization=$request->organization;
           
        }else{
           
            $id_organization=0;
           
        }
      
        User::create([
            'role_id'   => $request->rol,
            'username'  => $request->username,
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'address'   => $request->address,
            'phone'     => $request->phone,
            'status'    => 'Activo',
            'id_organization'=>$id_organization,
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
        $organizations= Organization::orderBy('created_at', 'desc')->get();
        return view("admin.users.edit", ['user' => $user, 'roles' => $roles,'organizations'=>$organizations]);
    }

    public function update(UpdateUserPut $request, User $user)
    {
        if($request->auxrol=='Agente sectorial'){
            $id_organization=$request->organization;
           
        }else{
           
            $id_organization=0;
           
        }
        $user->update([
            'role_id'   => $request->rol,
            'username'  => $request->username,
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'address'   => $request->address,
            'phone'     => $request->phone,
            'status'    => 'Activo',
            'id_organization'=>$id_organization,
            'password'  => Hash::make($request->password),
        ]);

        return back()->with('status', '¡Usuario editado con éxito!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('status', '¡Usuario eliminado con éxito!');
    }
}
