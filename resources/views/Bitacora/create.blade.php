@extends('adminlte::page')

@section('title', 'Crear Bitácora')

@section('content_header')

    <div></div>
    <div class="flex flex-wrap items-center space-x-2 text-sm text-gray-500 font-medium">
        <a href="{{ route('home') }}" title="Dashboard" type="button" aria-label="Home">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M16 7.609c.352 0 .69.122.96.343l.111.1 6.25 6.25v.001a1.5 1.5 0 0 1 .445 1.071v7.5a.89.89 0 0 1-.891.891H9.125a.89.89 0 0 1-.89-.89v-7.5l.006-.149a1.5 1.5 0 0 1 .337-.813l.1-.11 6.25-6.25c.285-.285.67-.444 1.072-.444Zm5.984 7.876L16 9.5l-5.984 5.985v6.499h11.968z"
                    fill="#475569" stroke="#475569" stroke-width=".094" />
            </svg>
        </a>
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328"
                fill="#CBD5E1" />
        </svg>
        <a href="{{ route('Bitacoras.index') }}">Bitácora</a>
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328"
                fill="#CBD5E1" />
        </svg>
        <a class="text-indigo-500">Crear bitácora</a>

    </div>
@stop

@section('content')

    <div id="session-messages" data-success="{{ session('success') }}" data-error="{{ session('error') }}"></div>

    <form action="{{route('Bitacoras.store')}}" method="POST" id="main-form" style="display: none;" class="flex flex-col items-center text-sm text-slate-800 p-6 bg-white shadow-xl rounded-2xl border border-slate-100" enctype="multipart/form-data">
        @csrf


        <h1 class="text-4xl font-bold py-4 text-center">Cargar bitácora</h1>

        <input type="hidden" name="users_id" value="{{$user->id}}">
      <div class="max-w-md w-full p-6 bg-white rounded-lg border border-gray-500/30 shadow-[0px_1px_15px_0px] shadow-black/10 text-sm">
            <label for="fileInput" class="border-2 border-dotted border-gray-400 p-8 mt-2 flex flex-col items-center gap-4 cursor-pointer hover:border-blue-500 transition">
                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.085 2.583H7.75a2.583 2.583 0 0 0-2.583 2.584v20.666a2.583 2.583 0 0 0 2.583 2.584h15.5a2.583 2.583 0 0 0 2.584-2.584v-15.5m-7.75-7.75 7.75 7.75m-7.75-7.75v7.75h7.75M15.5 23.25V15.5m-3.875 3.875h7.75" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p class="text-gray-500">Arrasta tus archivos</p>
                <p class="text-gray-400">O <span class="text-blue-500 underline">click aquí</span> para seleccionar un archivo</p>
                <input id="fileInput" type="file" name="file" class="hidden" onchange="previewImage(event)" accept=".pdf">

                <div id="nombreArchivo" class="archivo-nombre">
                    Ningún archivo seleccionado
                </div>

            </label>

          @error('file')
          <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
          @enderror

            <div class="mt-6 flex justify-end gap-4">
                <button type="reset" class="px-9 py-2 border border-gray-500/50 bg-white hover:bg-blue-100/30 active:scale-95 transition-all text-gray-500 rounded">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2 bg-indigo-500 hover:bg-indigo-600 active:scale-95 transition-all text-white rounded">
                    Cargar archivo
                </button>
            </div>
        </div>
    </form>


@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/parpadeo.css') }}">
@stop

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/alerts.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        document.getElementById('main-form').style.display = 'flex';
    </script>


    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (!file) return;

            // Preview
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
            }
            reader.readAsDataURL(file);

            // Nombre del archivo
            document.getElementById('nombreArchivo').textContent = file.name;
        }
    </script>


@stop
