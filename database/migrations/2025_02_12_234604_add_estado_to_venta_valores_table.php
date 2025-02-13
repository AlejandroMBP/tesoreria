<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('venta_valores', function (Blueprint $table) {
            // Agregar el campo 'estado' después de 'id_user' con valor por defecto
            $table->tinyInteger('estado')->default(1)->after('id_user');
        });
    }

    public function down()
    {
        Schema::table('venta_valores', function (Blueprint $table) {
            // Eliminar el campo 'estado'
            $table->dropColumn('estado');
        });
    }
};
