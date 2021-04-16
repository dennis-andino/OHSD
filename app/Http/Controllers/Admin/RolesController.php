<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role; //este lo tuve que agregar

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::all()

        ]);
         //Retorna la vista en /resources/views/admin/roles/index.blade.php/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create()
    {
        $permissions=Permission::pluck('name','id');
        $role=new Role();
        return view('admin.roles.create',compact('permissions','role'));
    }

    /**
     * Store a newly created resource in storage.*/

     //@param  \Illuminate\Http\Request  $request
    // @return \Illuminate\Http\Response

    public function store(Request $request)
    {

        $data=$request->validate([
            'name' => 'required|unique:Roles',
            'guard_name' =>'required'
        ]);
        $role=Role::create($data);
        if($request->has('permissions')){
            $role->givePermissionTo($request->permissions);
        }
        return redirect()->route('admin.roles.index')->withFlash('Rol creado con exito !!') ;
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
    public function edit(Role $role )
    {
        $permissions=Permission::pluck('name','id');
        return view('admin.roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $data=$request->validate([
            'name' => 'required|unique:Roles,name,'.$role->id,
            'guard_name' =>'required'
        ]);
        $role->update($data);
        $role->permissions()->detach();

        if($request->has('permissions')){
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.edit',$role)->withFlash('Rol actualizado con exito !!') ;
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
