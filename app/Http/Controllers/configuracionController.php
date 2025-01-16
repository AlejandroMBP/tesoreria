<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class configuracionController extends Controller
{
   
    
    //CONFIGURACIÓN
    public function configuracion(){
        return view('dashboard.contenido.admin_otros.configuracion');
    }


    

}
