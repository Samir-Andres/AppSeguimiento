@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Aprendices asignados')


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
        <a href="{{route('ver.programa')}}"  class="text-gray-500 no-underline  hover:text-indigo-500">Programa asignados</a>

        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328"
                fill="#CBD5E1" />
        </svg>
        <a href="{{route('ver.programa')}}" class="text-gray-500 no-underline hover:text-indigo-500">{{$ficha->Denominacion}}</a>

        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328"
                fill="#CBD5E1" />
        </svg>
        <a class="text-indigo-500">Aprendices</a>

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
                <strong class="font-semibold uppercase">Bienvenidos, revise los aprendices de la ficha <span class="text-blue-600">{{$ficha->Denominacion}}</span>, el total de aprendices {{$aprendiz->count()}} </strong>
            </p>

        </div>

        <div class="flex flex-1 justify-end">

        </div>
    </div>

@stop

@section('content')



    <div class="relative overflow-x-auto sm:overflow-visible shadow-md sm:rounded-lg">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500" id="tabla_alternativas">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">N. documentos</th>
                    <th scope="col" class="px-6 py-3">Nombre</th>
                    <th scope="col" class="px-6 py-3">Apellidos</th>
                    <th scope="col" class="px-6 py-3">Teléfono</th>
                    <th scope="col" class="px-6 py-3">Correo institucional</th>
                    <th scope="col" class="px-6 py-3">Correo personal</th>
                    <th scope="col" class="px-6 py-3">Total de bitácoras</th>
                    <th scope="col" class="px-6 py-3">Documentación</th>

                </tr>
                </thead>
                <tbody>

                @forelse ($aprendiz  as $item)
                    <tr class="bg-white border-b hover:bg-gray-50">

                       <td class="px-6 py-3 whitespace-nowrap">
                            {{ $item->Numdoc}}

                        </td>

                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ $item->Nombres}}

                        </td>

                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ $item->Apellidos}}

                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ $item->Telefono}}

                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ $item->Correo_Institucional}}

                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ $item->Correo_Personal}}

                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">

                       <span class="flex items-center gap-2 bg-red-50 text-red-600 px-3 py-1 rounded-full text-sm font-medium w-fit">

                       {{ $item->bitacoras_pendientes_count }}

                       <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">

                       <path d="M6 2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6H6zm7 1.5L19.5 10H13V3.5zM8 13h1.5a1.5 1.5 0 1 1 0 3H9v2H8v-5zm1 1v1h.5a.5.5 0 0 0 0-1H9zm4-1h1.2a2 2 0 0 1 0 4H13v1h-1v-5h1zm1 1h-.5v2h.5a1 1 0 0 0 0-2zm4-1h-2v5h1v-2h1v-1h-1v-1h1v-1z"/>

                       </svg>
                           por revisar

                       </span>

                        </td>


                        <td class="px-6 py-3 whitespace-nowrap">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                             <a href="{{route('ver.documentacion', $item->NIS)}}" class="text-inherit no-underline hover:text-green-800"> <span> Ver documentación</span></a>

                        </span>

                        </td>
                    </tr>

                @empty
                    <tr class="bg-white border-b">
                        <td colspan=6" class="px-6 py-10 text-center text-gray-500">
                            No hay aprendices asignados a programa.
                        </td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>




    </div>

    <div class="mt-4">
        {{ $aprendiz->links() }}
    </div>



@endsection



