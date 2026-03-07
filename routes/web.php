<?php
use App\Http\Controllers\TareaController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


//si esta log muestra sus tareas y sino mandalo al login
Route::get('/', function () {
    return auth()->check() ? redirect()->route('tareas.index') : redirect('/login');
});

// rutas protegidas por un "guardian" que es middleware
//las rutas que estan aca adentro si la persona no esta logueada rebota
Route::middleware(['auth', 'verified'])->group(function () {

    // // las acciones de las tareas
    Route::get('/mis-tareas', [TareaController::class, 'index'])->name('tareas.index');
    Route::post('/mis-tareas', [TareaController::class, 'store'])->name('tareas.store');
    Route::delete('/mis-tareas/{id}', [TareaController::class, 'destroy'])->name('tareas.destroy');
    Route::patch('/mis-tareas/{id}/completar', [TareaController::class, 'marcarCompletada'])->name('tareas.completar');
    Route::get('/mis-tareas/{id}/editar', [TareaController::class, 'edit'])->name('tareas.edit');
    Route::put('/mis-tareas/{id}', [TareaController::class, 'update'])->name('tareas.update');

    //las acciones de usuarios borre su cuenta o cambie las password
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //acciones de categoria
    Route::resource('categories', CategoryController::class);

    Route::get('/dashboard', function () {
        $user = auth()->user();
        $total = $user->tareas()->count();
        $pendientes = $user->tareas()->where("completada", false)->count();
        // Calculamos las completadas para sacar el porcentaje
        $completadas = $total - $pendientes;

        // Calculamos el porcentaje (protegido contra división por cero)
        $porcentaje = ($total > 0) ? round(($completadas / $total) * 100) : 0;
        return view("dashboard", [
            'total' => $total,
            'pendientes' => $pendientes,
            'porcentaje' => $porcentaje
        ]);
    })->name('dashboard');

});
//aca la libreria esconde las rutas/botones de logout, olvido de contraseña
require __DIR__ . '/auth.php';