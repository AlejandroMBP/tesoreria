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
        Schema::table('b_valores_stock', function (Blueprint $table) {
            $table->dropForeign(['id_concepto_valor']); // Eliminar clave foránea
            $table->dropColumn('id_concepto_valor'); // Eliminar la columna
        });
    }

    public function down()
    {
        Schema::table('b_valores_stock', function (Blueprint $table) {
            $table->unsignedBigInteger('id_concepto_valor')->nullable(); // Restaurar columna
            $table->foreign('id_concepto_valor')->references('id')->on('concepto_valores')->onDelete('cascade'); // Restaurar la clave foránea
        });
    }
};
