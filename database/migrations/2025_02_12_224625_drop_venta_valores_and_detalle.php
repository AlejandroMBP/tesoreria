<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('venta_valores_detalle');
        Schema::dropIfExists('venta_valores');
    }

    public function down()
    {
        Schema::create('venta_valores', function (Blueprint $table) {
            $table->id();
            $table->string('nro_informe');
            $table->timestamps();
        });

        Schema::create('venta_valores_detalle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_vent_val');
            $table->unsignedBigInteger('id_concepto_val');
            $table->timestamps();

            $table->foreign('id_vent_val')->references('id')->on('venta_valores')->onDelete('cascade');
            $table->foreign('id_concepto_val')->references('id')->on('concepto_valores')->onDelete('cascade');
        });
    }
};
