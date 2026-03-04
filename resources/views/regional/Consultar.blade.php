@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Consultar Regional')


@section('content_header')

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
        <a href="{{ route('regional.index') }}">Regionales</a>

        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328"
                fill="#CBD5E1" />
        </svg>
        <a class="text-indigo-500">Consultar</a>

    </div>

@endsection

@section('content')


    <h1 class="mt-1 text-gray-500 text-sm text-center mb-3">
        Puedes consultar las <span class="font-semibold text-gray-700">regionales</span> mediante su <span
            class="text-blue-600">código</span> o <span class="text-blue-600">nombre</span> oficial.
    </h1>

    <div class="flex items-center justify-center w-full px-4">

        <div
            class="flex items-center border border-gray-500/30 h-[46px] rounded-full overflow-hidden w-full max-w-4xl px-4 transition-all focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500">

            <input type="text" placeholder="Buscar" id="search" name="search" class="h-full w-full outline-none bg-transparent">

            <svg xmlns="http://www.w3.org/1999/xhtml" width="22" height="22" viewBox="0 0 30 30" fill="#6B7280"
                class="flex-shrink-0">
                <path
                    d="M13 3C7.489 3 3 7.489 3 13s4.489 10 10 10a9.95 9.95 0 0 0 6.322-2.264l5.971 5.971a1 1 0 1 0 1.414-1.414l-5.97-5.97A9.95 9.95 0 0 0 23 13c0-5.511-4.489-10-10-10m0 2c4.43 0 8 3.57 8 8s-3.57 8-8 8-8-3.57-8-8 3.57-8 8-8" />
            </svg>
        </div>

    </div>


    <div class="relative overflow-x-auto sm:overflow-visible shadow-md sm:rounded-lg mt-5">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500" id="auxiliares">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">NIS</th>
                    <th scope="col" class="px-6 py-3">Código</th>
                    <th scope="col" class="px-6 py-3">Denominación</th>
                    <th scope="col" class="px-6 py-3">Observaciones</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/parpadeo.css') }}">

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script type="text/javascript">

        /* global $ */

        $('#search').on('keyup', function (){
            var valor = $(this).val();

            $.ajax({
                type: 'GET',
                url: '{{url("/buscar")}}',
                data: { buscar: valor},
                success: function (data){
                $('tbody').html(data);

            }
        })
        })

    </script>

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

    </script>

@endsection
