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
        Schema::create('b_valores_stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_concepto_valor');
            $table->double('cantidad');
            $table->integer('correlativo_inicial');
            $table->integer('correlativo_final');
            $table->string('serie');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_provedor');
            $table->string('unidad_medida');
            $table->integer('monto');
            $table->integer('estado')->default(1); //activo  = 1
            $table->unsignedBigInteger('id_adquisicion_valores');
            $table->uuid('uuid')->unique();
            $table->timestamps();
            $table->foreign('id_concepto_valor')->references('id')->on('concepto_valores');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_provedor')->references('id')->on('proveedor');
            $table->foreign('id_adquisicion_valores')->references('id')->on('adquisicion_valores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('b_valores_stock');
    }
};