<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController; // Este es el único que realmente necesitás ahora
//ver mis tareas,llamo la funcion index de la clase TareaController
Route::get('/mis-tareas', [TareaController::class, 'index']);
Route::post('/guardar-tarea', [TareaController::class, 'store']);
Route::delete('/borrar-tarea/{id}', [TareaController::class, 'destroy']);
Route::patch('/completar-tarea/{id}', [TareaController::class, 'marcarCompletada']);
Route::put("/actualizar-tarea/{id}",[TareaController::class,"update"]);
Route::get("/editar-tarea/{id}",[TareaController::class,"edit"]);