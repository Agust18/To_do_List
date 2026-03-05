<ul class="space-y-3 p-1">
    @forelse ($tareas as $tarea)
        <li class="group flex items-center justify-between p-4 bg-white rounded-2xl border border-slate-100 transition-all hover:shadow-xl hover:shadow-slate-200/50 hover:border-blue-100
                    {{ $tarea->completada ? 'bg-slate-50/50 border-transparent opacity-75' : '' }}">

            <div class="flex items-center gap-4">
                {{-- Indicador de Prioridad Lateral --}}
                <div class="w-1.5 h-10 rounded-full transition-all
                        {{ $tarea->prioridad == 'Alta' ? 'bg-red-500 shadow-[0_0_10px_rgba(239,68,68,0.4)]' :
            ($tarea->prioridad == 'Media' ? 'bg-amber-400' : 'bg-emerald-500') }}">
                </div>

                <div class="flex flex-col">
                    <div class="flex items-center gap-3">
                        <span class="text-base font-semibold tracking-tight transition-colors
                                    {{ $tarea->completada ? 'text-slate-400 line-through' : 'text-slate-800' }}">
                            {{ $tarea->nombre }}
                        </span>

                        <div class="flex items-center gap-1.5">
                            {{-- Badge Categoría --}}
                            <span
                                class="text-[10px] font-black uppercase tracking-widest text-slate-400 bg-slate-100 px-2 py-0.5 rounded-md">
                                {{ $tarea->categoria ?? 'General' }}
                            </span>

                            {{-- Badge Prioridad --}}
                            <span
                                class="text-[10px] font-black uppercase tracking-widest px-2 py-0.5 rounded-md
                                    {{ $tarea->prioridad == 'Alta' ? 'bg-red-50 text-red-600' :
            ($tarea->prioridad == 'Media' ? 'bg-amber-50 text-amber-600' : 'bg-emerald-50 text-emerald-600') }}">
                                {{ $tarea->prioridad }}
                            </span>
                        </div>
                    </div>

                    {{-- Tiempo Relativo --}}
                    <span class="text-[11px] font-medium text-slate-400 flex items-center gap-1 mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $tarea->created_at ? $tarea->created_at->locale("es")->diffForHumans() : 'Recién' }}
                    </span>
                </div>
            </div>

            {{-- Acciones --}}
            <div
                class="flex items-center gap-1 sm:opacity-0 group-hover:opacity-100 transition-all duration-200 translate-x-2 group-hover:translate-x-0">
                <form action="{{ url('/completar-tarea/' . $tarea->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="p-2 rounded-xl transition-all cursor-pointer 
            {{ $tarea->completada
            ? 'text-amber-500 hover:bg-amber-50 hover:text-amber-600'
            : 'text-slate-400 hover:bg-emerald-50 hover:text-emerald-600' }}">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            @if($tarea->completada)
                                {{-- Icono de Cruz (X) para desmarcar --}}
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M6 18L18 6M6 6l12 12" />
                            @else
                                {{-- Icono de Tilde (Check) para completar --}}
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            @endif
                        </svg>
                    </button>
                </form>

                <a href="{{ url('/editar-tarea/' . $tarea->id) }}"
                    class="p-2 rounded-xl text-slate-400 hover:bg-blue-50 hover:text-blue-600 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </a>

                <form action="{{ url('/borrar-tarea/' . $tarea->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="p-2 rounded-xl text-slate-400 hover:bg-red-50 hover:text-red-500 transition-all cursor-pointer"
                        onclick="return confirm('¿Borrar tarea?')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
            </div>
        </li>
    @empty
        <div
            class="flex flex-col items-center justify-center py-20 bg-slate-50/50 rounded-[32px] border-2 border-dashed border-slate-200">
            <div
                class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-2xl mb-4 text-slate-400">
                ✨</div>
            <h3 class="text-slate-800 font-bold">Sin tareas pendientes</h3>
            <p class="text-slate-400 text-sm">Disfrutá tu tiempo libre o agregá algo nuevo.</p>
        </div>
    @endforelse
</ul>