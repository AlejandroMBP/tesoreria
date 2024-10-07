<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function index(){
        $usActivos = User::where('estado', 1)->count();
        $usInactivos = User::where('estado', 0)->count();
        // $usuarios = User::all();
        $usuariosActivos = User :: where('estado',1)->get();
        $usuariosInactivos = User :: where('estado',0)->get();

        return view('dashboard.contenido.usuarios.index', [
            'usuariosActivos'=>$usuariosActivos,
            'usuariosInactivos'=>$usuariosInactivos,
            'usActivos'=>$usActivos,
            'usInactivos'=>$usInactivos]);
    }
    public function create(){

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