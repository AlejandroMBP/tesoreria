<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('b_valores_stock', function (Blueprint $table) {
            $table->dropForeign(['id_provedor']); 
            $table->dropForeign(['id_adquisicion_valores']);
            $table->dropForeign(['id_usuario']);

            $table->dropColumn([
                'id_provedor',
                'id_adquisicion_valores',
                'id_usuario',
                'unidad_medida',
                'monto'
            ]);
        });
    }

    public function down()
    {
        Schema::table('b_valores_stock', function (Blueprint $table) {
            $table->unsignedBigInteger('id_provedor')->nullable();
            $table->unsignedBigInteger('id_adquisicion_valores')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->string('unidad_medida')->nullable();
            $table->decimal('monto', 10, 2)->nullable();

            // Si necesitas volver a agregar las claves foráneas
            $table->foreign('id_proveedor')->references('id')->on('proveedor')->onDelete('cascade');
            $table->foreign('id_adquisicion_valores')->references('id')->on('adquisicion_valores')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
