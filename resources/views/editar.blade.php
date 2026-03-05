@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[80vh] px-4">
    <div class="w-full max-w-md bg-white p-10 rounded-[32px] shadow-2xl shadow-slate-200/50 border border-slate-100">
        
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-slate-900 text-white rounded-2xl mb-4 shadow-xl shadow-slate-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <h1 class="text-2xl font-black text-slate-800 tracking-tight">Editar Tarea</h1>
            <p class="text-slate-400 text-sm font-medium">Refiná los detalles de tu actividad</p>
        </div>

        {{-- errores  --}}
        @if ($errors->any())
            <div class="mb-6 animate-in fade-in slide-in-from-top-4 duration-300">
                <div class="bg-red-50/50 backdrop-blur-sm border border-red-100 p-4 rounded-2xl">
                    <ul class="text-red-700 text-xs font-bold space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="flex items-center gap-2">
                                <span class="w-1 h-1 bg-red-500 rounded-full"></span> {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ url('/actualizar-tarea/' . $tarea->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{--  nombre --}}
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Título de la tarea</label>
                <input type="text" name="nombre" value="{{ old('nombre', $tarea->nombre) }}" 
                    class="w-full h-14 px-5 rounded-2xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:border-slate-900 focus:ring-0 transition-all outline-none text-slate-700 font-bold text-sm">
            </div>

            {{--  selects --}}
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Prioridad</label>
                    <div class="relative">
                        <select name="prioridad" 
                            class="appearance-none w-full h-12 px-4 rounded-2xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:border-slate-900 transition-all outline-none cursor-pointer font-bold text-xs text-slate-600">
                            <option value="Alta" {{ $tarea->prioridad == 'Alta' ? 'selected' : '' }}>Alta</option>
                            <option value="Media" {{ $tarea->prioridad == 'Media' ? 'selected' : '' }}> Media</option>
                            <option value="Baja" {{ $tarea->prioridad == 'Baja' ? 'selected' : '' }}> Baja</option>
                        </select>
                        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-slate-400">
                            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Categoría</label>
                    <div class="relative">
                        <select name="categoria" 
                            class="appearance-none w-full h-12 px-4 rounded-2xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:border-slate-900 transition-all outline-none cursor-pointer font-bold text-xs text-slate-600">
                            <option value="General" {{ $tarea->categoria == 'General' ? 'selected' : '' }}>📁 General</option>
                            <option value="Trabajo" {{ $tarea->categoria == 'Trabajo' ? 'selected' : '' }}>💼 Trabajo</option>
                            <option value="Estudio" {{ $tarea->categoria == 'Estudio' ? 'selected' : '' }}>📚 Estudio</option>
                            <option value="Compras" {{ $tarea->categoria == 'Compras' ? 'selected' : '' }}>🛒 Compras</option>
                        </select>
                        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-slate-400">
                            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- botones de Acción --}}
            <div class="pt-4 space-y-3">
                <button type="submit" 
                    class="h-14 w-full bg-slate-900 hover:bg-black text-white text-xs font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-slate-200 transition-all active:scale-95 cursor-pointer">
                    Guardar Cambios
                </button>
                
                <a href="{{ url('/mis-tareas') }}" 
                   class="h-12 w-full flex items-center justify-center text-slate-400 hover:text-slate-900 text-[10px] font-black uppercase tracking-widest transition-colors">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection