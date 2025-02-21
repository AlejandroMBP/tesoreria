<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Model_concepto;

class depositosController extends Controller
{
   
    //---------------------GESTIÓN DE DEPÓSITOS---------------------------
    public function importar(){
        return view('dashboard.contenido.gestion_depositos.importar');
    }
    //*********************MOVIMIENTOS****************************
    public function movimientos(){
        return view('dashboard.contenido.gestion_depositos.movimientos');
    }
    //*********************CONCEPTOS******************************
    public function conceptos(){
        $conceptos_activos = DB::table('concepto')->where('estadoConcepto', 1)->get();
        $conceptos_inactivos = DB::table('concepto')->where('estadoConcepto', 0)->get();
        return view('dashboard.contenido.gestion_depositos.conceptos', compact('conceptos_activos', 'conceptos_inactivos'));
    }
    public function guardarConceptos(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio_unitario' => 'required|numeric',
        ]);
        $valor = new Model_concepto();
        $valor->concepto = $request->nombre;
        $valor->montoMinimo = $request->precio_unitario;
        $valor->tipoNacionalidad = 1 ; 
        $valor->estadoConcepto = 1; 
        $valor->unidadMovimiento_id = 1; 
        $valor->id_usuario = auth()->id();
        $valor->id_tipo = 1; 
        $valor->uuid = \Str::uuid()->toString();
        $valor->save();
        
        return response()->json(['success' => true]);
    }
    
    public function inactivarConceptos($id)
    {
        $valores_univ = Model_concepto::find($id);
        if ($valores_univ) {
            $valores_univ->estadoConcepto = 0;  
            $valores_univ->save();
            return response()->json(['success' => true]);
            }
            return response()->json(['success' => false, 'message' => 'Concepto no encontrado'], 404);
    }
    
    public function activarConceptos($id)
    {
        $valores_univ = Model_concepto::find($id);
        if ($valores_univ) {
            $valores_univ->estadoConcepto = 1;  
            $valores_univ->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Concepto no encontrado'], 404);
    }
    
    //*********************MULTIBOLETAS***************************
    public function multiboletas(){
        return view('dashboard.contenido.gestion_depositos.multiboletas');
    }
    //*********************REPORTES*******************************
    public function reportes(){
        return view('dashboard.contenido.gestion_depositos.reportes');
    }

}
