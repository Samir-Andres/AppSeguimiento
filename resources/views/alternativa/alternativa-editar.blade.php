@extends('adminlte::page')

@section('title', 'Editar Alternativa')

@section('content_header')

    <div></div>
    <div class="flex flex-wrap items-center space-x-2 text-sm text-gray-500 font-medium">
        <a href="{{route('home')}}" title="Dashboard" type="button" aria-label="Home">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M16 7.609c.352 0 .69.122.96.343l.111.1 6.25 6.25v.001a1.5 1.5 0 0 1 .445 1.071v7.5a.89.89 0 0 1-.891.891H9.125a.89.89 0 0 1-.89-.89v-7.5l.006-.149a1.5 1.5 0 0 1 .337-.813l.1-.11 6.25-6.25c.285-.285.67-.444 1.072-.444Zm5.984 7.876L16 9.5l-5.984 5.985v6.499h11.968z"
                    fill="#475569" stroke="#475569" stroke-width=".094" />
            </svg>
        </a>
         <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328" fill="#CBD5E1"/>
    </svg>
         <a href="{{route('Alternativa.Index')}}" >Etapa Productiva</a>
         <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328" fill="#CBD5E1"/>
    </svg>
        <a  class="text-indigo-500">Editar Etapa</a>

    </div>
@stop

@section('content')

    <div id="session-messages" data-success="{{ session('success') }}" data-error="{{ session('error') }}"></div>


    <form action="{{ route('alternativa.actualizar', $alternativa->id) }}" method="POST" id="main-form"
        style="display: none;"
        class="flex flex-col items-center text-sm text-slate-800 p-6 bg-white shadow-xl rounded-2xl border border-slate-100">
        @csrf
        @method('PUT')

        <h1 class="text-4xl font-bold py-4 text-center">Editar Alternativa</h1>

        <div class="max-w-96 w-full px-4">
            <!-- Campo Nombre -->
            <label for="nombre" class="font-medium">Nombre de la Alternativa</label>
            <div
                class="flex items-center mt-2 mb-1 h-10 pl-3 border {{ $errors->has('nombre') ? 'border-red-500' : 'border-slate-300' }} rounded-full focus-within:ring-2 focus-within:ring-indigo-400 transition-all overflow-hidden">
                {{-- <i class="fa-solid fa-tag text-slate-500"></i> --}}
                <input type="text" name="nombre" value="{{ old('nombre', $alternativa->nombre) }}"
                    class="h-full px-2 w-full outline-none bg-transparent" placeholder="Eje: Proyecto productivo">
            </div>
            @error('nombre')
                <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
            @enderror

            <!-- Campo Estado -->
            <label for="estado" class="font-medium mt-4 block">Estado del Registro</label>
            <div
                class="flex items-center mt-2 mb-1 h-10 pl-3 border border-slate-300 rounded-full focus-within:ring-2 focus-within:ring-indigo-400 transition-all overflow-hidden">
                <select name="estado" class="h-full px-2 w-full outline-none bg-transparent appearance-none">
                    <option value="">Seleccionar estado</option>
                    <option value="1" {{ $alternativa->estado == 1 ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ $alternativa->estado == 0 ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
            @error('estado')
                <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
            @enderror

            <!-- Campo Descripción -->
            <label for="descripcion" class="font-medium mt-4 block">Descripción</label>
            <textarea name="descripcion" rows="4"
                class="w-full mt-2 p-3 bg-transparent border {{ $errors->has('descripcion') ? 'border-red-500' : 'border-slate-300' }} rounded-xl resize-none outline-none focus:ring-2 focus:ring-indigo-400 transition-all"
                placeholder="Detalles de la alternativa">{{ old('descripcion', $alternativa->descripcion) }}</textarea>

            <!-- Botón Submit -->
            <button type="submit"
                class="flex items-center justify-center gap-2 mt-6 bg-indigo-500 hover:bg-indigo-600 text-white py-2.5 w-full rounded-full transition shadow-lg shadow-indigo-200">
                Actualizar Registro
                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m18.038 10.663-5.625 5.625a.94.94 0 0 1-1.328-1.328l4.024-4.023H3.625a.938.938 0 0 1 0-1.875h11.484l-4.022-4.025a.94.94 0 0 1 1.328-1.328l5.625 5.625a.935.935 0 0 1-.002 1.33"
                        fill="#fff" />
                </svg>
            </button>

            <a href="{{ route('Alternativa.Index') }}"
                class="block text-center text-gray-400 mt-4 hover:text-gray-600 transition-colors">
                Cancelar y volver
            </a>
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


@stop
