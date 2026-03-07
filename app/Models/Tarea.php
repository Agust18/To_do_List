<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    //Solo permito que se guarden estos tres campos. 
    // Si alguien intenta mandar otra cosa, ignoralo
    protected $fillable = ['nombre', 'completada', 'prioridad', "user_id", "category_id"];

    public function user()
    {
        // Una tarea PERTENECE a un usuario
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::Class);

    }

}
