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
        Schema::create('tesoro', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('estado_tesoro');
            $table->unsignedBigInteger('id_movimientos_cons');
            $table->timestamps();
            $table->uuid('uuid')->unique();
            $table->foreign('id_movimientos_cons')->references('id')->on('movimientos_consolidados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tesoro');
    }
};