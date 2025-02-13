<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('venta_valores_detalle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_venta_valores'); // Clave foránea de venta_valores
            $table->unsignedBigInteger('id_concepto_valores'); // Clave foránea de concepto_valores
            $table->integer('cantidad');
            $table->integer('correlativo_inicial');
            $table->integer('correlativo_final');
        
            $table->integer('monto'); // Suponiendo que es un monto, ajusta según lo necesites
            $table->integer('estado')->default(1);
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('id_venta_valores')->references('id')->on('venta_valores')->onDelete('cascade');
            $table->foreign('id_concepto_valores')->references('id')->on('concepto_valores')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('venta_valores_detalle');
    }
};
