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
        Schema::create('movimientos_validados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_extractoQR');
            $table->unsignedBigInteger('id_extractoMOV');
            $table->char('codigo_unico',50);
            $table->timestamps();
            $table->uuid('uuid')->unique();
            $table->foreign('id_extractoQR')->references('id')->on('extracto_movimiento__qr');
            $table->foreign('id_extractoMOV')->references('id')->on('extracto_movimiento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos_validados');
    }
};