<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
{
    Schema::table('tareas', function (Blueprint $table) {
        // Creamos la columna user_id que se conecta con la tabla users
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('tareas', function (Blueprint $table) {
        // Esto sirve por si alguna vez querés deshacer el cambio
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    });
}
};
