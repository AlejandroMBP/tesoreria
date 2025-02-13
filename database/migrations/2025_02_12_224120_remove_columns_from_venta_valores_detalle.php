<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('venta_valores_detalle', function (Blueprint $table) {
            // Eliminar las claves foráneas
            $table->dropForeign(['id_concepto_val']);
            $table->dropForeign(['id_vent_val']);

            // Eliminar las columnas
            $table->dropColumn(['id_concepto_val', 'id_vent_val']);
        });
    }

    public function down()
    {
        Schema::table('venta_valores_detalle', function (Blueprint $table) {
            // Restaurar las columnas eliminadas
            $table->unsignedBigInteger('id_concepto_val');
            $table->unsignedBigInteger('id_vent_val');

            // Restaurar las claves foráneas
            $table->foreign('id_concepto_val')->references('id')->on('concepto_valores')->onDelete('cascade');
            $table->foreign('id_vent_val')->references('id')->on('venta_valores')->onDelete('cascade');
        });
    }
};
