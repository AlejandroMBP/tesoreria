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
        Schema::create('multipleboletas', function (Blueprint $table) {
            $table->id();
            $table->string('nro_documento',45);
            $table->string('monto',45);
            $table->unsignedBigInteger('id_multiboletas');
            $table->timestamps();
            $table->uuid('uuid')->unique();
            $table->foreign('id_multiboletas')->references('id')->on('movimiento_multipleboletas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multipleboletas');
    }
};