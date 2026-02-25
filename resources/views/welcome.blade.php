<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Seguimiento</title>

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

        * {
            font-family: "Poppins", sans-serif;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white dark:bg-neutral-950 flex flex-col min-h-screen">


    <nav class="border-b border-gray-300 bg-white sticky top-0 z-50 transition-all">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between py-2">

            <!-- Logo (Añadido flex-shrink-0 para que no se achique) -->
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

            <!-- Menú Móvil  -->
            <div id="mobile-menu"
                class="hidden absolute top-full left-0 w-full bg-white z-50 border-b shadow-xl flex-col items-center p-6 gap-4 sm:hidden">
                <a href="#" class="text-gray-600 hover:text-indigo-600 font-medium">Dashboard</a>
                <a href="#nosotros" class="text-gray-600 hover:text-indigo-600 font-medium">Nosotros</a>
                <a href="#"
                    class="text-gray-600 hover:text-indigo-600 font-medium border-b w-full text-center pb-4">Contactos</a>

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
                    <a href="#nosotros" class="hover:text-indigo-600 transition">Sobre nosotros</a>
                    <a href="#" class="hover:text-indigo-600 transition">Contactos</a>
                </div>

                <div class="flex items-center gap-2 border-l pl-4 border-gray-200">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}"
                                class="whitespace-nowrap px-4 py-2 bg-indigo-500 hover:bg-indigo-600 transition text-white rounded-full text-sm font-semibold">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="whitespace-nowrap px-6 py-2 bg-indigo-500 hover:bg-indigo-600 transition text-white rounded-full text-sm font-semibold">Log
                                in</a>
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


    <script>
        document.getElementById("menu-toggle").addEventListener("click", function() {
            const menu = document.getElementById("mobile-menu");
            if (menu.classList.contains("hidden")) {
                menu.classList.remove("hidden");
                menu.classList.add("flex");
            } else {
                menu.classList.add("hidden");
            }
        });
    </script>

    <header class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-6">

    </header>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <h1 class="text-3xl font-semibold text-center mx-auto">Our Latest Creations</h1>
    <p class="text-sm text-slate-500 text-center mt-2 max-w-lg mx-auto">A visual collection of our most recent works -
        each piece crafted with intention, emotion, and style.</p>
    <div class="flex items-center gap-2 h-[400px] w-full max-w-4xl mt-10 mx-auto mb-5">
        <div
            class="relative group flex-grow transition-all w-56 rounded-lg overflow-hidden h-[400px] duration-500 hover:w-full">
            <img class="h-full w-full object-cover object-center"
                src="https://images.unsplash.com/photo-1719368472026-dc26f70a9b76?q=80&h=800&w=800&auto=format&fit=crop"
                alt="image">
        </div>
        <div
            class="relative group flex-grow transition-all w-56 rounded-lg overflow-hidden h-[400px] duration-500 hover:w-full">
            <img class="h-full w-full object-cover object-center"
                src="https://images.unsplash.com/photo-1649265825072-f7dd6942baed?q=80&h=800&w=800&auto=format&fit=crop"
                alt="image">
        </div>
        <div
            class="relative group flex-grow transition-all w-56 rounded-lg overflow-hidden h-[400px] duration-500 hover:w-full">
            <img class="h-full w-full object-cover object-center"
                src="https://images.unsplash.com/photo-1555212697-194d092e3b8f?q=80&h=800&w=800&auto=format&fit=crop"
                alt="image">
        </div>
        <div
            class="relative group flex-grow transition-all w-56 rounded-lg overflow-hidden h-[400px] duration-500 hover:w-full">
            <img class="h-full w-full object-cover object-center"
                src="https://images.unsplash.com/photo-1729086046027-09979ade13fd?q=80&h=800&w=800&auto=format&fit=crop"
                alt="image">
        </div>
        <div
            class="relative group flex-grow transition-all w-56 rounded-lg overflow-hidden h-[400px] duration-500 hover:w-full">
            <img class="h-full w-full object-cover object-center"
                src="https://images.unsplash.com/photo-1601568494843-772eb04aca5d?q=80&h=800&w=800&auto=format&fit=crop"
                alt="image">
        </div>
        <div
            class="relative group flex-grow transition-all w-56 rounded-lg overflow-hidden h-[400px] duration-500 hover:w-full">
            <img class="h-full w-full object-cover object-center"
                src="https://images.unsplash.com/photo-1585687501004-615dfdfde7f1?q=80&h=800&w=800&auto=format&fit=crop"
                alt="image">
        </div>
    </div>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <h1 class="text-3xl font-semibold text-center mx-auto mt-8" id="nosotros">Sobre AppSeguimientos</h1>
    <p class="text-sm text-slate-500 text-center mt-2 max-w-lg mx-auto">
       Software de Gestión a la etapa productiva.
    </p>

    <div class="relative max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 px-8 md:px-0 pt-20 mb-10">
        <div
            class="size-[520px] -top-80 left-1/2 -translate-x-1/2 rounded-full absolute blur-[300px] -z-10 bg-[#FBFFE1]">
        </div>
        <div class="py-10 border-b border-gray-200 md:py-0 md:border-r md:border-b-0 md:px-10">
            <div class="size-10 p-2 bg-indigo-50 border border-indigo-200 rounded">
                <img src="https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/aboutSection/flashEmoji.png"
                    alt="">
            </div>
            <div class="mt-5 space-y-2">
                <h3 class="text-base font-medium text-slate-600">Lightning-Fast Performance</h3>
                <p class="text-sm text-slate-500">Built with speed — minimal load times and optimized.</p>
            </div>
        </div>
        <div class="py-10 border-b border-gray-200 md:py-0 lg:border-r md:border-b-0 md:px-10">
            <div class="size-10 p-2 bg-indigo-50 border border-indigo-200 rounded">
                <img src="https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/aboutSection/colorsEmoji.png"
                    alt="">
            </div>
            <div class="mt-5 space-y-2">
                <h3 class="text-base font-medium text-slate-600">Beautifully Designed Components</h3>
                <p class="text-sm text-slate-500">Modern, pixel-perfect UI components ready for any project.</p>
            </div>
        </div>
        <div class="py-10 border-b border-gray-200 md:py-0 md:border-b-0 md:px-10">
            <div class="size-10 p-2 bg-indigo-50 border border-indigo-200 rounded">
                <img src="https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/aboutSection/puzzelEmoji.png"
                    alt="">
            </div>
            <div class="mt-5 space-y-2">
                <h3 class="text-base font-medium text-slate-600">Plug-and-Play Integration</h3>
                <p class="text-sm text-slate-500">Simple setup with support for React, Next.js and Tailwind css.</p>
            </div>
        </div>
    </div>


    <footer class="bg-black text-white py-12 md:py-16 px-4 sm:px-6 md:px-8 lg:px-20">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-6 gap-8 md:gap-16">

            <div class="lg:col-span-3 space-y-6">
                <a href="https://prebuiltui.com" class="block">
                    <svg width="157" height="40" viewBox="0 0 157 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m8.75 11.3 6.75 3.884 6.75-3.885M8.75 34.58v-7.755L2 22.939m27 0-6.75 3.885v7.754M2.405 15.408 15.5 22.954l13.095-7.546M15.5 38V22.939M29 28.915V16.962a2.98 2.98 0 0 0-1.5-2.585L17 8.4a3.01 3.01 0 0 0-3 0L3.5 14.377A3 3 0 0 0 2 16.962v11.953A2.98 2.98 0 0 0 3.5 31.5L14 37.477a3.01 3.01 0 0 0 3 0L27.5 31.5a3 3 0 0 0 1.5-2.585"
                            stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <p class="text-sm md:text-base">Software de gestión de etapa productiva.</p>
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                    <input type="email" placeholder="sgep@gmail.com"
                        class="bg-[#14171A] text-white/70 border border-white/10 px-3 py-3 rounded-md w-full sm:flex-1 sm:max-w-xs placeholder:text-sm placeholder:font-light focus:outline-none focus:ring-1 focus:ring-gray-600" />
                    <button
                        class="bg-[#14171A] text-white px-5 py-3 rounded-md border border-white/10 text-sm hover:bg-gray-800 transition-colors">
                        Subscribe
                    </button>
                </div>
            </div>

            <div class="lg:col-span-3 grid grid-cols-2 md:grid-cols-3 gap-8 md:gap-12 lg:gap-28 items-start">
                <div>
                    <h3 class="font-medium text-sm mb-4 md:mb-6">Products</h3>
                    <ul class="space-y-3 md:space-y-4 text-sm text-white/70">
                        <li><a href="#" class="hover:text-white">Components</a></li>
                        <li><a href="#" class="hover:text-white">Templates</a></li>
                        <li><a href="#" class="hover:text-white">Icons</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-medium text-sm mb-4 md:mb-6">Resources</h3>
                    <ul class="space-y-3 md:space-y-4 text-sm text-white/70">
                        <li><a href="#" class="hover:text-white">PrebuiltUI</a></li>
                        <li><a href="#" class="hover:text-white">Templates</a></li>
                        <li><a href="#" class="hover:text-white">Components</a></li>
                        <li><a href="#" class="hover:text-white">Blogs</a></li>
                        <li><a href="#" class="hover:text-white">Store</a></li>
                    </ul>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <h3 class="font-medium text-sm mb-4 md:mb-6">Company</h3>
                    <ul class="space-y-3 md:space-y-4 text-sm text-white/70">
                        <li><a href="#" class="hover:text-white">About</a></li>
                        <li><a href="#" class="hover:text-white">Vision</a></li>
                        <li class="flex items-center gap-2">
                            <a href="#" class="hover:text-white">Careers</a>
                            <span
                                class="text-[11px] font-bold px-2 py-0.5 rounded-full bg-green-950 border border-green-300 text-green-300">HIRING</span>
                        </li>
                        <li><a href="#" class="hover:text-white">Privacy policy</a></li>
                        <li><a href="#" class="hover:text-white">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div
            class="max-w-7xl mx-auto mt-12 md:mt-16 pt-6 border-t border-neutral-700 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-white/70 text-xs sm:text-sm order-2 md:order-1">{{date('d/m/Y')}}</p>
            <div class="flex gap-5 md:gap-6 order-1 md:order-2">

                <a href="#" class="text-white hover:text-gray-300 leading-none">
                    <i class="fa-brands fa-x-twitter text-lg"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-300 leading-none">
                    <i class="fa-brands fa-github text-lg"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-300 leading-none">
                    <i class="fa-brands fa-linkedin text-lg"></i>
                </a>
            </div>
        </div>
    </footer>

</body>

</html>
