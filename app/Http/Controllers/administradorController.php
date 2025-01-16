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
    //GESTIÓN DE CHEQUES
    public function cheque(){
        return view('dashboard.contenido.gestion_cheque.cheque');
    }
    public function formulario_registro_cheque(){
        return view('dashboard.contenido.gestion_cheque.formulario_registro_cheque');
    }

}
