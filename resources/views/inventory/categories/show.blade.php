@extends('layouts.web')
@section('header')
    {{ $header = "Productos" }}
@endsection

@section('navigator')

    <a href="{{ route('categories') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l4 4" /><path d="M5 12l4 -4" /></svg>
    Volver
    </a>

    <a  href="{{ route('products.create',['id_category' => $category->id]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>Crear producto
    </a>

@endsection

@section('message')
{{ $message =null}}
@endsection

@section('error')
{{ $error = null}}
@endsection

@section('content')
    <div class="pb-5">
        <h2 class="text-xl font-semibold uppercase">{{ $category->name }}</h2>
        <p class="text-s text-slate-400 pt-3 " >{{ $category->description }}</p>
    </div>
    <hr>
    <div >
        @if ($category->products()->count() >0)

        <div class="pt-5 w-full">
        <form action="{{ route('categories.search',$category->id) }}" method="GET">  
        @csrf 
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="search" name="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar un producto"  />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
            </div>
        </form>

        </div>
            
        <div class="grid grid-cols-1  justify-items-center md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 py-8 ">
            @if (isset($filterProducts))
                @foreach ($filterProducts as $product )
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="p-8 rounded-t-lg" src="{{ $product->image_url }}" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$product->name}}</h5>
                        </a>
                        <div class="flex items-center flex-wrap gap-5 mt-2.5 mb-5">
                        <div class="inline-flex gap-1 ">
                                <p>Stock:</p>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ $product->stock }}</span>
                                </div>
                                <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            href="">Añadir stock</a>
                        </div>
                        <div class="pb-5">
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">S/ {{ $product->price }}</span>
                            
                        </div>
                        @hasanyrole('admin|supervisor')
                        <div class="flex  justify-between">
                            <form action="{{ route('products.destroy',$product) }}" method="POST" > 
                                @csrf
                                @method('DELETE')
                                <button  class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                >Eliminar</button>
                            </form>
                            <a href="{{ route('products.edit',$product->id) }}" 
                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Editar</a>
                        </div>
                        @endhasanyrole
                    </div>
                </div>
                @endforeach
            @else
            @foreach ($category->products as $product )
            

            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a >
                    <img class="p-8 rounded-t-lg" src="{{ $product->image_url }}" alt="product image" />
                </a>
                <div class="px-5 pb-5">
                    <a >
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$product->name}}</h5>
                    </a>
                    <div class="flex items-center flex-wrap gap-5 mt-2.5 mb-5">
                    <div class="inline-flex gap-1 ">
                            <p>Stock:</p>
                            <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ $product->stock }}</span>
                            </div>
                            <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        href="{{ route('stock_refill.create',["product_id"=>$product->id]) }}">Añadir stock</a>
                    </div>
                    <div class="pb-5">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">S/ {{ $product->price }}</span>
                        
                    </div>
                    @hasanyrole('admin|supervisor')
                    <div class="flex  justify-between">
                        <form action="{{ route('products.destroy',$product) }}" method="POST" > 
                            @csrf
                            @method('DELETE')
                            <button  class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                            >Eliminar</button>
                        </form>
                        <a href="{{ route('products.edit',$product->id) }}" 
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Editar</a>
                        
                        
                    </div>
                    @endhasanyrole
                </div>
            </div>
            @endforeach
            @endif
        </div>
        
        @else 
            <div class="text-center py-10">
                <h2>No hay productos en esta categoria</h2>
            </div>
        @endif
        
    </div>

@endsection