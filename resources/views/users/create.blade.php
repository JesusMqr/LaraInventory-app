@extends('layouts.web')
@section('header')
    {{ $header = "Crear Usuario" }}

    @section('navigator')
    <a href="{{ route('users') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l4 4" /><path d="M5 12l4 -4" /></svg>
        Volver
        </a>
    @endsection
@endsection


@section('alerts')
@include('components.error-alert')
@include('components.message-alert')
@endsection

@section('content')
    <h2>Crear usuario</h2>
    <form action="{{ route('users.register') }}" method="POST" class=" flex flex-col mt-5 gap-5">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="name" 
            id="name" 
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2
             border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 
             focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
             placeholder=" " required />
            <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500
             dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
             peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600
              peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
              peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" 
            id="email" 
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2
             border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 
             focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
             placeholder=" " required />
            <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500
             dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
             peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600
              peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
              peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
        </div>
        <div class="grid  md:grid-cols-2 gap-10">
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="password" 
                id="password" 
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2
                 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 
                 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
                 placeholder=" " required />
                <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500
                 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                 peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600
                  peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                  peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="password_confirmation" 
                id="password_confirmation" 
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2
                 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 
                 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
                 placeholder=" " required />
                <label for="password_confirmation" class="peer-focus:font-medium absolute text-sm text-gray-500
                 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                 peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600
                  peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                  peer-focus:scale-75 peer-focus:-translate-y-6">Confirmar password</label>
            </div>
        </div>
        
        <div class="flex  gap-10 items-center">
            <label for="role"
            class=" text-gray-500 bg-transparent  border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200">Rol:</label>
            <select id="role" name="role" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option value="admin">Administrador</option>
                <option selected value="user">Usuario</option>
                <option value="supervisor">Supervisor</option>
            </select>
        </div>
        <div class="text-end">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
         focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto 
         px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear</button>
        </div>
    </form>


@endsection