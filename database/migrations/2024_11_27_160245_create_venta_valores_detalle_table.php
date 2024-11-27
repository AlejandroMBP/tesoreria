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
        Schema::create('venta_valores_detalle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_concepto_val');
            $table->integer('cantidad');
            $table->unsignedBigInteger('id_usuario');
            $table->integer('correlativo_inicial');
            $table->integer('correlativo_final');
            $table->double('monto_total');
            $table->string('serie',20);
            $table->unsignedBigInteger('id_val_stock');
            $table->unsignedBigInteger('id_vent_val');
            $table->timestamps();
            $table->uuid('uuid')->unique();
            $table->foreign('id_concepto_val')->references('id')->on('concepto_valores');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_val_stock')->references('id')->on('valores_stock');
            $table->foreign('id_vent_val')->references('id')->on('venta_valores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_valores_detalle');
    }
};