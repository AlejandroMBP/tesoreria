<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ventanillavalController extends Controller
{
    
    //GESTIÓN DE VENTANILLA DE VALORES
    public function stock_ventanilla(){
        return view('dashboard.contenido.gestion_ventanilla.stock');
    }
    public function solicitud_valores(){
        return view('dashboard.contenido.gestion_ventanilla.solicitud_valores');
    }
    public function formulario_solicitud_valores(){
        return view('dashboard.contenido.gestion_ventanilla.formulario_solicitud_valores');
    }
    public function venta_valores(){
        return view('dashboard.contenido.gestion_ventanilla.venta_valores');
    }
    public function registro_ventas_valores(){
        return view('dashboard.contenido.gestion_ventanilla.registro_ventas_valores');
    }
    public function generatePDFsolicitud()
    {
        $pdf = \PDF::loadView('dashboard.contenido.gestion_ventanilla.solicitud_pdf');
        return $pdf->stream('Solicitud.pdf');
    }
    

}
