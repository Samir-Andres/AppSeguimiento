@extends('adminlte::page')

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


                <h2 class="mt-4 text-xl font-semibold text-gray-800">

                    @if($aprendiz)
                        {{ $aprendiz->Nombres }} {{ $aprendiz->Apellidos }}
                    @elseif($instructor)
                        {{ $instructor->Nombres }} {{ $instructor->Apellidos }}
                    @else
                        {{ $user->name }}
                    @endif

                </h2>

                <p class="text-sm text-gray-500">{{ $user->email }}</p>


                <span class="mt-2 text-xs bg-blue-100 text-blue-600 px-3 py-1 rounded-full">

                @if($aprendiz)
                        Aprendiz
                    @elseif($instructor)
                        Instructor
                    @elseif($rolAdministrativo)
                        Administrativo
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


            <!-- BOTONES -->
            <div class="bg-gray-50 px-6 py-4 flex gap-3">

                <a href=""
                   class="flex-1 text-center bg-white border border-gray-300 py-2 rounded text-sm font-medium text-gray-700 hover:bg-gray-100">

                    Gestionar

                </a>

            </div>

        </div>

    </div>



    <!-- FORM ACTUALIZAR PERFIL -->

    <div class="flex justify-center mt-10">

        <form action="{{ route('ActualizarDatos.Perfil',$user->id) }}" class="bg-white p-6 rounded-lg shadow-md w-full max-w-2xl" method="POST">

            @csrf
            @method('PUT')

            <h2 class="text-center text-2xl font-bold mb-6">Actualizar Perfil</h2>

            <div class="grid md:grid-cols-2 gap-4">

                <div>

                    <label class="text-sm font-medium">Nombre</label>

                    <input type="text"
                           name="name"
                           value="{{ old('name',$user->name) }}"
                           class="w-full mt-1 p-2 border rounded-lg">

                    @error('name')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror

                </div>


                <div>

                    <label class="text-sm font-medium">Correo</label>

                    <input type="email"
                           name="email"
                           value="{{ old('email',$user->email) }}"
                           class="w-full mt-1 p-2 border rounded-lg">

                    @error('email')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror

                </div>

            </div>

            <div class="text-center mt-6">

                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Actualizar Perfil
                </button>

            </div>

        </form>

    </div>



    {{-- ========================= --}}
    {{-- TARJETA DATOS APRENDIZ --}}
    {{-- ========================= --}}

    @if($aprendiz)

        <div class="max-w-4xl mx-auto my-10 bg-white shadow-xl rounded-2xl overflow-hidden border">

            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-8 py-10 text-white text-center">

                <h1 class="text-3xl font-bold">
                    {{ $aprendiz->Nombres }} {{ $aprendiz->Apellidos }}
                </h1>

                <p class="text-blue-100 mt-1">
                    NIS: {{ $aprendiz->NIS }}
                </p>

            </div>


            <div class="p-8 grid md:grid-cols-2 gap-8">

                <div>

                    <h3 class="font-bold text-indigo-600 mb-3">Datos Personales</h3>

                    <p><b>Documento:</b> {{ $aprendiz->Numdoc }}</p>

                    <p><b>Fecha Nacimiento:</b>
                        {{ \Carbon\Carbon::parse($aprendiz->FechaNac)->format('d/m/Y') }}
                    </p>

                    <p><b>Sexo:</b>
                        {{ $aprendiz->Sexo == 1 ? 'Masculino' : 'Femenino' }}
                    </p>

                </div>


                <div>

                    <h3 class="font-bold text-indigo-600 mb-3">Contacto</h3>

                    <p><b>Teléfono:</b> {{ $aprendiz->Telefono }}</p>

                    <p><b>Dirección:</b> {{ $aprendiz->Direccion }}</p>

                    <p><b>Correo Institucional:</b>
                        {{ $aprendiz->Correo_Institucional }}
                    </p>

                    <p><b>Correo Personal:</b>
                        {{ $aprendiz->Correo_Personal }}
                    </p>

                </div>

            </div>

        </div>

    @endif



    {{-- ========================= --}}
    {{-- TARJETA DATOS INSTRUCTOR --}}
    {{-- ========================= --}}

    @if($instructor)

        <div class="max-w-4xl mx-auto my-10 bg-white shadow-xl rounded-2xl overflow-hidden border">

            <div class="bg-gradient-to-r from-green-600 to-emerald-700 px-8 py-10 text-white text-center">

                <h1 class="text-3xl font-bold">
                    {{ $instructor->Nombres }} {{ $instructor->Apellidos }}
                </h1>

                <p class="opacity-80">
                    Instructor
                </p>

            </div>


            <div class="p-8 grid md:grid-cols-2 gap-8">

                <div>

                    <p><b>Documento:</b> {{ $instructor->Numdoc }}</p>

                    <p><b>Teléfono:</b> {{ $instructor->Telefono }}</p>

                </div>


                <div>

                    <p><b>Correo:</b> {{ $instructor->Correo }}</p>

                    <p><b>Especialidad:</b> {{ $instructor->Especialidad ?? 'No registrada' }}</p>

                </div>

            </div>

        </div>

    @endif


@endsection



@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

@endsection



@section('js')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>

@endsection
