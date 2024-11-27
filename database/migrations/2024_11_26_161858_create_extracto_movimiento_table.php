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
        Schema::create('extracto_movimiento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('csv_extracto_id');
            $table->string('extracto_movimiento',45);
            $table->date('fechaMovimeinto');
            $table->double('sec');
            $table->double('nroComprobante');
            $table->string('codOperacion',45);
            $table->double('nroDocumento');
            $table->string('descripcion',45);
            $table->string('cuentaTransferencia',45);
            $table->string('debito',45);
            $table->string('monto',45);
            $table->string('saldo',45);
            $table->string('importeCOnciliar',45);
            $table->string('Estado',45);
            $table->string('numeroCI',45);
            $table->year('gestion');
            $table->timestamps();
            $table->foreign('csv_extracto_id')
                ->references('id')
                ->on('csv_extracto')
                ->onDelete('cascade');
                $table->uuid('uuid')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extracto_movimiento');
    }
};