<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Model_bodega;
use App\Models\Model_proveedor;
use App\Models\Model_b_valores_stock;
use App\Models\Model_solicitud;
use App\Models\Model_solicitud_detalle;
use App\Models\Model_respuesta_solicitud;
use App\Models\Model_respuesta_solicitud_detalle;
use App\Models\Model_adquisicion;
use App\Models\Model_adquisicion_detalle;
use App\Models\Model_valores_stock;
class bodegaController extends Controller
{
//ADMINISTRACION DE BODEGA
  //VALORES UNIVERSITARIOS 
    //**************VALORES UNIVERSITARIOS ACTIVOS E INACTIVOS (CAMBIO DE ESTADO)*****************
    public function valores_universitarios() {
        $valores_universitarios_activos = DB::table('concepto_valores')->where('estado', 1)->get();
        $valores_universitarios_inactivos = DB::table('concepto_valores')->where('estado', 0)->get();
        return view('dashboard.contenido.admin_bodega.valores_universitarios', 
            compact('valores_universitarios_activos', 'valores_universitarios_inactivos')
        );
    }
    //**************FUNCION PARA DESACTIVAR EL VALOR UNIVERSITARIO ********************
    public function inactivarVal($id)
    {
        $valores_univ = Model_bodega::find($id);
        if ($valores_univ) {
            $valores_univ->estado = 0;  
            $valores_univ->save();
            return response()->json(['success' => true]);
            }
            return response()->json(['success' => false, 'message' => 'Valor universitario no encontrado'], 404);
    }
    public function guardarVal(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio_unitario' => 'required|numeric',
        ]);
        $valor = new Model_bodega();
        $valor->nombre = $request->nombre;
        $valor->precio_unitario = $request->precio_unitario;
        $valor->estado = 1; 
        $valor->uuid = \Str::uuid()->toString();
        $valor->save();
        
        return response()->json(['success' => true]);
    }

    //**************FUNCION PARA ACTIVAR AL VALOR ********************
    public function activarVal($id)
    {
        $valores_univ = Model_bodega::find($id);
        if ($valores_univ) {
            $valores_univ->estado = 1;  
            $valores_univ->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Valor universitario no encontrado'], 404);
    }
    //**************FUNCION PARA ELIMINAR AL VALOR ********************
    public function eliminarVal($id)
    {
        $valores_univ = Model_bodega::find($id);
        if ($valores_univ) {
            $valores_univ->estado = 3;  
            $valores_univ->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Valor universitario no encontrado'], 404);
    }
//**************FUNCION PARA OBTENER concepto VALOR ********************
    public function obtenerVal(Request $request)
    {
        $valor = Model_bodega::find($request->id);
        if ($valor) {
            return response()->json($valor);
        }
        return response()->json(['error' => 'Registro no encontrado'], 404);
    }
    // Actualizar el registro
    public function actualizarval(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:concepto_valores,id',
            'nombre' => 'required|string|max:255',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        $valor = Model_bodega::find($request->id);
        if ($valor) {
            $valor->update([
                'nombre' => $request->nombre,
                'precio_unitario' => $request->precio_unitario,
            ]);
            return response()->json(['success' => true]);
        }
        return response()->json(['error' => 'No se pudo actualizar'], 500);
    }
    //PROVEEDORES
    public function proveedores() {
        $proveedores_activos = DB::table('proveedor')->where('estado', 1)->get();
        $proveedores_inactivos = DB::table('proveedor')->where('estado', 0)->get();
        return view('dashboard.contenido.admin_bodega.proveedores', 
            compact('proveedores_activos', 'proveedores_inactivos')
        );
    }
    //**************FUNCION PARA GUARDAR PROVEEDOR ********************
    public function guardarProveedor(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'contacto' => 'required|numeric', 
            'email' => 'required|email|max:255',
        ]);
        $proveedor = new Model_proveedor();
            $proveedor->nombre = $request->nombre;
            $proveedor->direccion = $request->direccion;
            $proveedor->contacto = $request->contacto;
            $proveedor->email = $request->email;
            $proveedor->estado = 1; 
            $proveedor->uuid = \Str::uuid()->toString();
            $proveedor->save();
        return response()->json(['success' => true]);
    }
    //**************FUNCION PARA INACTIVAR PROVEEDOR ********************
    public function inactivarProv($id)
    {
        $proveedor = Model_proveedor::find($id);
        
        if ($proveedor) {
            $proveedor->estado = 0; 
            $proveedor->save(); 
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Proveedor no encontrado'], 404);
    } 
    //**************FUNCION PARA ACTIVAR PROVEEDOR ********************
    public function activarProv($id)
    {
        $proveedor = Model_proveedor::find($id);
        if ($proveedor) {
            $proveedor->estado = 1; 
            $proveedor->save(); 
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Proveedor no encontrado'], 404);
    }
    //**************FUNCION PARA ELIMINAR PROVEEDOR ********************
    public function eliminarProv($id)
    {
        $proveedor = Model_proveedor::find($id); 
        if ($proveedor) {
            $proveedor->estado = 3; 
            $proveedor->save(); 
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Proveedor no encontrado'], 404);
    }
    //**************FUNCION PARA OBTENER PROVEEDOR********************
    public function obtenerProv(Request $request)
    {
        $valor = Model_proveedor::find($request->id);
        if ($valor) {
            return response()->json($valor);
        }
        return response()->json(['error' => 'Registro no encontrado'], 404);
    }
    // Actualizar el registro
    public function actualizarProv(Request $request)
    {
        $proveedor = Model_proveedor::find($request->id);
        if (!$proveedor) {
            return response()->json(['message' => 'Proveedor no encontrado'], 404);
        }
        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->contacto = $request->contacto;
        $proveedor->email = $request->email;
        $proveedor->save();
        return response()->json(['success' => true]);
    }
    //STOCK
    public function stock(){
        return view('dashboard.contenido.admin_bodega.stock');
    }

    public function obtenerValoresEscasos()
    {
        $valores = DB::table('b_valores_stock AS bvs')
        ->join('concepto_valores AS cv', 'bvs.id_concepto_valor', '=', 'cv.id')
        ->leftJoin('adquisicion_valores_detalle AS avd', 'bvs.id_concepto_valor', '=', 'avd.id_concepto_valores')
        ->leftJoin('adquisicion_valores AS av', 'avd.id_adquisicion_valores', '=', 'av.id')
        ->where('bvs.cantidad', '<', 50)
        ->where('cv.estado', '=', 1)
        ->select(
            'bvs.*',
            'cv.nombre',
            'cv.estado',
            'cv.precio_unitario',
            DB::raw('MAX(av.fecha_adquisicion) AS fecha_adquisicion')
        )
        ->groupBy('bvs.id', 'cv.nombre', 'cv.estado')
        ->havingRaw('COUNT(avd.id_concepto_valores) = 0 OR MAX(av.fecha_adquisicion) IS NOT NULL')
        ->get();

        return response()->json($valores);

    }

    public function obtenerValoresSuficientes()
    {
        $valores = DB::table('b_valores_stock AS bvs')
        ->join('concepto_valores AS cv', 'bvs.id_concepto_valor', '=', 'cv.id')
        ->leftJoin('adquisicion_valores_detalle AS avd', 'bvs.id_concepto_valor', '=', 'avd.id_concepto_valores')
        ->leftJoin('adquisicion_valores AS av', 'avd.id_adquisicion_valores', '=', 'av.id')
        ->where('bvs.cantidad', '>=', 50)
        ->where('cv.estado', '=', 1)
        ->select(
            'bvs.*',
            'cv.nombre',
            'cv.estado',
            'cv.precio_unitario',
            DB::raw('MAX(av.fecha_adquisicion) AS fecha_adquisicion')
        )
        ->groupBy('bvs.id', 'cv.nombre', 'cv.estado')
        ->havingRaw('COUNT(avd.id_concepto_valores) = 0 OR MAX(av.fecha_adquisicion) IS NOT NULL')
        ->get();

        return response()->json($valores);
    }
    //ENTRADA VALORES 
    public function entrada_valores(){
       
        $lista_adquisiciones = DB::table('adquisicion_valores')->where('estado', 1)->get();
        return view('dashboard.contenido.admin_bodega.entrada_valores',compact('lista_adquisiciones'));
    }
    //**ESTA FUNCIÓN ME PERMITE GUARDAR UNA NUEVA FECHA DE ADQUSICIÓN EN MI TABLA ADQUISICION_VALORES***
    public function guardar_adqui(Request $request)
    {
        $request->validate([
            'fecha' => 'required|string|max:255',
        ]);
        $valor = new Model_adquisicion();
        $valor->fecha_adquisicion = $request->fecha;
        $valor->uuid = \Str::uuid()->toString();
        $valor->save();
        return response()->json(['success' => true]);
    }    
    //******ESTA FUNCIÓN ME PERMITE DIRIGIRME A MI VISTA DONDE SE ENCUENTRA REGISTRAR UNA ADQUISICIÓN A PARTIR DEL ID DE LA TABLA ADQUISICIÓN_VALORES *******/
    public function registrarEntrada($id)
    {
        $adquisicion = Model_adquisicion::find($id);
        if (!$adquisicion) {
            return redirect()->route('ruta_de_error')->with('error', 'Registro no encontrado.');
        }
        $conceptos = Model_bodega::all(); 
       
        return view('dashboard.contenido.admin_bodega.registro_entrada_valores', compact('adquisicion', 'conceptos'));
    }
    public function guardarEntradaDetalle(Request $request){
        $request->validate([
            'id_adqui' => 'required|numeric',
            'id_concepto_valor' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'correlativo_ini' => 'required|numeric',
            'correlativo_final' => 'required|numeric',
            'serie' => 'required|string|max:25',
            'monto' => 'required|numeric',
            'costonuevo' => 'required|numeric',
            'cantidadnuevo' => 'required|numeric'
        ]);    
    
       
        $valor = new Model_adquisicion_detalle();
        $valor->id_adquisicion_valores = $request->id_adqui;
        $valor->id_concepto_valores = $request->id_concepto_valor;
        $valor->cantidad = $request->cantidad;
        $valor->correlativo_ini = $request->correlativo_ini;
        $valor->correlativo_fin = $request->correlativo_final;
        $valor->serie = $request->serie;
        $valor->costo = $request->monto;
        $valor->monto_saldo = $request->costonuevo;
        $valor->cantidad_saldo = $request->cantidadnuevo;
        $valor->estado = 1; 
        $valor->uuid = \Str::uuid()->toString();
        $valor->save();

        $stock = Model_b_valores_stock::where('id_concepto_valor', $request->id_concepto_valor)->first();

            if ($stock) {
                // Si ya existe el stock, actualizar los valores
                if ($stock->correlativo_inicial == 0) {
                    $stock->correlativo_inicial += 1;
                }
                $stock->cantidad += $request->cantidad;
                $stock->correlativo_final = $request->correlativo_final;
                $stock->costo += $request->monto;
                $stock->serie = $request->serie;
                $stock->save();
                
                return response()->json(['success' => true]);
            } else {
               
                return response()->json(['success' => false, 'message' => 'No se encontró el valor de stock. No se creará un nuevo registro.']);
            }
        }
    //****ESTA FUNCIÓN PERMITE REGISTRAR UN NUEVO CONCEPTO_VALOR EN MI BD ***********/
    public function guardar_ingreso_valores(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio_unitario' => 'required|numeric',
        ]);
        $valor = new Model_bodega();
        $valor->nombre = $request->nombre;
        $valor->precio_unitario = $request->precio_unitario;
        $valor->estado = 1; 
        $valor->uuid = \Str::uuid()->toString();
        $valor->save();
        return response()->json(['success' => true]);
    }
    //SALIDA VALORES
    public function salida_valores()
    {
        $valores_salida_nuevas = DB::table('solicitud as sol')
            
            ->join('users as u_remitente', 'sol.id_usuario_remitente', '=', 'u_remitente.id')
            ->join('users as u_destinatario', 'sol.id_usuario_destinatario', '=', 'u_destinatario.id')
            ->select(
                'sol.*', 
                'u_remitente.name as nombre_remitente',
                'u_destinatario.name as nombre_destinatario',
                'u_remitente.cargo as cargo'
            )
            ->where('sol.estado', 1)
            ->get();

            $valores_salida_atendidas = DB::table('solicitud as sol')
         
            ->join('users as u_remitente', 'sol.id_usuario_remitente', '=', 'u_remitente.id')
            ->join('users as u_destinatario', 'sol.id_usuario_destinatario', '=', 'u_destinatario.id')
            ->select(
                'sol.*', 
                'u_remitente.name as nombre_remitente',
                'u_destinatario.name as nombre_destinatario',
                'u_remitente.cargo as cargo'
            )
            ->where('sol.estado', 2)
            ->get();

        return view('dashboard.contenido.admin_bodega.salida_valores', compact('valores_salida_nuevas', 'valores_salida_atendidas'));
    }
    public function generar_pdf_valores_entregados(){
        $pdf = \PDF::loadView('dashboard.contenido.admin_bodega.valores_entregados_pdf');
        return $pdf->stream('Rep_valores_entregados.pdf');
    }
   
  public function obtenerDatosCompletos($id)
    {
      
        $valorStock = DB::table('b_valores_stock')
                        ->where('id_concepto_valor', $id)
                        ->first();

      
        $conceptoValor = DB::table('concepto_valores')
                            ->where('id', $id)
                            ->first();

       
        $valorStockVentilla = DB::table('valores_stock')
                                ->where('id_concepto_valor', $id)
                                ->first();

        
        if ($valorStock && $conceptoValor && $valorStockVentilla) {
            return response()->json([
                'correlativo_inicial' => $valorStock->correlativo_inicial,
                'costo' => $valorStock->costo, 
                'cantidad' => $valorStock->cantidad,
                'precio_unitario' => $conceptoValor->precio_unitario,
                'costo_ventilla' => $valorStockVentilla->costo,
                'cantidad_ventilla' => $valorStockVentilla->cantidad
            ]);
        } else {
            return response()->json([
                'correlativo_inicial' => 0,
                'costo' => 0,
                'cantidad' => 0,
                'precio_unitario' => 0,
                'costo_ventilla' => 0, 
                'cantidad_ventilla' => 0
            ]);
        }
    }


    public function verificarStock($idConcepto)
    {
    
        $stock = Model_b_valores_stock::where('id_concepto_valor', $idConcepto)->first();

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
    //****************************** */
    public function form_entrega_valores_bodega($id)
    {
        $valor = Model_solicitud::find($id);
    
        if (!$valor) {
            return redirect()->back()->with('error', 'Solicitud no encontrada.');
        }
    
        $detallesSolicitud = DB::table('solicitud_detalle as sd')
            ->join('concepto_valores as cv', 'sd.id_concepto_valores', '=', 'cv.id')
            ->join('solicitud as sol', 'sd.id_solicitud', '=', 'sol.id')
            ->join('users as u', 'sol.id_usuario_remitente', '=', 'u.id')
            ->where('sd.id_solicitud', $id)
            ->select('sd.*', 'cv.nombre as concepto_nombre', 'u.name', 'sol.fecha_solicitud')
            ->get();
    
        $conceptos = \App\Models\Model_bodega::all();
    
        return view('dashboard.contenido.admin_bodega.form_entrega_valores_bodega', compact('valor', 'detallesSolicitud', 'conceptos'));
    }
    
    public function guardarSolicitudRespuesta(Request $request)
    {
        $request->validate([
            'idSolicitud' => 'required|numeric',
            'fecha_respuesta' => 'required|date',
            'cantidad_detalles' => 'required|numeric',
        ]);
        $solicitud = new Model_respuesta_solicitud();
        $solicitud->id_solicitud = $request->idSolicitud;
        $solicitud->fecha_respuesta = $request->fecha_respuesta;
        $solicitud->cantidad = $request->cantidad_detalles;
        $solicitud->id_usuario = auth()->id();
        $solicitud->estado = 1;
        $solicitud->save();

        foreach ($request->detalles as $detalle) {
            $detalleSolicitud = new Model_respuesta_solicitud_detalle();
            $detalleSolicitud->id_respuesta_solicitud = $solicitud->id;
            $detalleSolicitud->id_concepto_valores = $detalle['id_concepto_valor'];
            $detalleSolicitud->cantidad = $detalle['cantidad'];
            $detalleSolicitud->correlativo_inicial = $detalle['correlativo_inicial'];
            $detalleSolicitud->correlativo_final = $detalle['correlativo_final'];
            $detalleSolicitud->costo = $detalle['costo_total'];
            $detalleSolicitud->monto_saldo_salida = $detalle['montosaldo_salida'];
            $detalleSolicitud->cantidad_saldo_salida = $detalle['cantidadsaldo_salida'];
            $detalleSolicitud->monto_saldo_entrada = $detalle['montosaldo_entrada'];
            $detalleSolicitud->cantidad_saldo_entrada = $detalle['cantidadsaldo_entrada'];
            $detalleSolicitud->estado = 1;
            $detalleSolicitud->save();

            $stock = Model_b_valores_stock::where('id_concepto_valor', $detalle['id_concepto_valor'])->first();
            if ($stock) {
                $stock->cantidad -= $detalle['cantidad']; 
                $stock->costo -= $detalle['costo_total']; 
                $stock->correlativo_inicial = $detalle['correlativo_final'] + 1;
                //$stock->correlativo_final = $detalle['correlativo_final']; 
                $stock->save();
            }
            $valoresStock = Model_valores_stock::where('id_concepto_valor', $detalle['id_concepto_valor'])->first();
        if ($valoresStock) {
            $valoresStock->cantidad += $detalle['cantidad']; 
            $valoresStock->costo += $detalle['costo_total']; 
            $valoresStock->correlativo_final += $detalle['cantidad'];
            if ($valoresStock->correlativo_inicial == 0) {
                $valoresStock->correlativo_inicial = 1; 
            }
            $valoresStock->save();
        }
    }
        $solicitudOriginal = Model_solicitud::find($request->idSolicitud); 
        if ($solicitudOriginal) {
            $solicitudOriginal->estado = 2;  
            $solicitudOriginal->save(); 
        }
    
        return response()->json(['success' => true]);
        
    }
    
    public function reporte_valores_bodega()
    {
        $conceptos = \App\Models\Model_bodega::all();
        $consulta = DB::select('
           (
                SELECT 
                    "ENTRADA" AS tipo_movimiento,
                    cv.nombre AS tipo_documento,
                    cv.precio_unitario,
                    avd.cantidad AS cantidad_entrada,
                    avd.correlativo_ini AS correlativo_ini_entrada,
                    avd.correlativo_fin AS correlativo_fin_entrada,
                    NULL AS cantidad_salida,
                    NULL AS correlativo_ini_salida,
                    NULL AS correlativo_fin_salida,
                    (cv.precio_unitario * avd.cantidad) AS costo,
                    avd.monto,
                    avd.estado AS observacion,
                    avd.created_at AS fecha_creacion
                FROM adquisicion_valores_detalle avd
                INNER JOIN concepto_valores cv ON avd.id_concepto_valores = cv.id
            )
            UNION
            (
                SELECT 
                    "SALIDA" AS tipo_movimiento,
                    cv.nombre AS tipo_documento,
                    cv.precio_unitario,
                    NULL AS cantidad_entrada,
                    NULL AS correlativo_ini_entrada,
                    NULL AS correlativo_fin_entrada,
                    rsd.cantidad AS cantidad_salida,
                    rsd.correlativo_inicial AS correlativo_ini_salida,
                    rsd.correlativo_final AS correlativo_fin_salida,
                    (cv.precio_unitario * rsd.cantidad) AS costo,
                    NULL AS monto,
                    rsd.estado AS observacion,
                    rsd.created_at AS fecha_creacion
                FROM respuesta_solicitud_detalle rsd
                INNER JOIN concepto_valores cv ON rsd.id_concepto_valores = cv.id
            )
            ORDER BY fecha_creacion ASC;
        ');
        return view('dashboard.contenido.admin_bodega.reporte_valores_bodega', compact('consulta','conceptos'));
    }
    public function generatePDFreporte()
    {
        $pdf = \PDF::loadView('dashboard.contenido.admin_bodega.reporte_pdf');
        return $pdf->stream('Reporte_Valor_universitarios.pdf');
    }
}