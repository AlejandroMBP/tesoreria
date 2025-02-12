<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('b_valores_stock', function (Blueprint $table) {
            // Verificar si la columna no existe antes de agregarla
            if (!Schema::hasColumn('b_valores_stock', 'id_concepto_valor')) {
                $table->unsignedBigInteger('id_concepto_valor')->after('id');
                $table->foreign('id_concepto_valor')
                      ->references('id')
                      ->on('concepto_valores')
                      ->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('b_valores_stock', function (Blueprint $table) {
            // Verificar si la columna y la clave foránea existen antes de eliminarlas
            if (Schema::hasColumn('b_valores_stock', 'id_concepto_valor')) {
                $table->dropForeign(['id_concepto_valor']);
                $table->dropColumn('id_concepto_valor');
            }
        });
    }
};
