<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Mostrar la lista de categorías del usuario
    public function index()
    {   
        //obtenemos las categorias
        $categorias = auth()->user()->categories;
        return view('categories.index', compact('categorias'));
    }

    // Guardar una nueva categoría
    public function store(Request $request)
    {   
        //validaciones
        $request->validate([
            'name' => 'required|max:20',
            'color' => 'required'
        ]);
        //la creamos
        auth()->user()->categories()->create($request->all());

        return redirect()->back()->with('success', '¡Categoría creada!');
    }

    // Borrar una categoría
    public function destroy(Category $category)
    {
        // Solo puede borrar sus propias categorías
        if ($category->user_id !== auth()->id()) {
            abort(403);
        }
        
        $category->delete();
        return redirect()->back()->with('success', 'Categoría eliminada.');
    }
}