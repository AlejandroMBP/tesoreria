<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('b_valores_stock', function (Blueprint $table) {
        // Definir la clave foránea
        $table->foreign('id_concepto_valor')
              ->references('id')  // El campo que está referenciado en la tabla 'concepto_valores'
              ->on('concepto_valores')  // La tabla con la que se relaciona
              ->onDelete('cascade');  // Acción a tomar cuando se elimina el registro en la tabla referenciada (puedes usar 'cascade', 'set null', 'restrict', etc.)
    });
}

public function down()
{
    Schema::table('b_valores_stock', function (Blueprint $table) {
        // Eliminar la clave foránea si se deshace la migración
        $table->dropForeign(['id_concepto_valor']);
    });
}
};
