{{-- Formulario de Creación con Protección Anti-Duplicados --}}
<form action="{{ url('/guardar-tarea') }}" method="POST" id="form-tarea"
    onsubmit="document.getElementById('btn-añadir').disabled = true; document.getElementById('btn-añadir').innerText = '...';"
    class="group bg-white p-2 rounded-2xl shadow-sm border border-slate-200 flex flex-col lg:flex-row gap-2 mb-12 transition-all focus-within:shadow-xl focus-within:shadow-blue-500/5 focus-within:border-blue-200">
    @csrf

    <div class="flex-grow relative">
        <div
            class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-slate-300 group-focus-within:text-blue-500 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
            </svg>
        </div>
        <input type="text" name="tarea" placeholder="Nueva tarea..." value="{{ old('tarea') }}" required class="w-full h-12 pl-12 pr-4 rounded-xl text-sm font-medium outline-none border-none focus:ring-0 placeholder:text-slate-400
            {{ $errors->has('tarea') ? 'bg-red-50/50 text-red-900' : 'bg-transparent text-slate-700' }}">
    </div>

    <div class="hidden lg:block w-px h-8 bg-slate-100 self-center"></div>

    <div class="flex gap-2 p-1">
        <select name="categoria"
            class="h-10 px-3 rounded-lg text-xs font-bold bg-slate-50 text-slate-500 border-none outline-none cursor-pointer hover:bg-slate-100 transition-colors appearance-none">
            <option value="General">General</option>
            <option value="Trabajo">Trabajo</option>
            <option value="Estudio">Estudio</option>
            <option value="Compras">Compras</option>
        </select>

        <select name="prioridad"
            class="h-10 px-3 rounded-lg text-xs font-bold outline-none cursor-pointer transition-all border-none appearance-none
                {{ $errors->has('prioridad') ? 'bg-red-100 text-red-600' : 'bg-slate-50 text-slate-500 hover:bg-slate-100' }}">
            <option value="Baja" {{ old('prioridad') == 'Baja' ? 'selected' : '' }}>Baja</option>
            <option value="Media" {{ old('prioridad') == 'Media' ? 'selected' : '' }}>Media</option>
            <option value="Alta" {{ old('prioridad') == 'Alta' ? 'selected' : '' }}>Alta</option>
        </select>

        <button type="submit" onclick="this.disabled=true; this.form.submit();"
            class="h-10 px-6 bg-slate-900 hover:bg-black text-white text-xs font-black uppercase tracking-widest rounded-xl transition-all active:scale-95 shadow-lg shadow-slate-200 disabled:opacity-50">
            Añadir
        </button>
    </div>
</form>