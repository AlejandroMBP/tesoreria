<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaValoresStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Crear la tabla valores_stock
        Schema::create('valores_stock', function (Blueprint $table) {
            $table->id();  // ID auto incremental
            $table->unsignedBigInteger('id_concepto_valor'); 
            $table->integer('cantidad')->default(0);
            $table->integer('correlativo_inicial')->default(0); 
            $table->integer('correlativo_final')->default(0); 
            $table->string('serie',45);
            $table->integer('estado')->default(1); 
           

            $table->foreign('id_concepto_valor')
                  ->references('id')
                  ->on('concepto_valores')
                  ->onDelete('cascade'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar la tabla valores_stock si es necesario revertir la migración
        Schema::dropIfExists('valores_stock');
    }
}
