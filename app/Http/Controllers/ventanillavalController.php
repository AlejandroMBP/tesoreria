<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Model_solicitud;
use App\Models\Model_solicitud_detalle;
use App\Models\Model_bodega;
use App\Models\Model_valores_stock;

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
