<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tareas', function (Blueprint $table) {
            // Agregamos la columna prioridad después del nombre
            $table->string("prioridad")->default("baja")->
            after("nombre");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tareas', function (Blueprint $table) {
            // Si nos arrepentimos, borramos la columna
            $table->dropColumn('prioridad');
        });
    }
};
