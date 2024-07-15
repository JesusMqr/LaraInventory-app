@extends('layouts.web')
@section('header')
    {{ $header = "Productos con bajo stock" }}
@endsection

@section('navigator')

    <a href="{{ route('dashboard') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l4 4" /><path d="M5 12l4 -4" /></svg>
    Volver
    </a>


@endsection

@section('message')
{{ $message =null}}
@endsection

@section('error')
{{ $error = null}}
@endsection

@section('content')
    @if ($products->count() > 0)
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-16 py-3">
                        <span class="sr-only">Image</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Qty
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product )
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="p-4 max-w-16">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        {{ $product->name }}
                    </td>

                    <td class="px-6 py-4 font-semibold text-red-600">
                        {{ $product->stock }}
                    </td>
                    
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        {{ $product->min_stock }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Reponer Inventario</a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>


    @else
    <div class="text-center">
        <h2 class="text-slate-500">No hay productos con bajo stock</h2>
    </div>
    @endif

@endsection