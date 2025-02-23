<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('adquisicion_valores', function (Blueprint $table) {
            // Agregar la columna "cantidad_registros" después de "fecha_adquisicion"
            $table->integer('cantidad_registros')->after('fecha_adquisicion')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adquisicion_valores', function (Blueprint $table) {
            // Eliminar la columna "cantidad_registros"
            $table->dropColumn('cantidad_registros');
        });
    }
};
