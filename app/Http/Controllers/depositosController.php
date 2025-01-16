<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class depositosController extends Controller
{
   
    //GESTIÓN DE DEPÓSITOS
    public function importar(){
        return view('dashboard.contenido.gestion_depositos.importar');
    }
    public function movimientos(){
        return view('dashboard.contenido.gestion_depositos.movimientos');
    }
    public function conceptos(){
        return view('dashboard.contenido.gestion_depositos.conceptos');
    }
    public function multiboletas(){
        return view('dashboard.contenido.gestion_depositos.multiboletas');
    }
    public function reportes(){
        return view('dashboard.contenido.gestion_depositos.reportes');
    }

}
