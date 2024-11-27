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
        Schema::create('concepto_interesados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('concepto_id');
            $table->unsignedBigInteger('interesados_id');
            $table->timestamps();
            $table->uuid('uuid')->unique();
            $table->foreign('concepto_id')->references('id')->on('concepto');
            $table->foreign('interesados_id')->references('id')->on('interesados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concepto_interesados');
    }
};