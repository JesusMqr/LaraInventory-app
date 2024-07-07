@extends('layouts.web')
@section('header')
    {{ $header = "Categorias" }}

    @section('navigator')
    @hasanyrole('admin|supervisor')
    <a   href="{{ route('categories.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" />
        </svg>Crear categoria
    
    </a>
    @endhasanyrole
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
                <svg  xmlns="http://www.w3.org/2000/svg"  class="w-20 h-20 flex-shrink-0 md:w-20 md:h-20" viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-archive"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M2 3m0 2a2 2 0 0 1 2 -2h16a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-16a2 2 0 0 1 -2 -2z" /><path d="M19 9c.513 0 .936 .463 .993 1.06l.007 .14v7.2c0 1.917 -1.249 3.484 -2.824 3.594l-.176 .006h-10c-1.598 0 -2.904 -1.499 -2.995 -3.388l-.005 -.212v-7.2c0 -.663 .448 -1.2 1 -1.2h14zm-5 2h-4l-.117 .007a1 1 0 0 0 0 1.986l.117 .007h4l.117 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" /></svg>
                <h3 class="text-lg md:text-xl">{{ $category->name }}</h3>
            </a>
            @hasanyrole('admin|supervisor')
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
            @endhasanyrole
        </div>
        @endforeach
    </div>
    @else
        <h2>No hay categorias, por favor crea una nueva categoria para empezar a agregar productos</h2>
    @endif

    

@endsection