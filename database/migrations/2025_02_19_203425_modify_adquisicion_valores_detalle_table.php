<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up(): void
    {
        Schema::table('adquisicion_valores_detalle', function (Blueprint $table) {
        
            

            // Agregar las nuevas columnas después de 'costo'
            $table->integer('monto_saldo')->after('monto');
            $table->integer('cantidad_saldo')->after('monto_saldo');
        });
    }

    public function down(): void
    {
        Schema::table('adquisicion_valores_detalle', function (Blueprint $table) {
            // Volver a renombrar 'costo' a 'monto'
            $table->renameColumn('costo', 'monto');

            // Eliminar las nuevas columnas
            $table->dropColumn(['monto_saldo', 'cantidad_saldo']);
        });
    }
};
