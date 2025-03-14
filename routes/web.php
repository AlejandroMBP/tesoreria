<?php

use App\Http\Controllers\administradorController;
use App\Http\Controllers\RoleCOntroller;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\bodegaController;
use App\Http\Controllers\depositosController;
use App\Http\Controllers\ventanillavalController;
use App\Http\Controllers\gestionchequeController;
use App\Http\Controllers\configuracionController;
use App\Http\Controllers\documentacionController;
use App\Http\Controllers\pdfController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->group(function () {
    Route::get('/dashboard',[administradorController::class,'index'])->name('metricas');
    Route::group(['middleware'], function(){
        Route::get('/usuarios',[usuarioController::class,'index'])
        ->name('usuario.index');
        Route::post('/create',[usuarioController::class,'store'])
        ->name('usuario.store');
        // Route::get('/Edit/{user}',[usuarioController::class,'edit'])
        // ->name('usuario.edit');
        Route::put('/update/{user}',[usuarioController::class,'update'])
        ->name('usuario.update');
        Route::put('/{id}',[usuarioController::class,'cambioEstado'])
        ->name('usuario.cambioEstado');

        //Actualizar contraseña
        Route::post('/actualizar-contraseña', [UsuarioController::class, 'actualizarContraseña'])->name('usuario.actualizarContraseña');
        //PDF
        Route::get('/formulario/{id_solicitud}', [PdfController::class, 'mostrarFormulario']);
        Route::get('/generar-pdf/{id_solicitud}', [PdfController::class, 'generarSalidaValoresPDF'])->name('generar-pdf');
        Route::get('/reporte-bodega-pdf', [PdfController::class, 'generatePdf']);  
        Route::get('generar_pdf_solicitud/{id}', [PdfController::class, 'generarPdfSolicitud'])->name('generar_pdf_solicitud');
        Route::get('/generar-pdf-reporte', [PdfController::class, 'generarPdfReporteVen'])->name('generar-pdf-reporte');
        //route::get('pdf-reporte-ventanilla/{id_solicitud}', [PdfController::class, 'Pdf_reporte_ventanilla'])->name('pdf-reporte-ventanilla');
        Route::get('/pdf_reporte_ventanilla', [PdfController::class, 'pdf_reporte_ventanilla'])->name('pdf_reporte_ventanilla');
        

        // rutas de roles
        Route::get('roles', [RoleCOntroller::class,'index'])->name('roles.index');
        // Route::get('/roles/{edit}',[RoleCOntroller::class,'edit'])->name('roles.edit');
        Route::post('/roles/create',[RoleCOntroller::class,'store'])->name('roles.store');
        Route::put('/roles/update/{roles}',[RoleCOntroller::class,'update'])->name('roles.update');
        Route::delete('/roles/destroy/{id}',[RoleCOntroller::class,'destroy'])->name('roles.destroy');
        Route::get('/admin', [administradorController::class,'admin_usuarios'])->name('admin_usuarios');
        //USUARIOS
        Route::put('/usuarios/{id}/inactivar', [administradorController::class, 'inactivar'])->name('usuarios.inactivar');
        Route::put('/usuarios/{id}/activar', [administradorController::class, 'activar'])->name('usuarios.activar');
        Route::put('/usuarios/{id}/eliminar', [administradorController::class, 'eliminar'])->name('usuarios.eliminar');
        //ADMINISTRACION DE BODEGA
        Route::get('/val_univ', [bodegaController::class,'valores_universitarios'])->name('valores_universitarios');
        //****** VALORES UNIVERSITARIOS*/
        Route::post('/guardarValor', [bodegaController::class, 'guardarVal']);
        Route::put('/val_univ/{id}/inactivarVal', [bodegaController::class, 'inactivarVal'])->name('val_univ.inactivarVal');
        Route::put('/val_univ/{id}/activarVal', [bodegaController::class, 'activarVal'])->name('val_univ.activarVal');
        Route::put('/val_univ/{id}/eliminarVal', [bodegaController::class, 'eliminarVal'])->name('val_univ.eliminarVal');
        Route::get('/val_univ/obtenerval', [bodegaController::class, 'obtenerval'])->name('val_univ.obtenerval');
        Route::post('/val_univ/actualizarval', [bodegaController::class, 'actualizarval'])->name('val_univ.actualizarval');
        // PROVEEDORES
        Route::get('/proveedores', [bodegaController::class,'proveedores'])->name('proveedores');
        Route::post('/guardarProv', [bodegaController::class, 'guardarProveedor']);
        Route::put('/proveedores/{id}/inactivarProv', [bodegaController::class, 'inactivarProv']);
        Route::put('/proveedores/{id}/activarProv', [bodegaController::class, 'activarProv']);
        Route::put('/proveedores/{id}/eliminarProv', [bodegaController::class, 'eliminarProv']);
        Route::get('/proveedores/obtenerProv', [bodegaController::class, 'obtenerProv'])->name('proveedores.obtenerProv');
        Route::post('/proveedores/actualizarProv', [bodegaController::class, 'actualizarProv'])->name('proveedores.actualizarProv');
        //STOCK
        Route::get('/stock', [bodegaController::class,'stock'])->name('stock');
        Route::get('stock/valores-escasos', [bodegaController::class, 'obtenerValoresEscasos']);
        Route::get('stock/valores-suficientes', [bodegaController::class, 'obtenerValoresSuficientes']);
      

        //********************ENTRADA VALORES*************
        Route::get('/ent_val', [bodegaController::class,'entrada_valores'])->name('entrada_valores');
        //Route::post('/guardar_adquisicion', [bodegaController::class, 'guardar_adqui']);
        //Route::post('/guardar_adqui_detalle', [bodegaController::class, 'guardarEntradaDetalle']);

        //Route::get('/registrar_entrada/{id}', [bodegaController::class, 'registrarEntrada'])->name('registrar_entrada');
        Route::get('/registrar_entrada', [bodegaController::class, 'registrarEntrada'])->name('registrar_entradas');
        Route::get('/formulario_entrada_valores', [bodegaController::class, 'form_entrada_valores'])->name('formulario_entradaValores');
        //Route::get('/obtener-costo/{id}', [bodegaController::class, 'obtenerCosto']);
        Route::get('/verificar-stock/{idConcepto}', [bodegaController::class, 'verificarStock']);
        Route::post('/guardarAdquis', [bodegaController::class, 'guardarAdquisiciones'])->name('guardaradquis');

      

        //********************SALIDA VALORES*************
        
        Route::get('/sal_val', [bodegaController::class, 'salida_valores'])->name('salida_valores');
        //********************REPORTE VALORES */
        Route::get('/filtrar-reporte', [bodegaController::class, 'filtrarReporte'])->name('filtrar.reporte');


        //********************FORM ENTREGA VALORES*************
        Route::get('/sol_val_bod/{id}', [bodegaController::class, 'form_entrega_valores_bodega'])->name('form_entrega_valores_bodega');
        //Route::post('/guardar_form_entrega', [bodegaController::class, 'guardarFormEntrega'])->name('guardarFormEntrega');
        //Route::post('/guardar_form_entreg', [bodegaController::class, 'guardarFormEntrega']);
        Route::post('/guardarSolResp', [bodegaController::class, 'guardarSolicitudRespuesta'])->name('guardarSolicitudRespuesta');

        Route::get('/rep_val_bod', [bodegaController::class,'reporte_valores_bodega'])->name('reporte_valores_bodega');
        Route::get('generar_pdf_valores_entregados', [bodegaController::class, 'generar_pdf_valores_entregados']);
        Route::get('generar-pdf', [bodegaController::class, 'generatePDFreporte']);
        //Route::get('/obtener-correlativo/{id}', [bodegaController::class, 'obtenerCorrelativo']);
        //Route::get('/obtener-costo_stock/{id}', [bodegaController::class, 'obtenerCostoStock']);
        //Route::get('/obtener-precio_unitario/{id}', [bodegaController::class, 'obtenerPrecioUnitario']);
        //Route::get('/obtener-cantidadCosto/{id}', [bodegaController::class, 'obtenerCantidaCostoVentanilla']);
        Route::get('/obtener-datos-completos/{id}', [bodegaController::class, 'obtenerDatosCompletos']);
        //----------------------------------GESTIÓN DE DEPÓSITOS--------------------------------------------
        Route::get('/importar', [depositosController::class,'importar'])->name('importar');
        Route::get('/movimientos', [depositosController::class,'movimientos'])->name('movimientos');
        //****************************CONCEPTOS************************************************************/
        Route::get('/conceptos', [depositosController::class,'conceptos'])->name('conceptos');
        Route::post('/guardarConcepto', [depositosController::class, 'guardarConceptos']);
        Route::put('/concepto_univ/{id}/inactivarConcepto', [depositosController::class, 'inactivarConceptos'])->name('concepto_univ.inactivarConcepto');
        Route::put('/concepto_univ/{id}/activarConcepto', [depositosController::class, 'activarConceptos'])->name('concepto_univ.activarConcepto');
        Route::put('/concepto_univ/{id}/eliminarConcepto', [depositosController::class, 'eliminarConceptos'])->name('concepto_univ.eliminarConceptos');
        //Route::get('/concepto_obtener/{id}', [depositosController::class, 'obtenerConcepto']);
        //Route::post('/concepto_actualizar', [depositosController::class, 'actualizarConcepto']);
        Route::get('/concepto/obtenerval', [depositosController::class, 'obtenerConcepto'])->name('concepto.obtenerconcepto');
        Route::post('/concepto/actualizarconcepto', [depositosController::class, 'actualizarConcepto'])->name('concepto.actualizarconcepto');
        //*****************************MULTIBOLETAS*******************************************************/
        Route::get('/multiboletas', [depositosController::class,'multiboletas'])->name('multiboletas');
        //*****************************REPORTES DEPOSITOS*******************************************************/
        Route::get('/reportes', [depositosController::class,'reportes'])->name('reportes');

        //GESTIÓN DE VENTANILLA DE VALORES
        Route::get('/stock_vent', [ventanillavalController::class,'stock_ventanilla'])->name('stock_ventanilla');
        Route::get('/sol_val', [ventanillavalController::class,'solicitud_valores'])->name('solicitud_valores');
        Route::get('/form_sol_val', [ventanillavalController::class,'formulario_solicitud_valores'])->name('formulario_solicitud_valores');

        Route::post('/guardarSol', [ventanillavalController::class, 'guardarSolicitud'])->name('guardarSolicitud');
        Route::get('stock/valores-escasos_ventanilla', [ventanillavalController::class, 'obtenerValoresEscasosVentanilla']);
        Route::get('stock/valores-suficientes_ventanilla', [ventanillavalController::class, 'obtenerValoresSuficientesVentanilla']);
        Route::post('/guardarVentaValor', [ventanillavalController::class, 'guardarVentaVal']);
        //GESTION DE REPORTES
        Route::get('reportes_ventanilla', [ventanillavalController::class, 'reporte_valores_ventanilla'])->name('reportes_ventanilla');

        Route::get('/ven_val', [ventanillavalController::class,'venta_valores'])->name('venta_valores');
        Route::get('/registro_ventas_valores/{id}', [ventanillavalController::class,'registro_ventas_valores'])->name('registro_ventas_valores');
        Route::get('generar_pdf_solicitud', [ventanillavalController::class, 'generatePDFsolicitud']);
        Route::post('/guardarVentaDetalle', [ventanillavalController::class, 'guardarVentaValDetalle'])->name('guardarVentaValDet');
        Route::get('/obtener-correlativo_stock_ventanilla/{id}', [ventanillavalController::class, 'obtenerCorrelativoStockVentanilla']);
        Route::get('/verifi_stock_ventanilla/{idConcepto}', [ventanillavalController::class,'verificarStockVentanilla']);     
        Route::get('/imprimir-venta/{id}', [ventanillavalController::class, 'generarPDFventa'])->name('imprimir_venta');
        //GESTIÓN DE CHEQUES
        Route::get('/cheque', [gestionchequeController::class,'cheque'])->name('cheque');
        Route::get('/form_cheque', [gestionchequeController::class,'formulario_registro_cheque'])->name('formulario_registro_cheque');
        Route::post('/form_cheque/guardar', [gestionchequeController::class, 'guardarCheque'])->name('cheques.guardar');
        //******ADMINISTRACIÓN OTROS
        //CONFIGURACION
        Route::get('/configuracion', [configuracionController::class,'configuracion'])->name('configuracion');
        //DOCUMENTACIÓN
        Route::get('/documentacion', [documentacionController::class,'documentacion'])->name('documentacion');

        Route::post('/logout', function () {
            Auth::guard('web')->logout();  // Usar el guard 'web' para cerrar sesión en el contexto de sesiones web
            return redirect('/');
        })->name('logout');
    });
});