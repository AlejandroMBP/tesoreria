<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCOntroller extends Controller
{
    public function index(){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('roles.index',[
            'roles'=>$roles,
            'permissions'=>$permissions
    ]);
    }
    public function create(){
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }
    public function store(Request $request){
        $validate = $request->validate([
            //'name' => 'required|unique:roles,name',
            'name'=>'required|string|max:255',
            'permissions'=>'nullable|array',
            'permissions' => 'exists:permissions,name',
        ]);

        $role = Role::create(['name'=> $validate['name'],'guard_name'=>'web']);

        if (isset($validate['permissions'])) {
            $role -> syncPermissions($validate['permissions']);
        }

        return redirect()->route('roles.index')->with('success','Rol creado exitosamente');
    }

    // public function edit(Role $role){
    //     $permissions = Permission::all();
    //     return view('roles.editar', compact('role','permissions'));
    // }
    public function update(Request $request, Role $role,$id){
        //validamos los datos del request
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        $role = Role::findOrFail($id);
        $role->update([
        'name' => $validate['name'],
        'guard_name' => 'web'
        ]);

        if (isset($validate['permissions'])) {
            $role->syncPermissions($validate['permissions']);
        }
        // $role -> syncPermissions($request->permissions);
        return redirect()->route('roles.index')->with('success','Rol actualizado correctamente');
    }
    public function destroy($id)
{
    // Buscar el rol por ID
    $role = Role::findOrFail($id);

    // Verificar si el rol tiene usuarios asignados
    if ($role->users()->count() > 0) {
        return redirect()->route('roles.index')->with('error', 'No se puede eliminar el rol porque está asignado a usuarios.');
    }

    // Eliminar el rol
    $role->delete();

    // Redirigir a la lista de roles con un mensaje de éxito
    return redirect()->route('roles.index')->with('success', 'Rol eliminado exitosamente');
}


}