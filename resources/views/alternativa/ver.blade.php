@extends('adminlte::page')

@section('title', 'Detalle de Alternativa')




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
        <a href="{{ route('Alternativa.Index') }}">Alternativa</a>
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328"
                fill="#CBD5E1" />
        </svg>
        <a class="text-indigo-500">Detalle de alternativa</a>

    </div>

@endsection

@section('content')
    <div class="flex flex-col items-center pt-10 px-4">

        <div class="text-center mb-8">
            <h1 class="text-2xl font-light text-gray-700 uppercase tracking-wide">Información del Registro</h1>
            <div class="h-1 w-12 bg-blue-500 mx-auto mt-2"></div>
        </div>


        <div class="w-full max-w-md bg-white border border-gray-200 rounded-lg shadow-sm">


            <div class="p-8">
                <div class="mb-6">
                    <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Nombre</label>
                    <p class="text-lg text-gray-800 font-medium">{{ $alternativa->nombre }}</p>
                </div>

                <div class="mb-6">
                    <label
                        class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Descripción</label>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $alternativa->descripcion ?? 'No se proporcionó una descripción para este registro.' }}
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-100">
                    <div>
                        <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">ID
                            Registro</label>
                        <p class="text-sm font-mono text-gray-500">{{ $alternativa->id }}</p>
                    </div>
                    <div>
                        <label
                            class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Estado</label>
                        <span class="inline-flex items-center text-sm font-medium text-gray-700">
                            <span
                                class="w-2 h-2 rounded-full mr-2 {{ $alternativa->estado == 'Activo' ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                            {{ $alternativa->estado }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Footer discreto -->
            <div class="bg-gray-50 px-8 py-4 rounded-b-lg border-t border-gray-100 flex justify-between items-center">
                <span class="text-xs text-gray-500">Etapa Productiva: <strong>Contrato de Aprendizaje</strong></span>
                <a href="{{ url()->previous() }}" class="text-xs font-semibold text-blue-600 hover:underline">
                    Regresar
                </a>
            </div>
        </div>
    </div>

@endsection

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com">
@endsection

@section('js')
    <script src="https://cdn.tailwindcss.com"></script>

@endsection

