<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('venta_valores_detalle', function (Blueprint $table) {
            $table->dropForeign(['id_usuario']); // Elimina la clave foránea
            $table->dropColumn('id_usuario');   // Elimina la columna
        });
    }

    public function down()
    {
        Schema::table('venta_valores_detalle', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario')->nullable(); // Agregar la columna de nuevo en caso de rollback
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
