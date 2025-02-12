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
        // Eliminar la clave foránea de la tabla venta_valores_detalle
        Schema::table('venta_valores_detalle', function (Blueprint $table) {
            // Cambia 'nombre_clave_foranea' por el nombre real de la clave foránea
            $table->dropForeign(['id_val_stock']); // Asumiendo que el nombre de la columna es id_valores_stock
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Si necesitas restaurar la clave foránea en el futuro, puedes hacerlo aquí.
        Schema::table('venta_valores_detalle', function (Blueprint $table) {
            $table->foreign('id_val_stock') // Asegúrate de que esta columna y la tabla sean correctas
                  ->references('id')
                  ->on('valores_stock')
                  ->onDelete('cascade');
        });
    }
};
