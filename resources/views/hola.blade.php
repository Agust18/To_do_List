@extends('layouts.app')

@section('content')
    {{-- todo lo que antes tenías suelto, ahora va entre los section --}}

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg border border-green-200 mb-5">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="contenedor mx-auto"> {{-- Usamos mx-auto de para centrar --}}

        {{-- Estadísticas --}}
        @include('partials._stats')

        {{-- Formulario para crear --}}
        @include('partials._crear-tarea')

        {{-- Formulario de filtros --}}
        @include('partials._filtros')

        {{-- La lista de tareas --}}
        <div class="max-h-[60vh] overflow-y-auto pr-2">
            @include('partials._lista-tareas')
        </div>
    </div>
@endsection