@extends('layouts.web')

@section('header')
    {{ $header = "Solicitudes de stock" }}

@endsection

@section('alerts')
@include('components.error-alert')
@include('components.message-alert')
@endsection

@section('content')


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
                        Cantidad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($refillRequest->count()>0)
                    @foreach ($refillRequest as $request )
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4">
                                <img src="{{ $request->product->image_url}}" class="w-16 md:w-32 max-w-full max-h-full" alt="Apple Watch">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $request->product->name }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    {{ $request->quantity }}
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                @switch($request->status)
                                    @case('pendiente')
                                        <span class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $request->status }}</span>
                                    @break
                                    @case('en proceso')
                                        <span class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{$request->status}}</span>

                                    @break
                                    @case("completo")
                                        <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $request->status }}</span>
                                        @break
                                    @case("rechazado")
                                        <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $request->status }}</span>
                                        @break
                                    @default

                                @endswitch
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex">
                                    @if ($request->status == "pendiente")
                                <form action="{{route('stock_refill.aprove',['request'=>$request])}}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Aprovar</button>

                                </form>
                                <form action="{{route('stock_refill.reject',['request'=>$request])}}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Denegar</button>
                                </form>
                                @elseif ($request->status =="en proceso")
                                <form action="{{route('stock_refill.complete',['request'=>$request])}}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Recibido</button>
                                </form>
                                @else

                                @endif
                                </div>
                                
                                
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            No hay solicitudes de stock pendientes.
                        </td>
                    </tr>
                @endif

                
            </tbody>
        </table>
    </div>

@endsection