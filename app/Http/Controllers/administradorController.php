<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\User; 
use Illuminate\Support\Facades\DB;

class administradorController extends Controller
{
    public function index(){
        return view('dashboard.contenido.metricas.metricas');
    }
    

    public function admin_usuarios() {
        $usuarios_activos = DB::table('users')->where('estado', 1)->get();
        $usuarios_inactivos = DB::table('users')->where('estado', 0)->get();
        return view('dashboard.contenido.admin_usuarios.admin_usuarios', compact('usuarios_activos', 'usuarios_inactivos'));
    }
    
    //**************FUNCION PARA DESACTIVAR AL USUARIO ********************
    public function inactivar($id)
    {
        $usuario = User::find($id);

        if ($usuario) {
            $usuario->estado = 0;  
            $usuario->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Usuario no encontrado'], 404);
    }
    //**************FUNCION PARA ACTIVAR AL USUARIO ********************
    public function activar($id)
    {
        $usuario = User::find($id);

        if ($usuario) {
            $usuario->estado = 1;  
            $usuario->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Usuario no encontrado'], 404);
    }
    //**************FUNCION PARA ELIMINAR AL USUARIO ********************
    public function eliminar($id)
    {
        $usuario = User::find($id);

        if ($usuario) {
            $usuario->estado = 3;  
            $usuario->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Usuario no encontrado'], 404);
    }



}
