<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('venta_valores_detalle', function (Blueprint $table) {
            $table->dropColumn(['serie', 'id_val_stock']);
        });
    }

    public function down()
    {
        Schema::table('venta_valores_detalle', function (Blueprint $table) {
            $table->string('serie')->nullable(); // Agrega la columna de nuevo en caso de rollback
            $table->unsignedBigInteger('id_val_stock')->nullable();
        });
    }
};

