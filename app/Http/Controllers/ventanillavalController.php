<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Model_solicitud;
use App\Models\Model_solicitud_detalle;
use App\Models\Model_bodega;
use App\Models\Model_valores_stock;
use App\Models\Model_venta_valores_detalle;
use App\Models\Model_venta_valores;

class ventanillavalController extends Controller
{
    //GESTIÓN DE VENTANILLA DE VALORES
    public function stock_ventanilla(){
        return view('dashboard.contenido.gestion_ventanilla.stock');
    }
        //******stock escasos */

        public function obtenerValoresEscasosVentanilla()
    {
        $valores = DB::table('valores_stock AS vs')
        ->join('concepto_valores AS cv', 'vs.id_concepto_valor', '=', 'cv.id')
        ->where('vs.cantidad', '<', 50)
        ->where('cv.estado', '=', 1)
        ->select(
            'vs.*',
            'cv.nombre',
            'cv.estado'
        )
        ->groupBy('vs.id', 'cv.nombre', 'cv.estado')
        ->get();

    return response()->json($valores);

    }
    ///********stock suficientes*************** */
    public function obtenerValoresSuficientesVentanilla()
    {
        $valores = DB::table('valores_stock AS vs')
        ->join('concepto_valores AS cv', 'vs.id_concepto_valor', '=', 'cv.id')
        ->where('vs.cantidad', '>=', 50)
        ->where('cv.estado', '=', 1)
        ->select(
            'vs.*',
            'cv.nombre',
            'cv.estado'
        )
        ->groupBy('vs.id', 'cv.nombre', 'cv.estado')
        ->get();

        return response()->json($valores);
    }



    public function solicitud_valores(){
        $sol_val = DB::table('solicitud as sol')
        ->join('users as u', 'sol.id_usuario_destinatario', '=', 'u.id')
        ->select('sol.*', 'u.name')
        ->where('sol.estado', 1)
        ->get();
        return view('dashboard.contenido.gestion_ventanilla.solicitud_valores',compact('sol_val'));
    }
    public function formulario_solicitud_valores(){
        $user = auth()->user();
        $users = \App\Models\User::where('id', '!=', $user->id)->get();
        $conceptos = \App\Models\Model_bodega::all();
        return view('dashboard.contenido.gestion_ventanilla.formulario_solicitud_valores', compact('user', 'users','conceptos'));
    }
    public function guardarSolicitud(Request $request)
    {
        $request->validate([
            'remitente' => 'required|numeric',
            'destinatario' => 'required|numeric',
            'fecha_solicitud' => 'required|date',
            'cantidad_detalles' => 'required|numeric',  
        ]);
        $solicitud = new Model_solicitud();
        $solicitud->id_usuario_remitente = $request->remitente;
        $solicitud->id_usuario_destinatario = $request->destinatario;
        $solicitud->fecha_solicitud = $request->fecha_solicitud;
        $solicitud->cantidad = $request->cantidad_detalles; 
        $solicitud->estado = 1; 
        $solicitud->id_tiposolicitud = 1;
        $solicitud->uuid = \Str::uuid()->toString();
        $solicitud->save();

          // Guardar los detalles de la solicitud
          foreach ($request->detalles as $detalle) {
            $detalleSolicitud = new Model_solicitud_detalle();
            $detalleSolicitud->id_solicitud = $solicitud->id; 
            $detalleSolicitud->id_concepto_valores = $detalle['id_concepto_valor'];
            $detalleSolicitud->cantidad = $detalle['cantidad'];
            $detalleSolicitud->estado = 1; 
            $detalleSolicitud->save();  
        }
        return response()->json(['success' => true]);
    }
    //FUNCIONES PARA LA VENTA DE VALROES
    public function venta_valores(){
        $venta_val = DB::table('venta_valores')
        ->join('users', 'users.id', '=', 'venta_valores.id_user')
        ->select('venta_valores.*', 'users.name as nombre_usuario')
        ->get();
        return view('dashboard.contenido.gestion_ventanilla.venta_valores', compact('venta_val'));
    }
    public function registro_ventas_valores($id){
        $venta_valor = Model_venta_valores::find($id);
        if (!$venta_valor) {
            return redirect()->route('ruta_de_error')->with('error', 'Registro no encontrado.');
        }
        $conceptos = Model_bodega::all(); 
        return view('dashboard.contenido.gestion_ventanilla.registro_ventas_valores', compact('venta_valor','conceptos'));
    }
    //****************************con esta funcion obtengo el correlativo_inicial, costo, cantidad y precio_unitario*******************************/

   
    public function obtenerCorrelativoStockVentanilla($id)
    {
      
        $valorStock = DB::table('valores_stock')
                        ->where('id_concepto_valor', $id)
                        ->first();

        $conceptoValor = DB::table('concepto_valores')
                            ->where('id', $id)
                            ->first();
        if ($valorStock && $conceptoValor ) {
            return response()->json([
                'correlativo_inicial' => $valorStock->correlativo_inicial,
                'costo' => $valorStock->costo, 
                'cantidad' => $valorStock->cantidad,
                'precio_unitario' => $conceptoValor->precio_unitario,   
            ]);
        } else {
            return response()->json([
                'correlativo_inicial' => 0,
                'costo' => 0,
                'cantidad' => 0,
                'precio_unitario' => 0,
            ]);
        }
    }
    //*************con esta función obtengo si la cantidad en estock es suficiente//// */
 

    public function verificarStockVentanilla($idConcepto)
    {
    
        $stock = Model_valores_stock::where('id_concepto_valor', $idConcepto)->first();

        if ($stock === null) {
            
            return response()->json([
                'error' => 'Concepto no encontrado'
            ], 404);
        }

        $concepto = Model_bodega::where('id', $stock->id_concepto_valor)->first();

        if ($concepto === null) {
            return response()->json([
                'error' => 'Nombre del concepto no encontrado'
            ], 404);
        }

        return response()->json([
            'stock' => $stock->cantidad,
            'nombre_concepto' => $concepto->nombre 
        ]);

    }

    public function guardarVentaVal(Request $request)
    {
        $request->validate([
            'fecha_venta' => 'required|date',
            'nro_informe' => 'required|numeric',
        ]);
        $valor = new Model_venta_valores();
        
        $valor->fecha_venta = $request->fecha_venta;
        $valor->nro_informe = $request->nro_informe;
        $valor->cantidad = 0;
        $valor->id_user = auth()->id();
        $valor->estado = 1;
        $valor->uuid = \Str::uuid()->toString();
        $valor->save();
        
        return response()->json(['success' => true]);
    }

    public function guardarVentaValDetalle(Request $request)
    {
        $request->validate([
            'idVenta' => 'required|numeric',
            'cantidad_detalles' => 'required|numeric',
        ]);
        $solicitud = Model_venta_valores::where('id', $request->idVenta)->first();

        if ($solicitud) {
            $solicitud->cantidad = $request->cantidad_detalles;
            $solicitud->estado = 2;
            $solicitud->save();
        } 

        foreach ($request->detalles as $detalle) {
            $detalleSolicitud = new Model_venta_valores_detalle();
            $detalleSolicitud->id_venta_valores = $request->idVenta;
            $detalleSolicitud->id_concepto_valores = $detalle['id_concepto_valor'];
            $detalleSolicitud->cantidad = $detalle['cantidad'];
            $detalleSolicitud->correlativo_inicial = $detalle['correlativo_inicial'];
            $detalleSolicitud->correlativo_final = $detalle['correlativo_final'];
            $detalleSolicitud->costo = $detalle['costo_total'];
            $detalleSolicitud->monto_saldo = $detalle['montosaldo'];
            $detalleSolicitud->cantidad_saldo = $detalle['cantidadsaldo'];
            $detalleSolicitud->estado = 1;
            $detalleSolicitud->save();

            $stock = Model_valores_stock::where('id_concepto_valor', $detalle['id_concepto_valor'])->first();
            if ($stock) {
                $stock->cantidad -= $detalle['cantidad']; 
                $stock->costo -= $detalle['costo_total']; 
                $stock->correlativo_inicial = $detalle['correlativo_final'] + 1;
                //$stock->correlativo_final = $detalle['correlativo_final']; 
                $stock->save();
            }
            
        }
    
        return response()->json(['success' => true]);
        
    }
   


        public function generarPDFventa($id)
    {
        $venta = \App\Models\Model_venta_valores::findOrFail($id);
        $pdf = \PDF::loadView('dashboard.contenido.gestion_ventanilla.venta_pdf', compact('venta'));
        return $pdf->stream('Venta.pdf'); 
    }

    public function generatePDFsolicitud()
    {
        $pdf = \PDF::loadView('dashboard.contenido.gestion_ventanilla.solicitud_pdf');
        return $pdf->stream('Solicitud.pdf');
    }


    
}
