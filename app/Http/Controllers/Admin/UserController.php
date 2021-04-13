<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::allowed()->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $user);

        $user = new User();
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        return view('admin.users.create', compact('user', 'roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->authorize('create', new User);

        $data = $request->validate([
            'name'=>'required|min:10',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:8'
        ]);
        $user=User::create($data);
        $user->assignRole($request->roles);
        $user->givePermissionTo($request->permissions);

        return redirect()->route('admin.users.index')->with('flash', 'Usuario creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $this->authorize('update', $user);

        //$roles=Role::all();
        // $roles=Role::pluck('name','id');
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $this->authorize('update', $user);

        $data = $request->validated();
        $user->update($data);
        return redirect()->route('admin.user.edit,', $user)->with('flash', 'Informacion de usuario actualizada satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', "user");

        $user->update([
            'visible' => false
        ]);

        return redirect()->route('admin.user.index')->withFlash('Usuario Eliminado');
    }
}
