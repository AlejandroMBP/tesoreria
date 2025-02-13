<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('venta_valores', function (Blueprint $table) {
            $table->id();
            $table->string('nro_informe'); 
            $table->date('fecha_venta'); 
            $table->unsignedBigInteger('id_user'); // Nueva FK de users
            $table->uuid('uuid')->unique();
            $table->timestamps();

            // Definir la clave foránea
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('venta_valores');
    }
};
