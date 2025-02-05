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
        Schema::table('respuesta_solicitud', function (Blueprint $table) {
            $table->integer('cantidad')->after('fecha_respuesta')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('respuesta_solicitud', function (Blueprint $table) {
            $table->dropColumn('cantidad');
        });
    }
};
