<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class administradorController extends Controller
{
    public function index(){
        return view('dashboard.contenido.metricas.metricas');
    }
}
