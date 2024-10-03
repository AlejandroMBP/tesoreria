<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function index(){
        return view('dashboard.contenido.usuarios.index');
    }
}