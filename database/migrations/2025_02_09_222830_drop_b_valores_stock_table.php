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
        Schema::dropIfExists('b_valores_stock');
    }

    public function down()
    {
        Schema::create('b_valores_stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_concepto_valor')->nullable();
            $table->integer('cantidad');
            $table->integer('correlativo_inicial');
            $table->integer('correlativo_final');
            $table->string('serie');
            $table->integer('estado');
            $table->uuid('uuid');
            $table->timestamps();
        });
    }
};
