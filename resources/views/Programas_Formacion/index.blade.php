@extends('adminlte::page')

@section('title', 'Programas')


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
        <a class="text-indigo-500">Programas Formación</a>

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
                <strong class="font-semibold uppercase">Centro de registro </strong>Puedes registrar programas de formación
            </p>
            <a href="{{route('Programas.create')}}"
               class="flex-none rounded-full bg-gray-900 px-3.5 py-1 text-sm font-semibold text-white shadow-xs hover:bg-gray-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">Crear<i class="fas fa-plus-circle px-2"></i>
            </a>
        </div>
        <div class="flex flex-1 justify-end">

        </div>
    </div>

@endsection

@section('content')

    <div id="session-messages" data-success="{{ session('success') }}" data-error="{{ session('error') }}">
    </div>

    <div class="relative overflow-x-auto sm:overflow-visible shadow-md sm:rounded-lg">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">NIS</th>
                    <th scope="col" class="px-6 py-3">Código</th>
                    <th scope="col" class="px-6 py-3">Denominación</th>
                    <th scope="col" class="px-6 py-3">Observacaiones</th>
                    <th scope="col" class="px-6 py-3">Acción</th>
                </tr>
                </thead>
                <tbody>

                @forelse ($programaformacion as $programa)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">
                            {{ $programa->NIS }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ $programa->Codigo }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ $programa->Denominacion }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">

                            @if ($programa->Observacaiones)
                                <span class="text-gray-900 font-medium">{{ $programa->Observacaiones }}</span>
                            @else
                                <span class="text-gray-400 italic">No tiene información</span>
                            @endif

                        </td>
                        <td class="px-10 py-3">
                            <div class="dropdown">

                                <button type="button" class="btn btn-link text-secondary p-0" data-toggle="dropdown"
                                        data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-right shadow-lg border-0 p-2">


                                    <a href="{{route('programas.show', $programa->NIS)}}"
                                       class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 rounded-md transition-colors duration-150">
                                        <i class="fa-solid fa-eye w-5"></i> Ver
                                    </a>

                                    <a href="{{route('Programas.edit', $programa->NIS)}}"
                                       class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-md transition-colors duration-150">
                                        <i class="fa-solid fa-pen-to-square w-5"></i> Editar
                                    </a>

                                    <div class="my-1 border-t border-gray-100"></div>

                                    <form action="{{ route('Programas.destroy', $programa->NIS) }}" method="POST"
                                          class="form-eliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 rounded-md w-full text-left transition-colors duration-150">
                                            <i class="fa-solid fa-trash w-5"></i> Eliminar
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </td>

                    </tr>

                @empty
                    <tr class="bg-white border-b">
                        <td colspan="7" class="px-6 py-10 text-center text-gray-500">
                            No hay registros disponibles.
                        </td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>
    </div>



@endsection

    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com">
    @endsection

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="{{ asset('js/alerts.js') }}"></script>
        <script src="{{ asset('js/deleteSweetAlert.js') }}"></script>

    @endsection



