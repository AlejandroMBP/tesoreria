<?php

namespace App\Observers;

use App\Models\Model_bodega; // Asegúrate de usar la ruta correcta a tu modelo
use App\Models\Model_b_valores_stock; 
use App\Models\Model_valores_stock;// Asegúrate de usar la ruta correcta a tu modelo

class ModelBodegaObserver
{
    /**
     * Handle the Model_bodega "created" event.
     *
     * @param  \App\Models\Model_bodega  $modelBodega
     * @return void
     */
    public function created(Model_bodega $modelBodega)
    {


        $valor = new Model_b_valores_stock();
        $valor->id_concepto_valor = $modelBodega->id;
        $valor->cantidad = 0;
        $valor->correlativo_inicial = 0;
        $valor->correlativo_final = 0; 
        $valor->serie = 0; 
        $valor->estado = 1; 
        $valor->uuid = \Str::uuid()->toString();
        $valor->save();



        $valorValoresStock = new Model_valores_stock();
        $valorValoresStock->id_concepto_valor = $modelBodega->id;
        $valorValoresStock->cantidad = 0;    
        $valorValoresStock->correlativo_inicial = 0;
        $valorValoresStock->correlativo_final = 0;
        $valorValoresStock->serie = 0; 
        $valorValoresStock->estado = 1; 
        $valorValoresStock->save();
        
    }

    

    /**
     * Handle the Model_bodega "updated" event.
     *
     * @param  \App\Models\Model_bodega  $modelBodega
     * @return void
     */
    public function updated(Model_bodega $modelBodega)
    {
        //
    }

    /**
     * Handle the Model_bodega "deleted" event.
     *
     * @param  \App\Models\Model_bodega  $modelBodega
     * @return void
     */
    public function deleted(Model_bodega $modelBodega)
    {
        //
    }

    /**
     * Handle the Model_bodega "restored" event.
     *
     * @param  \App\Models\Model_bodega  $modelBodega
     * @return void
     */
    public function restored(Model_bodega $modelBodega)
    {
        //
    }

    /**
     * Handle the Model_bodega "force deleted" event.
     *
     * @param  \App\Models\Model_bodega  $modelBodega
     * @return void
     */
    public function forceDeleted(Model_bodega $modelBodega)
    {
        //
    }
}
