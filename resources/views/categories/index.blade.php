<x-app-layout>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">Nueva Categoría</h2>
                    <p class="mt-1 text-sm text-gray-600">Creá una etiqueta para organizar mejor tus tareas.</p>
                </header>

                <form method="post" action="{{ route('categories.store') }}" class="mt-6 space-y-6 flex items-end gap-4">
                    @csrf
                    <div class="flex-1">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="name" id="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                        <select name="color" id="color" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="blue">Azul</option>
                            <option value="red">Rojo</option>
                            <option value="green">Verde</option>
                            <option value="yellow">Amarillo</option>
                            <option value="purple">Violeta</option>
                        </select>
                    </div>

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border  rounded-md font-semibold text-xs text-grey uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Añadir
                    </button>
                </form>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Tus Categorías</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($categorias as $cat)
                        <div class="flex items-center justify-between p-3 border rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-4 h-4 rounded-full bg-{{ $cat->color }}-500"></div>
                                <span class="font-bold text-gray-700">{{ $cat->name }}</span>
                            </div>

                            <form action="{{ route('categories.destroy', $cat) }}" method="POST" onsubmit="return confirm('¿Borrar categoría?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-bold uppercase">Eliminar</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>