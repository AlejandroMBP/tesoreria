<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class gestionchequeController extends Controller
{
  
    //GESTIÓN DE CHEQUES
    public function cheque(){
        return view('dashboard.contenido.gestion_cheque.cheque');
    }
    public function formulario_registro_cheque(){
        return view('dashboard.contenido.gestion_cheque.formulario_registro_cheque');
    }
    
}
