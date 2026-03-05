<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
{{-- resources/views/layouts/app.blade.php --}}
<body class="bg-slate-50 min-h-screen font-sans antialiased text-slate-900">
    
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100 shadow-sm">
        <div class="container mx-auto px-4 h-18 flex items-center justify-between">
            
            <a href="{{ url('/mis-tareas') }}" class="flex items-center gap-2 group no-underline">
                <div class="bg-blue-600 p-1.5 rounded-lg transition-transform group-hover:scale-110 shadow-lg shadow-blue-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <span class="font-black text-2xl tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                    MisCosasPorHacer
                </span>
            </a>

           
        </div>
    </nav>

    <main class="container mx-auto px-4 mt-8 pb-20 max-w-5xl">
        {{-- Aquí se inyecta el contenido de hola.blade.php --}}
        @yield('content')
    </main>

    <footer class="text-center py-8 border-t border-slate-200 mt-auto">
        <p class="text-slate-400 text-sm italic">Organizando el día, una tarea a la vez.</p>
    </footer>

</body>
</html>