@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Perfil')

@section('content_header')
    <div></div>
@stop


@section('content')

    @php
        $user = Auth::user();
    @endphp


    <div class="flex items-center justify-center p-2 pt-4">

        <div class="max-w-md w-full border border-gray-200 rounded-lg shadow-sm overflow-hidden">

            <div class="bg-gray-50 border-b border-gray-200 p-6 flex flex-col items-center">

                <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center uppercase text-gray-500 text-3xl font-light border border-gray-300">

                    @if($aprendiz)
                        {{ substr($aprendiz->Nombres,0,1) }}{{ substr($aprendiz->Apellidos,0,1) }}
                    @elseif($instructor)
                        {{ substr($instructor->Nombres,0,1) }}{{ substr($instructor->Apellidos,0,1) }}
                    @else
                        {{ substr($user->name,0,1) }}
                    @endif

                </div>


                <h1 class="mt-4 text-lg font-semibold text-gray-800">

                    @if($aprendiz)
                        {{ $aprendiz->Nombres }} {{ $aprendiz->Apellidos }}
                    @elseif($instructor)
                        {{ $instructor->Nombres }} {{ $instructor->Apellidos }}
                    @else
                        {{ $user->name }}
                    @endif

                </h1>

                <p class="text-sm text-gray-500">{{ $user->email }}</p>


                <span class="mt-2 text-xs px-3 py-1 rounded-full
                    @if($aprendiz) bg-blue-100 text-blue-600
                        @elseif($instructor) bg-green-100 text-green-600
                         @elseif($rolAdministrativo) bg-purple-100 text-purple-600

                  @else bg-gray-100 text-gray-600
                         @endif">
                    @if($aprendiz)
                        Aprendiz
                    @elseif($instructor)
                        Instructor
                    @elseif($rolAdministrativo)
                        {{ ucfirst(str_replace('_', ' ', $rolAdministrativo->nombre)) }}
                    @else
                        Usuario
                    @endif
                    </span>
            </div>


            <!-- INFORMACION CUENTA -->
            <div class="p-6 space-y-4">

                <div class="flex justify-between text-sm">
                    <span class="text-gray-400">ID Usuario</span>
                    <span class="font-medium">{{ $user->id }}</span>
                </div>

                <div class="flex justify-between text-sm">
                    <span class="text-gray-400">Registro</span>
                    <span class="font-medium">{{ $user->created_at->format('d/m/Y') }}</span>
                </div>

                <div class="flex justify-between text-sm">
                    <span class="text-gray-400">Actualizado</span>
                    <span class="font-medium">{{ $user->updated_at->format('H:i') }}</span>
                </div>

                <div class="flex justify-between text-sm">

                    <span class="text-gray-400">Estado</span>

                    @if($user->email_verified_at)
                        <span class="text-green-600">Verificada</span>
                    @else
                        <span class="text-yellow-600">Pendiente</span>
                    @endif

                </div>

            </div>


            <div class="bg-gray-50 px-6 py-4 flex gap-3">

                <a href="{{ route('perfil.edit', $usuario->id) }}"
                   class="flex-1 text-center bg-white border border-gray-300 py-2 rounded text-sm font-medium text-gray-700 hover:bg-gray-100">
                    Gestionar
                </a>



                @can('es-aprendiz')
                    <a href="{{route('aprendiz.datos')}}"
                       class="flex-1 text-center bg-indigo-500 hover:bg-indigo-600 transition text-white py-2 rounded text-sm font-medium">
                        Ver datos personales
                    </a>
                @endcan

                @can('es-Instructor')
                    <a href="{{route('instructor.datos')}}"
                       class="flex-1 text-center bg-indigo-500 hover:bg-indigo-600 transition text-white py-2 rounded text-sm font-medium">
                        Ver datos personales
                    </a>
                @endcan


            </div>

        </div>

    </div>

@endsection



@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

@endsection



@section('js')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>

@endsection
