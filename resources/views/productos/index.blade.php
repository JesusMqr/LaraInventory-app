<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Nuevo Producto</a>
                    </div>
                    <table class="min-w-full border-gray-900 rounded border-2">
                        <thead>
                            <tr>
                                <th class="py-2">Nombre</th>
                                <th class="py-2">Descripción</th>
                                <th class="py-2">Categoría</th>
                                <th class="py-2">Precio</th>
                                <th class="py-2">Stock</th>
                                <th class="py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->count() <= 0)
                                <tr>
                                    <th>No hay productos para mostrar</th>
                                </tr>
                            @else
                                @foreach ($products as $product)
                                <tr>
                                    <td class="py-2">{{ $product->name }}</td>
                                    <td class="py-2">{{ $product->description }}</td>
                                    <td class="py-2">{{ $product->category }}</td>
                                    <td class="py-2">{{ $product->price }}</td>
                                    <td class="py-2">{{ $product->stock }}</td>
                                    <td class="py-2">
                                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500">Editar</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

