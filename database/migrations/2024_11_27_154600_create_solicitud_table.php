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
        Schema::create('solicitud', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario_remitente');
            $table->unsignedBigInteger('id_concepto_val');
            $table->unsignedBigInteger('id_usuario_destinatario');
            $table->date('fecha_solicitud');
            $table->integer('cantidad');
            $table->integer('estado')->default(1);
            $table->unsignedBigInteger('id_tiposolicitud');
            $table->uuid('uuid')->unique();
            $table->timestamps();
            $table->foreign('id_usuario_remitente')->references('id')->on('users');
            $table->foreign('id_concepto_val')->references('id')->on('concepto_valores');
            $table->foreign('id_usuario_destinatario')->references('id')->on('users');
            $table->foreign('id_tiposolicitud')->references('id')->on('tipo_solicitud');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud');
    }
};