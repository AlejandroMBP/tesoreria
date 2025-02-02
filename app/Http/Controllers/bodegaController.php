<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Model_bodega;
use App\Models\Model_proveedor;
use App\Models\Model_stock;
use App\Models\Model_solicitud;
use App\Models\Model_adquisicion;
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
    
    //**************FUNCION PARA ACTIVAR AL USUARIO ********************
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
//**************FUNCION PARA OBTENER VALOR ********************
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
    public function guardarProv(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'contacto' => 'required|numeric|digits_between:5,15', 
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
    $valores = DB::table('b_valores_stock')
        ->join('concepto_valores', 'b_valores_stock.id_concepto_valor', '=', 'concepto_valores.id')
        ->join('adquisicion_valores','b_valores_stock.id_adquisicion_valores', '=', 'adquisicion_valores.id')
        ->where('b_valores_stock.cantidad', '<', 50)
        ->where('concepto_valores.estado', '=', 1) 
        ->select('b_valores_stock.*', 'concepto_valores.nombre', 'concepto_valores.estado','fecha_adquisicion')
        ->get();

    return response()->json($valores);
}

public function obtenerValoresSuficientes()
{
    $valores = DB::table('b_valores_stock')
        ->join('concepto_valores', 'b_valores_stock.id_concepto_valor', '=', 'concepto_valores.id')
        ->join('adquisicion_valores','b_valores_stock.id_adquisicion_valores', '=', 'adquisicion_valores.id')
        ->where('b_valores_stock.cantidad', '>=', 50)
        ->where('concepto_valores.estado', '=', 1) 
        ->select('b_valores_stock.*', 'concepto_valores.nombre', 'concepto_valores.estado','adquisicion_valores.fecha_adquisicion')
        ->get();

    return response()->json($valores);
}
    //ENTRADA VALORES
    public function entrada_valores(){
       
        $lista_adquisiciones = DB::table('adquisicion_valores')->where('estado', 1)->get();
        return view('dashboard.contenido.admin_bodega.entrada_valores',compact('lista_adquisiciones'));
    }

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
    public function registrarEntrada($id)
    {
        $adquisicion = Model_adquisicion::find($id);
        if (!$adquisicion) {
            return redirect()->route('ruta_de_error')->with('error', 'Registro no encontrado.');
        }
       
        return view('dashboard.contenido.admin_bodega.registro_entrada_valores', compact('adquisicion'));
    }
    
   
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
            ->join('concepto_valores as cv', 'sol.id_concepto_val', '=', 'cv.id')
            ->join('users as u_remitente', 'sol.id_usuario_remitente', '=', 'u_remitente.id')
            ->join('users as u_destinatario', 'sol.id_usuario_destinatario', '=', 'u_destinatario.id')
            ->select(
                'sol.*', 
                'cv.nombre as concepto_nombre',
                'u_remitente.name as nombre_remitente',
                'u_destinatario.name as nombre_destinatario',
                'u_remitente.cargo as cargo'
            )
            ->where('sol.estado', 1)
            ->get();

            $valores_salida_atendidas = DB::table('solicitud as sol')
            ->join('concepto_valores as cv', 'sol.id_concepto_val', '=', 'cv.id')
            ->join('users as u_remitente', 'sol.id_usuario_remitente', '=', 'u_remitente.id')
            ->join('users as u_destinatario', 'sol.id_usuario_destinatario', '=', 'u_destinatario.id')
            ->select(
                'sol.*', 
                'cv.nombre as concepto_nombre',
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
    //***************************** */
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
