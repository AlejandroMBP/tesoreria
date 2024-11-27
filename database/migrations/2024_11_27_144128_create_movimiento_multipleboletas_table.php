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
        Schema::create('movimiento_multipleboletas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_concepto');
            $table->integer('id_usuario');
            $table->integer('id_carrera');
            $table->string('CI',45);
            $table->string('codigo',12);
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
        Schema::dropIfExists('movimiento_multipleboletas');
    }
};