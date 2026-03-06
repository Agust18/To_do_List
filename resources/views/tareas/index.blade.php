<x-app-layout>
    {{-- OPCIONAL: Esto rellena la parte de arriba del diseño de Breeze --}}
    <!-- <x-slot name="header">
        
    </x-slot> -->

    {{-- TODO lo que pongas acá adentro se guarda automáticamente en la variable $slot --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-lg border border-green-200 mb-5">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="contenedor mx-auto">
                {{-- Estadísticas --}}
                @include('tareas.partials._stats')

                {{-- Formulario para crear --}}
                @include('tareas.partials._crear-tarea')

                {{-- Formulario de filtros --}}
                @include('tareas.partials._filtros')

                {{-- La lista de tareas --}}
                <div class="max-h-[60vh] overflow-y-auto pr-2">
                    @include('tareas.partials._lista-tareas')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>