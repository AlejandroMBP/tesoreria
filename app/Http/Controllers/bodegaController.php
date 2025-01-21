<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Model_bodega;

class bodegaController extends Controller
{
    
//ADMINISTRACION DE BODEGA
    //VALORES UNIVERSITARIOS view
    /*public function valores_universitarios(){
        return view('dashboard.contenido.admin_bodega.valores_universitarios');
    }*/
    //VALORES UNIVERSITARIOS ACTIVOS E INACTIVOS (CAMBIO DE ESTADO)
    public function valores_universitarios() {
        $valores_universitarios_activos = DB::table('concepto_valores')->where('estado', 1)->get();
        $valores_universitarios_inactivos = DB::table('concepto_valores')->where('estado', 0)->get();
        return view('dashboard.contenido.admin_bodega.valores_universitarios', 
            compact('valores_universitarios_activos', 'valores_universitarios_inactivos')
        );
    }
    //**************FUNCION PARA DESACTIVAR AL USUARIO ********************
    public function inactivarVal($id)
    {
        //\Log::info('Intentando inactivar el registro con ID: ' . $id);
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
        // *****Validamos los datos que recibimos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio_unitario' => 'required|numeric',
        ]);

        // ******Creamos un nuevo valor universitario
        $valor = new Model_bodega();
        $valor->nombre = $request->nombre;
        $valor->precio_unitario = $request->precio_unitario;
        $valor->estado = 1; 
        $valor->uuid = \Str::uuid()->toString();
        $valor->save();

        // Responder con éxito
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
    //**************FUNCION PARA ELIMINAR AL USUARIO ********************
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
    
    //PROVEEDORES
    public function proveedores(){
        return view('dashboard.contenido.admin_bodega.proveedores');
    }
    

    //STOCK
    public function stock(){
        return view('dashboard.contenido.admin_bodega.stock');
    }
    //ENTRADA VALORES
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
