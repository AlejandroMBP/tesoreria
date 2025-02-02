<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::table('adquisicion_valores', function (Blueprint $table) {
            $table->integer('estado')->default(1)->after('fecha_adquisicion'); // 1 = Activo, 0 = Inactivo
        });
    }

    public function down() {
        Schema::table('adquisicion_valores', function (Blueprint $table) {
            $table->dropColumn('estado');
        });
    }
};

