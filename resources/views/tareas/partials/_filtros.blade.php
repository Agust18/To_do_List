{{-- resources/views/partials/_filtros.blade.php --}}
<form action="{{ url('/mis-tareas') }}" method="GET" 
      class="flex flex-col lg:flex-row items-stretch lg:items-center gap-2 bg-slate-100/50 p-2 rounded-2xl border border-slate-200/60 mb-10 transition-all focus-within:bg-white focus-within:shadow-xl focus-within:shadow-blue-500/5">
    
    <div class="relative flex-grow group">
        <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 group-focus-within:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Filtrar tareas..."
               class="w-full pl-12 pr-4 py-3 bg-transparent rounded-xl border-none focus:ring-0 outline-none text-slate-700 placeholder:text-slate-400 font-medium text-sm">
    </div>

    <div class="hidden lg:block w-px h-6 bg-slate-200"></div>

    <div class="flex flex-col sm:flex-row gap-2 px-2">
        <div class="relative">
            <select name="ver_prioridad" onchange="this.form.submit()" 
                   class="h-10 pl-3 pr-10 rounded-lg text-center text-xs font-bold bg-slate-50 text-slate-500 border-none outline-none cursor-pointer hover:bg-slate-100 transition-colors appearance-none w-full">
                <option value="">Prioridad</option>
                <option value="Alta">Alta</option>
                <option value="Media">Media</option>
                <option value="Baja">Baja</option>
            </select>
             <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-slate-400">
                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            
        </div>

        <div class="relative">
            <select name="ver_categoria"
              class="h-10 pl-3 pr-10 rounded-lg text-center text-xs font-bold bg-slate-50 text-slate-500 border-none outline-none cursor-pointer hover:bg-slate-100 transition-colors appearance-none w-full">
                <option value="">Todas</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ request('ver_categoria') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->name }}
                    </option>
                @endforeach
            </select>
             <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-slate-400">
                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            
        </div>
    </div>

    @if(request('buscar') || request('ver_prioridad') || request('ver_categoria'))
        <a href="{{ url('/mis-tareas') }}" 
           class="flex items-center justify-center px-4 py-2 text-slate-400 hover:text-slate-600 text-xs font-bold uppercase tracking-tighter transition-all" title="Reset">
            Limpiar
        </a>
    @endif

    <button type="submit" 
            class="bg-white text-slate-900 border border-slate-200 font-bold py-2.5 px-6 rounded-xl transition-all hover:bg-slate-50 shadow-sm active:scale-95">
        Buscar
    </button>
</form>