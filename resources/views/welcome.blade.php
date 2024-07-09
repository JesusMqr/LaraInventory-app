<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LaraInventory</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-slate-950 dark:text-white/50">
    <header class="border-b-2 dark:border-blue-600 ">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
              <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                  <img src="https://pbs.twimg.com/profile_images/1701878932176351232/AlNU3WTK_400x400.jpg" class="h-8" alt="Flowbite Logo" />
                  <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">LaraInventory</span>
              </a>
              <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                  <span class="sr-only">Open main menu</span>
                  <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                  </svg>
              </button>
              <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        @auth
                        <a href="{{ route('dashboard') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Dashboard</a>
                    
                        @endauth
                        @guest
                        <a href="{{ route('dashboard') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Login</a>
                        @endguest
                    </li>
                </ul>
              </div>
            </div>
          </nav>
            

  
    </header>
    <main class="px-4 max-w-screen-xl mx-auto py-10 flex flex-col gap-10">
        <section class="grid md:grid-cols-2 gap-10  ">
            <div class="flex gap-7 flex-col  ">
                <div >
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Sobre la aplicacion</span>
                </div>
                <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text uppercase bg-gradient-to-r to-emerald-600 from-sky-400">LaraInventory:</span> Sistema para gestion de inventarios</h1>

                <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl px-10 md:px-0 dark:text-gray-400">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>
                <div class="inline-flex justify-center md:justify-start gap-5">
                    <a href="#" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30  mb-2">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                        </svg>
                        Ver repositorio
                        </a>
                        <a href="#" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Ver credenciales</a>
                </div>
            </div>
            <div class="">
                <img class="w-full rounded"
                src="https://pbs.twimg.com/profile_images/1701878932176351232/AlNU3WTK_400x400.jpg" alt="">
            </div>
        </section>
        <div class="grid md:grid-cols-2  gap-10">
            <section class="flex flex-col gap-3">
                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Conoce al desarrollador</span>
                <div class="flex py-5 gap-5">
                    <div class="flex items-center gap-4">
                        <img class="w-16 h-16 rounded-full" src="https://pbs.twimg.com/profile_images/1701878932176351232/AlNU3WTK_400x400.jpg" alt="">
                        <div class="font-medium dark:text-white">
                            <div>Jesus Maquera</div>
                            <ul>
                                <li class="text-sm text-gray-500 dark:text-gray-400">Github</li>
                                <li class="text-sm text-gray-500 dark:text-gray-400">Correo@correo.gmail.es</li>
                                <li class="text-sm text-gray-500 dark:text-gray-400">Linkedin</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <p  class="text-gray-500 dark:text-gray-400 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error voluptatum officia excepturi? Eius sunt obcaecati, similique facilis quae incidunt perferendis expedita, tempora doloremque dolore repellat a sapiente ipsum. Neque, nesciunt.</p>
            </section>
            
            <section class="flex flex-col gap-3">
                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">KeyFeatures</span>
                <div class="flex flex-col gap-5">
                    <div>
                        <h3 class=" text-lg font-semibold text-gray-900 dark:text-white">Gestion de Inventarios</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm" >Lorem ipsum dolor sit amet consectetur adipisicing  nesciunt.</p>
                    </div>
                    <div>
                        <h3 class=" text-lg font-semibold text-gray-900 dark:text-white">Control de stock</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Lorem ipsum dolor sit amet consectetita, tempora doloremque dolore repellat a sapiente ipsum. Neque, nesciunt.</p>
                    </div>
                    <div>
                        <h3 class=" text-lg font-semibold text-gray-900 dark:text-white">Usuarios y Roles</h3>
                        <p   class="text-gray-500 dark:text-gray-400 text-sm">Lorem ipsum dolor sErrouri? Eius sunt obcaecati, similique facilis quae incidunt perferendis expedita, tempora doloremque dolore repellat a sapiente ipsum. Neque, nesciunt.</p>
                    </div>
                    <div>
                        <h3 class=" text-lg font-semibold text-gray-900 dark:text-white">Reportes y estadisticas</h3>
                        <p   class="text-gray-500 dark:text-gray-400 text-sm">Lorem ipsum  elit. Error miepellat a sapiente ipsum. Neque, nesciunt.</p>
                    </div>
                </div>
            </section>

            <section class="flex flex-col gap-3">
                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Testimonios</span>
                
                <div class="flex flex-col gap-5">
                    <article >
                        <div class="flex gap-3">
                            
                            <div class="flex items-center gap-4">
                                <img class="w-10 h-10 rounded-full" src="https://pbs.twimg.com/profile_images/1701878932176351232/AlNU3WTK_400x400.jpg" alt="">
                                <div class="font-medium dark:text-white">
                                    <div>Jese Leos</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Project Manager</div>
                                </div>
                            </div>

                        </div>
                        <p class="text-gray-500 mt-2 dark:text-gray-400 text-sm">Lorem ipsum dolor sit amet consectetita, tempora doloremque dolore repellat a sapiente ipsum. Neque, nesciunt.</p>
                    </article>
                    <article >
                        <div class="flex gap-3">
                            
                            <div class="flex items-center gap-4">
                                <img class="w-10 h-10 rounded-full" src="https://pbs.twimg.com/profile_images/1701878932176351232/AlNU3WTK_400x400.jpg" alt="">
                                <div class="font-medium dark:text-white">
                                    <div>Jese Leos</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Project Manager</div>
                                </div>
                            </div>

                        </div>
                        <p class="text-gray-500 mt-2 dark:text-gray-400 text-sm">Lorem ipsum dolor sit amet consectetita, tempora doloremque dolore repellat a sapiente ipsum. Neque, nesciunt.</p>
                    </article>
                </div>
            </section>

            <section class="flex flex-col gap-3 ">
                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">FQAs</span>
                
                <div class="flex flex-col gap-3 py-3">
                    <div>
                        <h3 class=" text-lg font-semibold text-gray-900 dark:text-white">Que plataforma soporta LaraInventory?</h3>
                        <p  class="text-gray-500 dark:text-gray-400 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing  nesciunt.</p>
                    </div>
                    <div>
                        <h3 class=" text-lg font-semibold text-gray-900 dark:text-white">Hay una prueba gratuita o demo?</h3>
                        <p  class="text-gray-500 dark:text-gray-400 text-sm">Lorem ipsum dolor sit amet consectetita, tempora doloremque dolore repellat a sapiente ipsum. Neque, nesciunt.</p>
                    </div>
                    <div>
                        <h3 class=" text-lg font-semibold text-gray-900 dark:text-white">Como puedo empezar a usar LaraInventory?</h3>
                        <p  class="text-gray-500 dark:text-gray-400 text-sm">Lorem ipsum dolor sErrouri? Eius sunt obcaecati, similique facilis quae incidunt perferendis expedita, tempora doloremque dolore repellat a sapiente ipsum. Neque, nesciunt.</p>
                    </div>
                </div>
            </section>
        </div>
    </main>  
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>   
    </body>
</html>
