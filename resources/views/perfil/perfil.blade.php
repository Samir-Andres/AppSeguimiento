@extends('adminlte::page')

@section('title', 'Perfil')


@section('content_header')

<div></div>


@stop


@section('content')


    @php
        $user = Auth::user();
    @endphp


    <div id="session-messages" data-success="{{ session('success') }}" data-error="{{ session('error') }}"></div>


    <div class="flex items-center justify-center p-2 pt-4" >

    <div class="max-w-md w-full border border-gray-200 rounded-lg shadow-sm overflow-hidden">


        <div class="bg-gray-50 border-b border-gray-200 p-6 flex flex-col items-center">
            <!-- Avatar Simple -->
            <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center uppercase text-gray-500 text-3xl font-light border border-gray-300">
                {{ substr($user->name, 0, 1) }}
            </div>
            <h2 class="mt-4 text-xl font-semibold text-gray-800">{{ $user->name }}</h2>
            <p class="text-sm text-gray-500">{{ $user->email }}</p>
        </div>

        <!-- Información Detallada -->
        <div class="p-6 space-y-4">
            <!-- Fila de Información -->
            <div class="flex justify-between items-center text-sm">
                <span class="text-gray-400">Identificador</span>
                <span class="font-medium text-gray-700">{{ $user->id }}</span>
            </div>

            <div class="flex justify-between items-center text-sm">
                <span class="text-gray-400">Fecha de registro</span>
                <span class="font-medium text-gray-700">{{ $user->created_at->translatedFormat('d \d\e F \d\e Y') }}</span>
            </div>

            <div class="flex justify-between items-center text-sm">
                <span class="text-gray-400">Estado de cuenta</span>
                @if($user->email_verified_at)
                    <span class="text-green-600 flex items-center">
                        <span class="w-1.5 h-1.5 bg-green-600 rounded-full mr-1.5"></span>
                        Verificada
                    </span>
                @else
                    <span class="text-amber-600 flex items-center">
                        <span class="w-1.5 h-1.5 bg-amber-600 rounded-full mr-1.5"></span>
                        Pendiente
                    </span>
                @endif
            </div>
        </div>

        <!-- Acciones Inferiores -->
        <div class="bg-gray-50 px-6 py-4 flex gap-3">
            <a href=""
               class="flex-1 text-center bg-white border border-gray-300 py-2 rounded text-sm font-medium text-gray-700 hover:bg-gray-100 transition-colors">
                Gestionar
            </a>
            <button class="flex-1 bg-gray-800 py-2 rounded text-sm font-medium text-white hover:bg-gray-900 transition-colors">
                Reporte
            </button>
        </div>
    </div>
</div>



    <form action="{{ route('ActualizarDatos.Perfil', $usuario->id) }}" class="bg-white p-3 mt-4" method="POST">
        @csrf

        <div class="w-full px-4 mb-8">
            <!-- Título Principal con estilo moderno -->
            <h1 class="text-center text-2xl md:text-3xl font-bold text-slate-800 tracking-tight">
                Actualizar Perfil
            </h1>
            <!-- Línea decorativa sutil bajo el título -->
            <div class="mt-2 mx-auto w-16 h-1 bg-indigo-500 rounded-full"></div>
            <p class="text-center text-slate-500 text-sm mt-2">Gestiona la información de tu cuenta</p>
        </div>

        <div class="flex flex-wrap lg:flex-nowrap gap-6 justify-center items-start w-full px-4 mb-3">

        </div>


        <div class="flex flex-wrap lg:flex-nowrap gap-4 justify-center items-start w-full px-4">


            <div class="max-w-96 w-full">
                <label for="name" class="font-medium">Nombre de la Alternativa</label>
                <div class="flex items-center mt-2 mb-1 h-10 pl-3 border {{ $errors->has('name') ? 'border-red-500' : 'border-slate-300' }} rounded-full focus-within:ring-2 focus-within:ring-indigo-400 transition-all overflow-hidden">
                    <input type="text" name="name" class="h-full px-2 w-full outline-none bg-transparent" value="{{ $usuario->name }}">
                </div>
                @error('name')
                <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                @enderror
            </div>


            <div class="max-w-96 w-full">
                <label for="email" class="font-medium block">Correo</label>
                <textarea name="email" rows="1"
                          class="w-full mt-2 p-2 bg-transparent border {{ $errors->has('email') ? 'border-red-500' : 'border-slate-300' }} rounded-full resize-none outline-none focus:ring-2 focus:ring-indigo-400 transition-all"
                          style="min-height: 40px;"
                          placeholder="Detalles...">{{ old('email', $usuario->email) }}</textarea>
                @error('email')
                <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Botón centrado debajo -->
        <div class="col-12 text-center mt-6">
            <button type="submit" class="btn btn-primary" style="border-radius: 20px">Actualizar Perfil</button>
        </div>
    </form>




@endsection

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/parpadeo.css') }}">

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
@endsection

