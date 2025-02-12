<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('valores_stock', function (Blueprint $table) {
            // Eliminar claves foráneas antes de eliminar los campos
            $table->dropForeign(['id_usuario']);
            $table->dropForeign(['id_solicitud']);

            // Eliminar columnas
            $table->dropColumn(['id_usuario', 'unidad_medida', 'id_solicitud']);
        });
    }

    public function down(): void
    {
        Schema::table('valores_stock', function (Blueprint $table) {
            // Restaurar las columnas
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->string('unidad_medida')->nullable();
            $table->unsignedBigInteger('id_solicitud')->nullable();

            // Restaurar las claves foráneas
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_solicitud')->references('id')->on('solicitud')->onDelete('cascade');
        });
    }
};
