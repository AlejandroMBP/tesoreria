<?php

use App\Http\Controllers\administradorController;
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

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])
->group(function () {
    Route::get('/dashboard',[administradorController::class,'index'])->name('metricas');
    Route::get('/usuarios',[usuarioController::class,'index'])->name('usuario.index');
    Route::put('/{id}',[usuarioController::class,'cambioEstado'])->name('usuario.eliminar');
});