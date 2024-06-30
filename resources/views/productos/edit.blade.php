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
                        <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Volver</a>
                    </div>
                    <div class="container mx-auto">
                        <h1 class="text-2xl mb-4">{{ 'Nuevo Producto' }}</h1>
                        <form action="{{  route('products.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-200">Nombre</label>
                                <input value='{{ $product->name }}' type="text" name="name" id="name" class="border rounded w-full py-2 px-3 text-gray-700"  required>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-gray-200">Descripción</label>
                                <textarea name="description" id="description" class=" border text-gray-700  rounded w-full py-2 px-3">{{ $product->description }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="category" class="block text-gray-200">Categoría</label>
                                <input value="{{ $product->category }}" type="text" name="category" id="category" class=" border text-gray-700 rounded w-full py-2 px-3">
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-200">Precio</label>
                                <input value="{{ $product->price }}" type="number" step="0.01" name="price" id="price" class=" border text-gray-700 rounded w-full py-2 px-3" required>
                            </div>
                            <div class="mb-4">
                                <label for="stock" class="block text-gray-200">Stock</label>
                                <input  value="{{ $product->stock }}" type="number" name="stock" id="stock" class=" border text-gray-700 rounded w-full py-2 px-3"  required>
                            </div>
                            <div class="mb-4">
                                <label for="min_stock" class="block text-gray-200">Stock Mínimo</label>
                                <input value="{{ $product->min_stock }}" type="number" name="min_stock" id="min_stock" class=" border text-gray-700 rounded w-full py-2 px-3"  required>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualziar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

