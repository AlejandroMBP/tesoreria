<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('venta_valores_detalle', function (Blueprint $table) {
            $table->integer('monto_saldo')->after('monto');
            $table->integer('cantidad_saldo')->after('monto_saldo');
        });
    }

    public function down(): void
    {
        Schema::table('venta_valores_detalle', function (Blueprint $table) {
            $table->dropColumn(['monto_saldo', 'cantidad_saldo']);
        });
    }
};
