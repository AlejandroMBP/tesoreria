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
        Route::get('/sal_val', [administradorController::class,'salida _valores'])->name('salida_valores');
        //GESTIÓN DE DEPÓSITOS
        Route::get('/importar', [administradorController::class,'importar'])->name('importar');
        Route::get('/movimientos', [administradorController::class,'movimientos'])->name('movimientos');
        Route::get('/conceptos', [administradorController::class,'conceptos'])->name('conceptos');
        Route::get('/multiboletas', [administradorController::class,'multiboletas'])->name('multiboletas');
        Route::get('/reportes', [administradorController::class,'reportes'])->name('reportes');
        //GESTIÓN DE VENTANILLA DE VALORES
        Route::get('/stock_vent', [administradorController::class,'stock_ventanilla'])->name('stock_ventanilla');
        Route::get('/sol_val', [administradorController::class,'solicitud_valores'])->name('solicitud_valores');
        Route::get('/ven_val', [administradorController::class,'venta_valores'])->name('venta_valores');
        //GESTIÓN DE CHEQUES
        Route::get('/cheque', [administradorController::class,'cheque'])->name('cheque');


    });
});