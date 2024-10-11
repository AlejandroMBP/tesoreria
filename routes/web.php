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
    });
});