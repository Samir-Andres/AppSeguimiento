<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>
    @yield('title', 'SGEP')
   </title>
 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    @vite('resources/css/app.css')
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


</head>

<body>
    <div id="app">
        <nav class="border-b border-gray-300 bg-white sticky top-0 z-50 transition-all">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between py-2">

                
                <a href="/" class="text-2xl font-bold text-black dark:text-white flex-shrink-0">
                    App<span class="text-blue-600">Seguimiento</span>
                </a>

                <!-- Botón Hamburguesa (Móvil) -->
                <button aria-label="Menu" id="menu-toggle" class="sm:hidden p-2">
                    <svg width="21" height="15" viewBox="0 0 21 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="21" height="1.5" rx=".75" fill="#426287" />
                        <rect x="8" y="6" width="13" height="1.5" rx=".75" fill="#426287" />
                        <rect x="6" y="13" width="15" height="1.5" rx=".75" fill="#426287" />
                    </svg>
                </button>

                <!-- Menú Móvil (Desplegable) -->
                <div id="mobile-menu"
                    class="hidden absolute top-full left-0 w-full bg-white z-50 border-b shadow-xl flex-col items-center p-6 gap-4 sm:hidden">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600 font-medium">Home</a>
                    <a href="#" class="text-gray-600 hover:text-indigo-600 font-medium">Nosotros</a>
                    <a href="#"
                        class="text-gray-600 hover:text-indigo-600 font-medium border-b w-full text-center pb-4">Contactos
                    </a>

                    @if (Route::has('login'))
                        <div class="flex flex-col items-center gap-3 w-full mt-2">
                            @auth
                                <a href="{{ url('/home') }}"
                                    class="w-fit px-6 py-2 bg-indigo-500 text-white rounded-full text-sm font-semibold shadow-md">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="w-fit px-10 py-2 bg-indigo-500 text-white rounded-full text-sm font-semibold shadow-md text-center">Log
                                    in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="w-fit px-10 py-2 border border-indigo-500 text-indigo-500 rounded-full text-sm font-semibold">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>

                <!-- Menú Desktop -->
                <div class="hidden sm:flex items-center gap-4 md:gap-8">
                    <div class="flex items-center gap-4 md:gap-6 text-sm font-medium text-gray-600">
                        <a href="{{ route('home') }}" class="hover:text-indigo-600 transition">Dashboard</a>
                        <a href="#" class="hover:text-indigo-600 transition">Sobre nosotros</a>
                        <a href="#" class="hover:text-indigo-600 transition">Contactos</a>
                    </div>

                    <div class="flex items-center gap-2 border-l pl-4 border-gray-200">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/home') }}"
                                    class="whitespace-nowrap px-4 py-2 bg-indigo-500 hover:bg-indigo-600 transition text-white rounded-full text-sm font-semibold">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="whitespace-nowrap px-6 py-2 bg-indigo-500 hover:bg-indigo-600 transition text-white rounded-full text-sm font-semibold">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="whitespace-nowrap px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 transition rounded-full text-sm font-semibold">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>


    </div>
</body>

</html>
