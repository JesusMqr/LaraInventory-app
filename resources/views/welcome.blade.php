<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaraInventory</title>
    <link rel="shortcut icon" href="{{ asset('images/Logo.png') }}" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased dark:bg-slate-950 dark:text-white/50 pb-20">
    <header class="border-b-2 dark:border-blue-600 ">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('images/Logo.png') }}"
                        class="h-8" alt="Flowbite Logo" />
                    <span
                        class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">LaraInventory</span>
                </a>
                <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul
                        class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            @auth
                                <a href="{{ route('dashboard') }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Dashboard</a>

                            @endauth
                            @guest
                                <a href="{{ route('login') }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Login</a>
                            @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



    </header>
    <main class="px-4 max-w-screen-xl mx-auto py-10 flex flex-col gap-10">
        <section class="grid md:grid-cols-2 gap-10  ">
            <div class="flex gap-5 flex-col  ">
                <div>
                    <span
                        class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Sobre
                        la aplicacion</span>
                </div>
                <h1 class=" text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                        class="text-transparent bg-clip-text uppercase bg-gradient-to-r to-emerald-600 from-sky-400">LaraInventory</span>
                    Sistema para gestion de inventarios</h1>

                <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl px-10 md:px-0 dark:text-gray-400">
                    LaraInventory es una herramienta fácil de usar para gestionar tu inventario. Registra y sigue tus
                    productos, controla existencias y gestiona movimientos de stock. LaraInventory te ayuda a mantener
                    todo organizado y ofrece informes claros para que tomes mejores decisiones.</p>
                <div class="flex md:flex-row  justify-center md:justify-start gap-5">
                    <a href="https://github.com/JesusMqr/LaraInventory-app"
                        class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30  mb-2">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                                clip-rule="evenodd" />
                        </svg>
                        Ver repositorio
                    </a>
                    <a href="#"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Ver
                        credenciales</a>
                </div>
            </div>
            <div class="">
                <img class="w-full rounded" src="{{ asset('images/LaraInventoryApp.jpeg') }}" alt="">
            </div>
        </section>
        <div class="grid md:grid-cols-2  gap-10">
            <section class="flex flex-col gap-3">
                <span
                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Conoce
                    al desarrollador</span>
                <div class="flex py-5 gap-5">
                    <div class="flex items-center gap-4">
                        <img class="w-16 h-16 rounded-full" src="{{ asset('images/LogoDev.jpeg') }}" alt="">
                        <div class="font-medium dark:text-white">
                            <div>Jesus Maquera</div>
                            <ul>
                                <li>
                                    <a href="https://github.com/JesusMqr"
                                        class="inline-flex items-center font-medium text-sm text-gray-500 dark:text-gray-400 hover:underline">
                                        <svg class="w-4 h-4 ms-2 rtl:rotate-180"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-github"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" /></svg>
                                        JesusMqr
                                    </a>
                                </li>
                                <li>
                                    <a href="https://mail.google.com/mail/u/0/?to=jesusmaquera10@gmail.com&fs=1&tf=cm"
                                        class="inline-flex items-center font-medium text-sm text-gray-500 dark:text-gray-400 hover:underline">
                                        <svg class="w-4 h-4 ms-2 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mail"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
                                        jesusmaquera10@gmail.com
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/in/jesusmcode/"
                                        class="inline-flex items-center font-medium text-sm text-gray-500 dark:text-gray-400 hover:underline">
                                        <svg class="w-4 h-4 ms-2 rtl:rotate-180"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-linkedin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M8 11l0 5" /><path d="M8 8l0 .01" /><path d="M12 16l0 -5" /><path d="M16 16v-3a2 2 0 0 0 -4 0" /></svg>
                                        Jesus Maquera
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <p class="text-gray-500 dark:text-gray-400 text-sm">
                    Tecnico en Ingenieria de Software residenete en Perú. Especializado en el Desarrollo Web Full-Stack, siempre buscando la oportunidad de aprender y aplicar mis conocimientos adquiridos. Puedes ver mas de mis conocimientos en mi <a class="font-medium text-sm text-gray-500 dark:text-gray-400 hover:underline" href="https://www.jesusmqr.lat/">Portafolio Web</a>. </p>
            </section>

            <section class="flex flex-col gap-3">
                <span
                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">KeyFeatures</span>
                <div class="flex flex-col gap-5">
                    <div>
                        <h3 class=" text-lg font-semibold text-gray-900 dark:text-white">Registro de Productos</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Registra y mantén un seguimiento detallado de todos tus productos en un solo lugar, facilitando la administración y consulta de información. </p>
                    </div>
                    <div>
                        <h3 class=" text-lg font-semibold text-gray-900 dark:text-white">Control de Existencias</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Monitorea tus niveles de inventario en tiempo real para asegurar que siempre tengas suficiente stock disponible y evitar sobreabastecimiento.</p>
                    </div>
                    <div>
                        <h3 class=" text-lg font-semibold text-gray-900 dark:text-white">Control de Roles</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Asigna y gestiona roles y permisos para diferentes usuarios, asegurando que cada miembro de tu equipo tenga acceso adecuado a las funciones del sistema.</p>
                    </div>
                    <div>
                        <h3 class=" text-lg font-semibold text-gray-900 dark:text-white">Gestión de Movimientos de Stock</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Administra y registra todos los movimientos de inventario, para mantener un historial preciso.</p>
                    </div>
                </div>
            </section>

            <section class="flex flex-col gap-3">
                <span
                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Testimonios</span>

                <div class="flex flex-col gap-5">
                    <article class="hover:scale-105 transition hover:translate-x-2 hover:translate-y-2">
                        <div class="flex gap-3">

                            <div class="flex items-center gap-4">
                                <img class="w-10 h-10 rounded-full"
                                    src="https://images.pexels.com/photos/1270076/pexels-photo-1270076.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                    alt="">
                                <div class="font-medium dark:text-white">
                                    <div>Juan Pérez</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400"> Gerente de Almacén</div>
                                </div>
                            </div>

                        </div>
                        <p class="text-gray-500 mt-2 italic dark:text-gray-400 text-sm">"LaraInventory ha transformado completamente la manera en que gestionamos nuestro inventario. La capacidad de registrar y seguir productos detalladamente nos ha ahorrado tiempo y reducido errores significativamente."</p>
                    </article>
                    <article class="hover:scale-105 transition hover:translate-x-2 hover:translate-y-2">
                        <div class="flex gap-3">

                            <div class="flex items-center gap-4">
                                <img class="w-10 h-10 rounded-full"
                                    src="https://images.pexels.com/photos/2748239/pexels-photo-2748239.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                    alt="">
                                <div class="font-medium dark:text-white">
                                    <div>Ana Gómez</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Coordinadora de Logística</div>
                                </div>
                            </div>

                        </div>
                        <p class="text-gray-500 mt-2 italic dark:text-gray-400 text-sm">"LaraInventory nos ha permitido mantener un control preciso de nuestros niveles de stock. La función de análisis de tendencias es especialmente útil para anticipar necesidades futuras y optimizar nuestra cadena de suministro."</p>
                    </article>
                </div>
            </section>

            <section class="flex flex-col gap-3 ">
                <span
                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">FQAs</span>

                <div class="flex flex-col gap-3 py-3">
                    <details>
                        <summary class="cursor-pointer text-lg list-none font-semibold text-gray-900 dark:text-white">¿Qué beneficios ofrece LaraInventory a mi negocio?</summary>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">LaraInventory ayuda a optimizar la gestión de inventarios, reducir costos operativos, mejorar la precisión en la toma de decisiones y aumentar la eficiencia en las operaciones logísticas.</p>
                    </details>
                    <details>
                        <summary class="cursor-pointer text-lg font-semibold list-none text-gray-900 dark:text-white">¿Ofrecen soporte técnico?</summary>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Sí, nuestro equipo de soporte técnico está disponible para ayudarte con cualquier consulta o problema que puedas tener.</p>
                    </details>
                    <details>
                        <summary class=" cursor-pointer text-lg font-semibold list-none text-gray-900 dark:text-white">¿Cómo puedo empezar a usar LaraInventory?</summary>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Para comenzar, contáctanos a través de nuestras redes sociales o correo electrónico para recibir seguimiento personalizado y obtener una cotización adaptada a tus necesidades específicas de negocio.</p>
                    </details>
                    <details>
                        <summary class="cursor-pointer list-none text-lg font-semibold text-gray-900 dark:text-white">¿Qué dispositivos son compatibles con LaraInventory?</summary>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">LaraInventory es accesible desde cualquier dispositivo con conexión a internet, incluyendo computadoras de escritorio, tablets y smartphones.</p>
                    </details>
                </div>
            </section>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
