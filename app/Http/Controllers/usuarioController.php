<?php
/**
NOTA: LA FUNCION CREATE Y LA FUNCION EDIT SE OMITIO POR EL USO DE MODALES
YA QUE SE HIZO LA CAPTURA DE LOS DATOS DESDE LA MISMA VISTA CON JS
**/

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class usuarioController extends Controller
{
    public function index(){
        $usActivos = User::where('estado', 1)->count();
        $usInactivos = User::where('estado', 0)->count();

        $usuariosActivos = User :: where('estado',1)->get();
        $usuariosInactivos = User :: where('estado',0)->get();

        $roles =Role::all();
        return view('dashboard.contenido.usuarios.index', [
            'usuariosActivos'=>$usuariosActivos,
            'usuariosInactivos'=>$usuariosInactivos,
            'usActivos'=>$usActivos,
            'usInactivos'=>$usInactivos,
            'roles'=>$roles
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|int',
        ]);
        $user=User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $user->roles()->sync([$request->role]);
        return redirect()->route('usuario.index')->with('success','Usuario creado satisafactoriamente');
    }

    public function update(User $user,Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'username'=>'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role' => 'required|int',
            ]);
        $user -> name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;

        $user->save();
        $user->roles()->sync([$request->role]);
        return redirect()->route('usuario.index')->with('success','usuario actualizado');
    }

    public function cambioEstado($id){
        $usuario = User::find($id);

        if (!$usuario) {
            return redirect()->back()->with('error','usuario no encontrado');
        }
        $usuario->estado = $usuario->estado == 1? 0 : 1;
        $usuario->save();
        return redirect()->route('usuario.index')->with('success', 'Estado del usuario actualizado correctamente.');
    }
}