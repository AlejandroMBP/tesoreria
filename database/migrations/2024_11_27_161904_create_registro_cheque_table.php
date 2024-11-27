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
        Schema::create('registro_cheque', function (Blueprint $table) {
            $table->id();
            $table->integer('hoja_ruta_Rectorado');
            $table->integer('hoja_ruta_DAF');
            $table->enum('figura',['cheque','pago electronico','ambos'])->default('cheque');
            $table->date('fecha_ingreso_tesoreria');
            $table->string('numero_tipo',100);
            $table->enum('tipo',['devengado','preventivo','acreedor']);
            $table->string('resumen');
            $table->integer('numero_cheque');
            $table->string('nombre_beneficiario',100);
            $table->double('monto_cheque');
            $table->string('comprobante',250);
            $table->string('cuenta',20);
            $table->string('n_verde_DAF',100);
            $table->date('fecha_despacho_para_firmas');
            $table->date('fecha_reingreso',10);
            $table->date('fecha_entrega_beneficiario',10);
            $table->date('fecha_remision_archivo_contable',10);
            $table->string('observacion',250);
            $table->tinyInteger('estado')->default(1);
            $table->enum('revision',['anulado','cancelado','adicionado'])->default('adicionado');
            $table->integer('id_usuario');
            $table->timestamps();
            $table->uuid('uuid')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_cheque');
    }
};