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
        Schema::table('tareas', function (Blueprint $table) {
            //creamos columna y la conectamos
            $table->foreignId("category_id")// Crea una columna para guardar el ID
            ->nullable() // Permite que una tarea no tenga categoría (opcional)
            ->after('user_id')// La pone visualmente después del usuario (orden) 
            ->constrained()// Le avisa a la DB que esto se conecta con 'categories'
            ->onDelete('set null');   // Si borrás la categoría, la tarea NO se borra, solo queda "Sin categoría"
        
        
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tareas', function (Blueprint $table) {
            //
            // El camino inverso: por si queremos deshacer el cambio
            $table->dropForeign(['category_id']); // Corta el cable de conexión
            $table->dropColumn('category_id');    // Borra el casillero
        });
    }
};
