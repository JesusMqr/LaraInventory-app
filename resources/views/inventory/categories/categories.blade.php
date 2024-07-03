@extends('layouts.web')
@section('header')
    {{ $header = "Categorias" }}

    @section('navigator')
    
    <a   href="{{ route('categories.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" />
        </svg>Crear categoria
    
    </a>
    @endsection
@endsection


@section('alerts')
@include('components.error-alert')
@include('components.message-alert')
@endsection


@section('content')

    
    @if ($categories->count() > 0)
        <div class="grid grid-cols-2 justify-items-center  md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5 ">
        @foreach ($categories as $category)
        <div class="p-3 rounded border-gray-500 border w-full ">
            <a href="{{ route('categories.show', $category->id) }}" class="cursor-pointer flex flex-col md:flex-row items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 flex-shrink-0 md:w-20 md:h-20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M3 5h6v14h-6z" />
                    <path d="M12 9h10v7h-10z" />
                    <path d="M14 19h6" />
                    <path d="M17 16v3" />
                    <path d="M6 13v.01" />
                    <path d="M6 16v.01" />
                </svg>
                <h3 class="text-lg md:text-xl">{{ $category->name }}</h3>
            </a>
            <div class="flex flex-col md:flex-row mt-5 md:mt-3  justify-between">
                <a href="{{ route('categories.edit',$category->id) }}"
                    class="text-gray-900 w-full bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Editar</a>
                
                <form action="{{ route('categories.destroy',['category'=>$category]) }}" method="POST" class="w-full" > 
                        @csrf
                        @method('DELETE')
                        <button  class="focus:outline-none w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                        >Eliminar</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @else
        <h2>No hay categorias, por favor crea una nueva categoria para empezar a agregar productos</h2>
    @endif

    

@endsection