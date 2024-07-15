@extends('layouts.web')
@section('header')
    {{ $header = 'Historial de solicitudes' }}

@section('navigator')
    <a href="{{ route('records') }}"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M5 12l14 0" />
            <path d="M5 12l4 4" />
            <path d="M5 12l4 -4" />
        </svg>
        Volver
    </a>
@endsection
@endsection


@section('alerts')
@include('components.error-alert')
@include('components.message-alert')
@endsection

@section('content')



<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    @if ($records->count() > 0)
    <div class="pb-7 ">
        <form action="{{ route('records.searchRefill') }}" class=" flex gap-3 border-b-2 pb-5 border-slate-200 dark:border-blue-600">
    
            <div>
                <input type="date" name="start_date" id=""
             class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div> 
            <div>
    
                <p class=" py-2">Hasta</p>
            </div>
            <div>
                <input type="date" name="end_date" id=""
             class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <button
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Filtrar por fecha
        </button>
    
    
        </form>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-16 py-3">
                    <span class="sr-only">Image</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    Producto
                </th>
                <th scope="col" class="px-6 py-3">
                    Cantidad
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha (Dia-Mes-Año)
                </th>
                <th scope="col" class="px-6 py-3">
                    Estatus
                </th>

            </tr>
        </thead>
        <tbody>
            
                @foreach ($records as $record)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="p-4">
                            <img src="{{ $record->product->image_url }}" class="w-16 md:w-32 max-w-full max-h-full"
                                alt="{{ $record->product->name }}">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $record->product->name }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                {{ $record->quantity }}
                            </div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white  ">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 me-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span
                                    class="text-gray-900 truncate dark:text-white text-base font-medium">{{ $record->formatted_created_at }}</span>
                            </div>

                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            @switch($record->status)
                                @case('completo')
                                    <span
                                        class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $record->status }}</span>
                                @break

                                @case('rechazado')
                                    <span
                                        class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $record->status }}</span>
                                @break

                                @default
                            @endswitch
                        </td>

                    </tr>
                @endforeach
            


        </tbody>
    </table>
    @else
<div class="text-center">
    <h2 class="py-10 text-slate-500">No hay solicitudes de stock pendientes</h2>
</div>
    @endif
</div>

@endsection
