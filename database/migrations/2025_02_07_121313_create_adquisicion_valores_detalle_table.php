<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('adquisicion_valores_detalle', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('id_adquisicion_valores'); 
            $table->unsignedBigInteger('id_concepto_valores'); 
            $table->integer('cantidad'); 
            $table->integer('correlativo_ini'); 
            $table->integer('correlativo_fin'); 
            $table->string('serie'); 
            $table->integer('monto'); 
            $table->integer('estado')->default(1);
            $table->timestamps(); 
            $table->uuid('uuid')->unique();

            // Definir las claves foráneas
            $table->foreign('id_adquisicion_valores')->references('id')->on('adquisicion_valores')->onDelete('cascade');
            $table->foreign('id_concepto_valores')->references('id')->on('concepto_valores')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('adquisicion_valores_detalle');
    }
};
