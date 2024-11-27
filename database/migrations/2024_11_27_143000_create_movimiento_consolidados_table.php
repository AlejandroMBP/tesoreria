<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movimientos_consolidados', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->double('monto');
            $table->year('gestion');
            $table->integer('nroTransaccion_qr_dep');
            $table->string('descripcion');
            $table->date('fecha_movimiento');
            $table->date('fecha_registro');
            $table->integer('id_usuario');
            $table->integer('id_persona');
            $table->unsignedBigInteger('id_concepto');
            $table->integer('id_carrera');
            $table->unsignedBigInteger('movimientos_validados_id_mv');
            $table->timestamps();
            $table->uuid('uuid')->unique();
            $table->foreign('id_concepto')->references('id')->on('concepto');
            $table->foreign('movimientos_validados_id_mv')->references('id')->on('movimientos_validados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimiento_consolidados');
    }
};