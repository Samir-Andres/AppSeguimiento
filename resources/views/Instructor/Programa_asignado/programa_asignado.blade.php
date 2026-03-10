@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Programas asignados')


@section('content_header')


    <div class="flex flex-wrap  items-center space-x-2 text-sm text-gray-500 font-medium">
        <a href="{{ route('home') }}" type="button" aria-label="Home" title="Dashboard">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M16 7.609c.352 0 .69.122.96.343l.111.1 6.25 6.25v.001a1.5 1.5 0 0 1 .445 1.071v7.5a.89.89 0 0 1-.891.891H9.125a.89.89 0 0 1-.89-.89v-7.5l.006-.149a1.5 1.5 0 0 1 .337-.813l.1-.11 6.25-6.25c.285-.285.67-.444 1.072-.444Zm5.984 7.876L16 9.5l-5.984 5.985v6.499h11.968z"
                    fill="#898d95ff" stroke="#898d95ff" stroke-width=".094" />
            </svg>
        </a>
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328"
                fill="#CBD5E1" />
        </svg>
        <a class="text-indigo-500">Programa asignados</a>

    </div>

    <div class="relative isolate flex items-center gap-x-6 overflow-hidden  px-6 py-2.5 sm:px-3.5 sm:before:flex-1">
        <div aria-hidden="true"
             class="absolute top-1/2 left-[max(-7rem,calc(50%-52rem))] -z-10 -translate-y-1/2 transform-gpu blur-2xl">
            <div style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"
                 class="aspect-577/310 w-144.25 bg-linear-to-r from-[#ff80b5] to-[#9089fc] opacity-30"></div>
        </div>
        <div aria-hidden="true"
             class="absolute top-1/2 left-[max(45rem,calc(50%+8rem))] -z-10 -translate-y-1/2 transform-gpu blur-2xl">
            <div style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"
                 class="aspect-577/310 w-144.25 bg-linear-to-r from-[#ff80b5] to-[#9089fc] opacity-30"></div>
        </div>
        <div class="flex flex-wrap items-center gap-x-4 gap-y-2">
            <p class="text-sm/6 text-gray-900">
                <strong class="font-semibold uppercase">Bienvenidos al centro de bitácoras,<span class="text-blue-600"></span> </strong>puedes cambiar el estado de la bitácora del aprendiz.
            </p>
        </div>
        <div class="flex flex-1 justify-end">

        </div>
    </div>

@stop

@section('content')

    <div class="relative overflow-x-auto sm:overflow-visible">
        <div class="overflow-x-auto">

            <div class="flex flex-wrap items-center justify-center gap-6">

                @forelse($fichas as $ficha)

                    <div class="rounded-2xl overflow-hidden border hover:-translate-y-1 transition duration-300 w-64 shadow-sm bg-white flex flex-col">

                        <div class="bg-gray-50 border-b px-4 py-3 text-center">
                            <p class="font-semibold text-gray-800 text-md">
                                {{ $ficha->Denominacion }}
                            </p>
                        </div>

                        <div class="flex flex-col items-center py-4 px-4 flex-grow">

                            <p class="text-gray-500 text-sm">
                                Ficha: <span class="font-medium">{{ $ficha->Codigo }}</span>
                            </p>

                            <p class="text-gray-400 text-xs mt-2">
                                Inicio: {{ $ficha->Fecha_Inicio }}
                            </p>

                            <p class="text-gray-400 text-xs">
                                Fin: {{ $ficha->Fecha_Fin }}
                            </p>

                        </div>

                        <div class="border-t px-4 py-3 flex justify-center">

                            <a href="{{route('ver.aprendices', $ficha->NIS)}}"
                               class="border text-sm text-gray-500 border-gray-200 hover:bg-gray-100 transition cursor-pointer px-6 py-1 rounded-full flex flex-col items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638
                                           0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49
                                           16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>

                                <span class="text-xs">Ver</span>

                            </a>

                        </div>

                    </div>

                @empty

                    <div class="w-full flex justify-center mt-10">

                        <div class="bg-yellow-50 border border-yellow-200 text-yellow-700 px-6 py-4 rounded-lg text-center shadow-sm">

                            <p class="font-semibold text-lg">
                                No tienes fichas asignadas
                            </p>

                            <p class="text-sm mt-1 text-yellow-600">
                                Actualmente no hay programas asociados a tu usuario.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>
        </div>

@endsection




