<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('solicitud', function (Blueprint $table) {
            // Eliminar la restricción de clave foránea
            $table->dropForeign(['id_concepto_val']); 
            
            // Eliminar la columna
            $table->dropColumn('id_concepto_val');
        });
    }

    public function down(): void
    {
       
    }
};
