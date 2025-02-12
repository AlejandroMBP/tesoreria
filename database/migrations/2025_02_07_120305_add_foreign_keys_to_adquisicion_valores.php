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
        Schema::table('adquisicion_valores', function (Blueprint $table) {
            
            $table->unsignedBigInteger('id_proveedor')->nullable()->after('id'); 
            $table->unsignedBigInteger('id_user')->nullable()->after('id_proveedor');

            // Agregar las claves foráneas
            $table->foreign('id_proveedor')->references('id')->on('proveedor')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('adquisicion_valores', function (Blueprint $table) {
            // Eliminar las claves foráneas antes de eliminar las columnas
            $table->dropForeign(['id_proveedor']);
            $table->dropForeign(['id_user']);

            // Eliminar las columnas
            $table->dropColumn(['id_proveedor', 'id_user']);
        });
    }
};
