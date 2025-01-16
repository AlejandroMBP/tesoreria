<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class bodegaController extends Controller
{
    
    //ADMINISTRACION DE BODEGA
    public function valores_universitarios(){
        return view('dashboard.contenido.admin_bodega.valores_universitarios');
    }
    public function proveedores(){
        return view('dashboard.contenido.admin_bodega.proveedores');
    }
    public function stock(){
        return view('dashboard.contenido.admin_bodega.stock');
    }
    public function entrada_valores(){
        return view('dashboard.contenido.admin_bodega.entrada_valores');
    }
    public function salida_valores(){
        return view('dashboard.contenido.admin_bodega.salida_valores');
    }
    public function form_entrega_valores_bodega(){
        return view('dashboard.contenido.admin_bodega.form_entrega_valores_bodega');
    }
    public function reporte_valores_bodega(){
        return view('dashboard.contenido.admin_bodega.reporte_valores_bodega');
    }
    public function generatePDFreporte()
    {
        $pdf = \PDF::loadView('dashboard.contenido.admin_bodega.reporte_pdf');
        return $pdf->stream('Reporte_Valor_universitarios.pdf');
    }

}
