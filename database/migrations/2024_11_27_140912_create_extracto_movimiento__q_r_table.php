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
        Schema::create('extracto_movimiento__qr', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_transaccion');
            $table->date('fecha');
            $table->unsignedBigInteger('id_concepto');
            $table->year('gestion');
            $table->timestamps();
            $table->uuid('uuid')->unique();
            $table->foreign('id_concepto')->references('id')->on('concepto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extracto_movimiento__qr');
    }
};