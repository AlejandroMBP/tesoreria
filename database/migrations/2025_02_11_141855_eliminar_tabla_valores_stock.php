<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Eliminar la tabla valores_stock
        Schema::dropIfExists('valores_stock');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Si necesitas restaurar la tabla en el futuro, puedes crearla nuevamente aquí.
        Schema::create('valores_stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_concepto_valores');
            $table->foreign('id_concepto_valores')->references('id')->on('concepto_valores')->onDelete('cascade');
            $table->integer('cantidad')->default(0);
            $table->integer('estado')->default(1);
            $table->integer('correlativo_inicial')->default(0);
            $table->integer('correlativo_final')->default(0);
            $table->integer('serie')->default(0);
            $table->timestamps();
        });
    }
};
