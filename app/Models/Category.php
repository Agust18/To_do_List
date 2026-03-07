<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ["name", "color", "user_id"];



    // Relación: Una categoría pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Una categoría puede tener muchas tareas/notas
    public function items()
    {
        // Cambiá 'TuModeloOriginal' por el nombre de tu modelo de agenda (Tarea, Nota, etc.)
        return $this->hasMany(Tarea::class);
    }

}
