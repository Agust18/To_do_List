<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-slate-50 to-white py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <header class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-12 mt-3">

                <div>
                    <h1 class="text-3xl sm:text-4xl font-bold text-slate-900 tracking-tight mt-3">
                        Resumen General
                    </h1>

                    <p class="text-slate-500 mt-2">
                        Bienvenido nuevamente,
                        <span class="font-semibold text-slate-700">
                            {{ Auth::user()->name }}
                        </span>
                    </p>
                </div>

                <div class="self-start md:self-auto">
                    <span class="bg-white border border-slate-200 shadow-sm px-4 py-2 rounded-full text-sm text-slate-600">
                        {{ now()->format('d M Y') }}
                    </span>
                </div>

            </header>


            {{-- Stats --}}
            <section class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                {{-- Total --}}
                <article class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">

                    <div class="flex items-center justify-between">

                        <div class="p-3 bg-indigo-100 text-indigo-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 
                                    002 2h10a2 2 0 002-2V7a2 2 
                                    0 00-2-2h-2M9 5a2 2 0 
                                    002 2h2a2 2 0 002-2"/>
                            </svg>
                        </div>

                        <span class="text-xs uppercase tracking-widest text-slate-400">
                            Total
                        </span>

                    </div>

                    <div class="mt-6">

                        <p class="text-4xl font-bold text-slate-900">
                            {{ $total }}
                        </p>

                        <p class="text-sm text-slate-500 mt-1">
                            Tareas registradas
                        </p>

                    </div>

                </article>


                {{-- Pendientes --}}
                <article class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">

                    <div class="flex items-center justify-between">

                        <div class="p-3 bg-rose-100 text-rose-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 
                                    9 0 11-18 0 9 9 0 
                                    0118 0z"/>
                            </svg>
                        </div>

                        <span class="text-xs uppercase tracking-widest text-slate-400">
                            Pendientes
                        </span>

                    </div>

                    <div class="mt-6">

                        <p class="text-4xl font-bold text-slate-900">
                            {{ $pendientes }}
                        </p>

                        <p class="text-sm text-rose-500 font-medium mt-1">
                            Requieren acción
                        </p>

                    </div>

                </article>


                {{-- Rendimiento --}}
                <article class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition md:col-span-2 lg:col-span-1">

                    <div class="flex items-center justify-between mb-6">

                        <h2 class="text-lg font-semibold text-slate-800">
                            Rendimiento
                        </h2>

                        <span class="text-3xl font-bold text-indigo-600">
                            {{ $porcentaje }}%
                        </span>

                    </div>

                    <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden">

                        <div class="bg-gradient-to-r from-indigo-500 to-indigo-700 h-full transition-all duration-700"
                             style="width: {{ $porcentaje }}%">
                        </div>

                    </div>

                </article>

            </section>


            {{-- CTA --}}
            <section class="mt-12 flex justify-center mt-3">

                <a href="{{ route('tareas.index') }}"
                   class="inline-flex items-center gap-3 bg-slate-900 text-white px-6 py-4 rounded-xl font-semibold shadow hover:bg-indigo-600 transition mt-4">

                    Gestionar tareas

                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>

                </a>

            </section>

        </div>

    </div>
</x-app-layout>