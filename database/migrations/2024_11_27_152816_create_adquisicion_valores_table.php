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
        Schema::create('adquisicion_valores', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_adquisicion');
            $table->timestamps();
            $table->uuid('uuid')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adquisicion_valores');
    }
};