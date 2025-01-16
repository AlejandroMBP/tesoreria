<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class administradorController extends Controller
{
    public function index(){
        return view('dashboard.contenido.metricas.metricas');
    }
    public function admin_usuarios(){
        return view('dashboard.contenido.admin_usuarios.admin_usuarios');
    }
   
}
