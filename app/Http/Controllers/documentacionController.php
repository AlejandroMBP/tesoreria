<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class documentacionController extends Controller
{
   
    //DOCUMENTACIÓN
    public function documentacion(){
        return view('dashboard.contenido.admin_otros.documentacion');
    }

}
