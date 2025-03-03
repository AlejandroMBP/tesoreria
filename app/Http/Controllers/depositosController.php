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
        $conceptos_activos = DB::table('concepto')
    ->join('unidad_movimiento as um', 'concepto.unidadMovimiento_id', '=', 'um.id')
    ->join('tipo_concepto as tc', 'concepto.id_tipo', '=', 'tc.id')
    ->where('concepto.estadoConcepto', 1)
    ->select('um.descripcion as unidad_movimiento', 'tc.descripcion as tipo_concepto', 'concepto.id','concepto.concepto', 'concepto.montoMinimo', 'concepto.tipoNacionalidad')
    ->get();
    $conceptos_inactivos = DB::table('concepto')
    ->join('unidad_movimiento as um', 'concepto.unidadMovimiento_id', '=', 'um.id')
    ->join('tipo_concepto as tc', 'concepto.id_tipo', '=', 'tc.id')
    ->where('concepto.estadoConcepto', 0)
    ->select('um.descripcion as unidad_movimiento', 'tc.descripcion as tipo_concepto', 'concepto.id','concepto.concepto', 'concepto.montoMinimo', 'concepto.tipoNacionalidad')
    ->get();
        $tipoConcepto = DB::table('tipo_concepto')->where('estado', 1)->get();
        $UnidadInvolucrada = DB::table('unidad_movimiento')->where('estado', 1)->get();
        return view('dashboard.contenido.gestion_depositos.conceptos', compact('conceptos_activos', 'conceptos_inactivos','tipoConcepto','UnidadInvolucrada'));
    }
    public function guardarConceptos(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio_unitario' => 'required|numeric',
            'unidad_movimiento' => 'required|numeric',
            'tipo_nacionalidad' => 'required|numeric',
            'tipo_concepto' => 'required|numeric',
        ]);
        $valor = new Model_concepto();
        $valor->concepto = $request->nombre;
        $valor->montoMinimo = $request->precio_unitario;
        $valor->tipoNacionalidad = $request->tipo_nacionalidad;
        $valor->estadoConcepto = 1; 
        $valor->unidadMovimiento_id = $request->unidad_movimiento;
        $valor->id_usuario = auth()->id();
        $valor->id_tipo = $request->tipo_concepto;
        $valor->uuid = \Str::uuid()->toString();
        $valor->save();
        
        return response()->json(['success' => true]);
    }
    
    public function inactivarConceptos($id)
    {
        $concepto_univ = Model_concepto::find($id);
        if ($concepto_univ) {
            $concepto_univ->estadoConcepto = 0;  
            $concepto_univ->save();
            return response()->json(['success' => true]);
            }
            return response()->json(['success' => false, 'message' => 'Concepto no encontrado'], 404);
    }
    
    public function activarConceptos($id)
    {
        $concepto_univ = Model_concepto::find($id);
        if ($concepto_univ) {
            $concepto_univ->estadoConcepto = 1;  
            $concepto_univ->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Concepto no encontrado'], 404);
    }
    public function eliminarConceptos($id)
    {
        $concepto_univ = Model_concepto::find($id);
        if ($concepto_univ) {
            $concepto_univ->estadoConcepto = 2;  
            $concepto_univ->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Concepto no encontrado'], 404);
    }
    //**************FUNCION PARA OBTENER concepto VALOR ********************
    public function obtenerConcepto(Request $request)
    {
        $valor = Model_concepto::find($request->id);
        if ($valor) {
            return response()->json($valor);
        }
        return response()->json(['error' => 'Registro no encontrado'], 404);
    }
    public function actualizarConcepto(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:concepto,id',
            'tipoConcepto' => 'required|numeric|min:0',
            'unidad_movimiento' => 'required|numeric',
            'tipoNacionalidad' => 'required|string|max:255',
            'nombre_concepto' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
        ]);

        $valor = Model_concepto::find($request->id);
        if ($valor) {
            $valor->update([
                'id_tipo' => $request->tipoConcepto,
                'unidadMovimiento_id' => $request->unidad_movimiento,
                'tipoNacionalidad' => $request->tipoNacionalidad,
                'concepto' => $request->nombre_concepto,
                'montoMinimo' => $request->monto,
            ]);
            return response()->json(['success' => true]);
        }
        return response()->json(['error' => 'No se pudo actualizar'], 500);
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
