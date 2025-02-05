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
        Schema::create('respuesta_solicitud', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_solicitud');
            $table->date('fecha_respuesta');
            $table->unsignedBigInteger('id_usuario');
            $table->integer('estado')->default(1);
            $table->timestamps();
            $table->foreign('id_solicitud')->references('id')->on('solicitud');
            $table->foreign('id_usuario')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuesta_solicitud');
    }
};
