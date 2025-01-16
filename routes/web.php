<?php

use App\Http\Controllers\administradorController;
use App\Http\Controllers\RoleCOntroller;
use App\Http\Controllers\usuarioController;
use Illuminate\Support\Facades\Route;




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

        // rutas de roles
        Route::get('roles', [RoleCOntroller::class,'index'])->name('roles.index');
        // Route::get('/roles/{edit}',[RoleCOntroller::class,'edit'])->name('roles.edit');
        Route::post('/roles/create',[RoleCOntroller::class,'store'])->name('roles.store');
        Route::put('/roles/update/{roles}',[RoleCOntroller::class,'update'])->name('roles.update');
        Route::delete('/roles/destroy/{id}',[RoleCOntroller::class,'destroy'])->name('roles.destroy');
        Route::get('/admin', [administradorController::class,'admin_usuarios'])->name('admin_usuarios');
        //ADMINISTRACION DE BODEGA
        Route::get('/val_univ', [administradorController::class,'valores_universitarios'])->name('valores_universitarios');
        Route::get('/proveedores', [administradorController::class,'proveedores'])->name('proveedores');
        Route::get('/stock', [administradorController::class,'stock'])->name('stock');
        Route::get('/ent_val', [administradorController::class,'entrada_valores'])->name('entrada_valores');
        Route::get('/sal_val', [administradorController::class,'salida_valores'])->name('salida_valores');
        Route::get('/sol_val_bod', [administradorController::class,'form_entrega_valores_bodega'])->name('form_entrega_valores_bodega');
        Route::get('/rep_val_bod', [administradorController::class,'reporte_valores_bodega'])->name('reporte_valores_bodega');
        Route::get('generar-pdf', [administradorController::class, 'generatePDFreporte']);
        //GESTIÓN DE DEPÓSITOS
        Route::get('/importar', [administradorController::class,'importar'])->name('importar');
        Route::get('/movimientos', [administradorController::class,'movimientos'])->name('movimientos');
        Route::get('/conceptos', [administradorController::class,'conceptos'])->name('conceptos');
        Route::get('/multiboletas', [administradorController::class,'multiboletas'])->name('multiboletas');
        Route::get('/reportes', [administradorController::class,'reportes'])->name('reportes');
        //GESTIÓN DE VENTANILLA DE VALORES
        Route::get('/stock_vent', [administradorController::class,'stock_ventanilla'])->name('stock_ventanilla');
        Route::get('/sol_val', [administradorController::class,'solicitud_valores'])->name('solicitud_valores');
        Route::get('/form_sol_val', [administradorController::class,'formulario_solicitud_valores'])->name('formulario_solicitud_valores');
        Route::get('/ven_val', [administradorController::class,'venta_valores'])->name('venta_valores');
        Route::get('/reg_ven_val', [administradorController::class,'registro_ventas_valores'])->name('registro_ventas_valores');
        Route::get('generar-pdf_solicitud', [administradorController::class, 'generatePDFsolicitud']);
        //GESTIÓN DE CHEQUES
        Route::get('/cheque', [administradorController::class,'cheque'])->name('cheque');
        Route::get('/form_cheque', [administradorController::class,'formulario_registro_cheque'])->name('formulario_registro_cheque');


    });
});