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
        Schema::create('solicitud_detalle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_solicitud');
            $table->unsignedBigInteger('id_concepto_valores');
            $table->integer('estado')->default(1);
            $table->integer('cantidad');
            $table->timestamps();
            $table->foreign('id_solicitud')->references('id')->on('solicitud');
            $table->foreign('id_concepto_valores')->references('id')->on('concepto_valores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_detalle');
    }
};
