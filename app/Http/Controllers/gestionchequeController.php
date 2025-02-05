<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Model_cheque;

class gestionchequeController extends Controller
{
  
    //GESTIÓN DE CHEQUES
    public function cheque(){
        $registros = DB::table('registro_cheque')->get(); 
        return view('dashboard.contenido.gestion_cheque.cheque', compact('registros'));
    }
    public function formulario_registro_cheque(){
        return view('dashboard.contenido.gestion_cheque.formulario_registro_cheque');
    }

    public function guardarCheque(Request $request)
    {
        
        $request->validate([
            'hoja_ruta_Rectorado' => 'nullable|string|max:255',
            'hoja_ruta_DAF' => 'nullable|string|max:255',
            'figura' => 'required|in:cheque,pago electronico,ambos',
            'fecha_ingreso_tesoreria' => 'nullable|date',
            'numero_tipo' => 'nullable|string|max:50',
            'tipo' => 'required|in:devengado,preventivo,acreedor',
            'resumen' => 'nullable|string',
            'numero_cheque' => 'nullable|string|max:50',
            'nombre_beneficiario' => 'nullable|string|max:255',
            'monto_cheque' => 'nullable|numeric|between:0,99999999.99',
            'comprobante' => 'nullable|string|max:255',
            'cuenta' => 'nullable|string|max:255',
            'n_verde_DAF' => 'nullable|string|max:255',
            'fecha_despacho_para_firmas' => 'nullable|date',
            'fecha_reingreso' => 'nullable|date',
            'fecha_entrega_beneficiario' => 'nullable|date',
            'fecha_remision_archivo_contable' => 'nullable|date',
            'observacion' => 'nullable|string',
            'estado' => 'required|in:1,0',
            'revision' => 'required|in:anulado,cancelado,adicionado',
        ]);

        
        $cheque = new Model_cheque();
        
        $cheque->hoja_ruta_Rectorado = $request->hoja_ruta_Rectorado;
        $cheque->hoja_ruta_DAF = $request->hoja_ruta_DAF;
        $cheque->figura = $request->figura;
        $cheque->fecha_ingreso_tesoreria = $request->fecha_ingreso_tesoreria;
        $cheque->numero_tipo = $request->numero_tipo;
        $cheque->tipo = $request->tipo;
        $cheque->resumen = $request->resumen;
        $cheque->numero_cheque = $request->numero_cheque;
        $cheque->nombre_beneficiario = $request->nombre_beneficiario;
        $cheque->monto_cheque = $request->monto_cheque;
        $cheque->comprobante = $request->comprobante;
        $cheque->cuenta = $request->cuenta;
        $cheque->n_verde_DAF = $request->n_verde_DAF;
        $cheque->fecha_despacho_para_firmas = $request->fecha_despacho_para_firmas;
        $cheque->fecha_reingreso = $request->fecha_reingreso;
        $cheque->fecha_entrega_beneficiario = $request->fecha_entrega_beneficiario;
        $cheque->fecha_remision_archivo_contable = $request->fecha_remision_archivo_contable;
        $cheque->observacion = $request->observacion;
        $cheque->estado = $request->estado;
        $cheque->revision = $request->revision;
        
        $cheque->uuid = \Str::uuid()->toString();
        $cheque->id_usuario = auth()->id();
        $cheque->save();
        return redirect()->back()->with('success', 'Cheque guardado exitosamente.');
        
    }
    
}
