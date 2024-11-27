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
        Schema::create('valores_stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_concepto_valores');
            $table->integer('cantidad');
            $table->integer('estado')->default(1);
            $table->integer('correlativo_inicial');
            $table->integer('correlativo_final');
            $table->date('fecha');
            $table->string('serie',20);
            $table->unsignedBigInteger('id_usuario');
            $table->string('unidad_medida',40);
            $table->unsignedBigInteger('id_solicitud');
            $table->timestamps();
            $table->uuid('uuid')->unique();
            $table->foreign('id_concepto_valores')->references('id')->on('concepto_valores');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_solicitud')->references('id')->on('solicitud');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valores_stock');
    }
};