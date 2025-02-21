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
        Schema::table('venta_valores', function (Blueprint $table) {
            $table->integer('cantidad')->after('fecha_venta');
        });
    }

    public function down()
    {
        Schema::table('venta_valores', function (Blueprint $table) {
            $table->dropColumn('cantidad');
        });
    }
};
