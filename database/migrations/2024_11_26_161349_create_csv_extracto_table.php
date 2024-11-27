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
        Schema::create('csv_extracto', function (Blueprint $table) {
            $table->id();
            $table->string('fecha_movimiento');
            $table->string('B');
            $table->string('AG');
            $table->string('D');
            $table->string('E');
            $table->string('F');
            $table->string('Descripcion');
            $table->string('H');
            $table->string('I');
            $table->string('J');
            $table->string('K');
            $table->string('L');
            $table->string('M');
            $table->string('N');
            $table->string('O');
            $table->string('P');
            $table->string('Q');
            $table->string('R');
            $table->string('S');
            $table->double('NroDocumento');
            $table->string('U');
            $table->string('V');
            $table->string('W');
            $table->string('X');
            $table->string('Monto');
            $table->string('Z');
            $table->string('AA');
            $table->string('AB');
            $table->string('Saldo');
            $table->timestamps();
            $table->uuid('uuid')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csv_extracto');
    }
};