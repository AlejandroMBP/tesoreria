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
        Schema::create('concepto', function (Blueprint $table) {
            $table->id();
            $table->string('concepto',500);
            $table->string('montoMinimo',45);
            $table->enum('tipoNacionalidad',[ 'nacional','extranjero']);
            $table->tinyInteger('estadoConcepto');
            $table->integer('unidadMovimiento_id');
            $table->integer('id_usuario');
            $table->unsignedBigInteger('id_tipo');
            $table->timestamps();
            $table->uuid('uuid')->unique();
            $table->foreign('id_tipo')->references('id')->on('tipo_concepto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concepto');
    }
};