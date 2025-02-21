<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('respuesta_solicitud_detalle', function (Blueprint $table) {
            $table->integer('costo')->after('correlativo_final');
            $table->integer('monto_saldo_salida')->after('costo');
            $table->integer('cantidad_saldo_salida')->after('monto_saldo_salida');
            $table->integer('monto_saldo_entrada')->after('cantidad_saldo_salida');
            $table->integer('cantidad_saldo_entrada')->after('monto_saldo_entrada');
        });
    }

    public function down(): void
    {
        Schema::table('respuesta_solicitud_detalle', function (Blueprint $table) {
            $table->dropColumn(['costo', 'monto_saldo_salida', 'cantidad_saldo_salida', 'monto_saldo_entrada', 'cantidad_saldo_entrada']);
        });
    }
};
