{{-- resources/views/partials/_stats.blade.php --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    
    {{-- Totales --}}
    <div class="group bg-white border border-slate-100 p-5 rounded-2xl shadow-sm flex items-center justify-between transition-all hover:shadow-xl hover:-translate-y-1">
        <div class="flex flex-col">
            <span class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-1">Total Tareas</span>
            <span class="text-3xl font-black text-slate-800 leading-none">{{ $total ?? $tareas->count() }}</span>
        </div>
        <div class="bg-slate-50 text-slate-400 p-4 rounded-2xl group-hover:bg-blue-50 group-hover:text-blue-500 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
        </div>
    </div>

    {{--  completadas --}}
    <div class="group bg-gradient-to-br from-emerald-50 to-white border border-emerald-100 p-5 rounded-2xl shadow-sm flex items-center justify-between transition-all hover:shadow-xl hover:-translate-y-1">
        <div class="flex flex-col">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-600 mb-1">Logradas</span>
            <span class="text-3xl font-black text-emerald-700 leading-none">{{ $completadas ?? $tareas->where('completada', true)->count() }}</span>
        </div>
        <div class="bg-emerald-100/50 text-emerald-600 p-4 rounded-2xl group-hover:bg-emerald-500 group-hover:text-white transition-all shadow-inner">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>

    {{--  pendientes --}}
    <div class="group bg-gradient-to-br from-amber-50 to-white border border-amber-100 p-5 rounded-2xl shadow-sm flex items-center justify-between transition-all hover:shadow-xl hover:-translate-y-1">
        <div class="flex flex-col">
            <span class="text-xs font-bold uppercase tracking-widest text-amber-600 mb-1">Por Hacer</span>
            <span class="text-3xl font-black text-amber-700 leading-none">{{ $pendientes ?? $tareas->where('completada', false)->count() }}</span>
        </div>
        <div class="bg-amber-100/50 text-amber-600 p-4 rounded-2xl group-hover:bg-amber-500 group-hover:text-white transition-all shadow-inner">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>

</div>