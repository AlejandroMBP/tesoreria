<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('respuesta_solicitud_detalle', function (Blueprint $table) {
            $table->integer('correlativo_inicial')->after('cantidad')->nullable();
            $table->integer('correlativo_final')->after('correlativo_inicial')->nullable();
        });
    }

    public function down()
    {
        Schema::table('respuesta_solicitud_detalle', function (Blueprint $table) {
            $table->dropColumn(['correlativo_inicial', 'correlativo_final']);
        });
    }
};
