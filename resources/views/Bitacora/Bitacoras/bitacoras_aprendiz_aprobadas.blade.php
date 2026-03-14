@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Bitácoras aprobadas')


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
        <a href="{{ route('ver.programa.aprobados') }}">Programa asignados aprobados</a>

        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328"
                fill="#CBD5E1" />
        </svg>
        <a href="{{ route('ver.aprendices.aprobados', $ficha->NIS) }}">{{ $ficha->Denominacion }}</a>

        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328"
                fill="#CBD5E1" />
        </svg>
        <a class="text-indigo-500">Aprendiz</a>


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
                <strong class="font-semibold uppercase">Bienvenidos al centro de bitácora del aprendiz <span
                        class="text-blue-600">{{ $aprendiz->Nombres }} {{ $aprendiz->Apellidos }}</span> </strong>
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
                        <th scope="col" class="px-6 py-3">ID del sistema</th>
                        <th scope="col" class="px-6 py-3">bitácora</th>
                        <th scope="col" class="px-6 py-3">Nombre del aprendiz</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                        <th scope="col" class="px-6 py-3">Hora de creación</th>
                        <th scope="col" class="px-6 py-3">Hora de actualización</th>
                        <th scope="col" class="px-6 py-3">Desaprobar</th>

                    </tr>
                </thead>
                <tbody>

                    @forelse ($bitacora  as $item)
                        <tr class="bg-white border-b hover:bg-gray-50">

                            <td class="px-6 py-2  whitespace-nowrap">
                                {{ $item->id }}

                            </td>

                            <td class="px-6  whitespace-nowrap ">
                               <span class="flex items-center gap-1 px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                   <a href="{{ asset($item->file) }}" target="_blank" title="Ver" >
                                    <i class="bi bi-filetype-pdf text-red-500"></i> </a> Archivo

                                </span>
                            </td>

                            <td class="px-6 py-2  whitespace-nowrap">
                                {{ $item->aprendiz->Nombres }}

                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                                <span   class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    @if($item->estado)
                                   {{$item->estado}}
                               @endif
                                </span>

                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ $item->created_at }}
                                </span>


                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ $item->updated_at }}
                                </span>

                            </td>

                            <td class="px-7 py-2 whitespace-nowrap ">

                                {{--Boton de cambiar estado de Aprobada a creada, para cambiar el estado a creada--}}
                                <button class="btn-desaprobar-bitacora text-green-400 px-3" title="Aprobar"
                                    data-url="{{ route('desaprobar.bitacora', $item->id) }}"
                                    data-nombre="{{ $item->aprendiz->Nombres }} {{ $item->aprendiz->Apellidos }}">

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </button>

                                <!--Formulario que envía al controlador para cambiar estado de creada a Aprobada-->
                                <form id="form-desaprobar-bitacora" method="POST" class="hidden">
                                    @csrf
                                    @method('PUT')
                                </form>

                            </td>

                        </tr>

                    @empty
                        <tr class="bg-white border-b">
                            <td colspan="10" class="px-6 py-10 text-center text-gray-500">
                                No hay registros disponibles para desaprobar para el aprendiz <span class="text-blue-600">  {{$aprendiz->Nombres }} {{ $aprendiz->Apellidos}} </span>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>


    </div>

    <div class="mt-4">
        {{ $bitacora->links() }}
    </div>

    <div id="session-messages" data-success="{{ session('success') }}" data-error="{{ session('error') }}">
    </div>


@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
    <script src="{{ asset('js/DesaprobarBitacora.js') }}"></script>


@endsection
