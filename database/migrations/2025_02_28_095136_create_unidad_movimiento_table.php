<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('unidad_movimiento', function (Blueprint $table) {
            $table->id(); // Crea una columna ID autoincremental
            $table->string('descripcion'); // Campo tipo VARCHAR
            $table->integer('estado')->default(1); // 1 = Activo, 0 = Inactivo
            $table->timestamps(); // Crea created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('unidad_movimiento');
    }
};
