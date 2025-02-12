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
        Schema::create('b_valores_stock', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->integer('correlativo_inicial');
            $table->integer('correlativo_final');
            $table->string('serie',45);
            $table->integer('estado')->default(1);
            $table->uuid('uuid')->unique();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('b_valores_stock');
    }
};
