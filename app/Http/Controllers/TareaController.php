<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Tarea;



class TareaController extends Controller
{
    // Muestra las tareas
    public function index(Request $request)
    {
        $query = Tarea::query();
        // Usamos filled() para verificar que tenga un valor (Alta, Media o Baja)
        // Si es "Todas", filled() devuelve false y no aplica el filtro.
        // Si el usuario eligió una prioridad en el filtro
        if ($request->filled("ver_prioridad")) {
            $query->where("prioridad", $request->ver_prioridad);
        }

         if ($request->filled("buscar")) {
            $query->where("nombre", "LIKE","%" .$request->buscar."%");
        }

        if ($request->filled("ver_categoria")) {
            $query->where("categoria", $request->ver_categoria);
        }

        $tareas = $query->orderByRaw("FIELD(prioridad, 'Alta', 'Media', 'Baja') ASC")
                    ->orderBy('created_at', 'desc') 
                    ->get();

        return view('hola', compact('tareas'));
    }

    // Guarda una tarea nueva
    public function store(Request $request)
    {
        $reglas = [
            "tarea" => 'required|min:3|max:50|unique:tareas,nombre',
            "prioridad" => "required|in:Alta,Media,Baja",
            "categoria" => "required"
        ];

        $mensajes = [
            'tarea.required' => 'El nombre de la tarea es obligatorio.',
            'tarea.min' => 'La tarea debe tener al menos 3 caracteres.',
            'tarea.max' => 'La tarea es demasiado larga (máximo 50).',
            'tarea.unique' => 'Esa tarea ya existe en tu lista.',
        ];
        $request->validate($reglas, $mensajes);

        Tarea::create([
            "nombre" => $request->tarea,
            "prioridad" => $request->prioridad,
            "categoria" => $request->categoria,
            "completada" => false

        ]);


        // $nueva = new Tarea();
        // $nueva->nombre = $request->tarea;
        // $nueva->completada = false; // Por defecto no está lista
        // $nueva->save();

        return redirect()->back()->with('success', '¡Tarea añadida!');
    }

    // Borra la tarea (Esto arregla el error de la ruta /borrar-tarea)
    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id)->delete();
        
        return redirect()->back()->with('status', 'Tarea eliminada.');
    }


    public function marcarCompletada($id)
    {
        $tarea = Tarea::find($id);
        if ($tarea) {
            // Si estaba completada la pone en false, y viceversa
            $tarea->completada = !$tarea->completada;
            $tarea->save();
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);
        return view("editar", compact("tarea"));
    }


    public function update(Request $request, $id)
    {
        //buscamos la tarea primero
        $tarea = Tarea::findOrFail($id);

        //las validaciones
        $reglas = [
            // El id al final de 'unique' le dice a Laravel: 
            // Ignorá esta tarea específica al buscar duplicados
            "nombre" => "required|min:3|max:50|unique:tareas,nombre," . $id,
            "prioridad" => "required|in:Alta,Media,Baja",
            "categoria" => "required"
        ];

        // los mensajes para las validaciones
        $mensajes = [
            'nombre.required' => 'Tenés que ponerle un nombre a la tarea.',
            'nombre.min' => 'El nombre es muy corto (mínimo 3 letras).',
            'nombre.unique' => 'Ya tenés otra tarea con ese mismo nombre.',
        ];

        //validamos
        $request->validate($reglas, $mensajes);

        //si pasa la validación, actualizamos
        $tarea->update([
            "nombre" => $request->nombre,
            "prioridad" => $request->prioridad,
            "categoria" => $request->categoria,
        ]);

        return redirect("/mis-tareas")->with("success", "Tarea actualizada correctamente");
    }


}