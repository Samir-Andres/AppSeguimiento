@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Datos Personales')

@section('content')


    <div class="min-h-screen bg-white">
    <div id="session-messages"
         data-success="{{ session('success') }}"
         data-error="{{ session('error') }}">
    </div>

    <div class="container-fluid px-4 py-6">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Banner -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-8 py-8 text-center">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-user text-white text-2xl"></i>
                </div>
                <p class="text-xs bg-white/20 text-white font-medium px-3 py-1 rounded-full inline-block mb-2">
                    Aprendiz
                </p>
                <h1 class="text-2xl font-bold text-white">{{ $aprendiz->Nombres }} {{ $aprendiz->Apellidos }}</h1>
                <p class="text-indigo-100 text-xs mt-1">NIS: {{ $aprendiz->NIS }}</p>
            </div>

            <!-- Card body -->
            <div class="px-20 py-8">

                <form action="{{ route('aprendiz.update', $aprendiz->NIS) }}" method="POST"
                      class="flex flex-col text-sm text-slate-800 w-full">

                    @csrf
                    @method('PUT')

                    <!-- Solo lectura -->
                    <p class="text-xs font-semibold text-indigo-500 uppercase tracking-wide mb-4">
                        Datos oficiales
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">


                    <div>
                            <label class="font-medium mb-1 block">Nombres</label>
                            <div class="flex items-center h-10 pl-3 border border-slate-200 bg-gray-50 rounded-full overflow-hidden">
                                <i class="fas fa-user text-slate-400 text-xs"></i>
                                <input type="text" value="{{ $aprendiz->Nombres }}"
                                       class="h-full px-2 w-full outline-none bg-transparent text-gray-400"
                                       disabled>
                            </div>
                        </div>

                        <div>
                            <label class="font-medium mb-1 block">Apellidos</label>
                            <div class="flex items-center h-10 pl-3 border border-slate-200 bg-gray-50 rounded-full overflow-hidden">
                                <i class="fas fa-user text-slate-400 text-xs"></i>
                                <input type="text" value="{{ $aprendiz->Apellidos }}"
                                       class="h-full px-2 w-full outline-none bg-transparent text-gray-400"
                                       disabled>
                            </div>
                        </div>

                        <div>
                            <label class="font-medium mb-1 block">Documento</label>
                            <div class="flex items-center h-10 pl-3 border border-slate-200 bg-gray-50 rounded-full overflow-hidden">
                                <i class="fas fa-id-card text-slate-400 text-xs"></i>
                                <input type="text" value="{{ $aprendiz->Numdoc }}"
                                       class="h-full px-2 w-full outline-none bg-transparent text-gray-400"
                                       disabled>
                            </div>
                        </div>

                        <div>
                            <label class="font-medium mb-1 block">Fecha Nacimiento</label>
                            <div class="flex items-center h-10 pl-3 border border-slate-200 bg-gray-50 rounded-full overflow-hidden">
                                <i class="fas fa-calendar text-slate-400 text-xs"></i>
                                <input type="text" value="{{ \Carbon\Carbon::parse($aprendiz->FechaNac)->format('d/m/Y') }}"
                                       class="h-full px-2 w-full outline-none bg-transparent text-gray-400"
                                       disabled>
                            </div>
                        </div>

                        <div>
                            <label class="font-medium mb-1 block">Sexo</label>
                            <div class="flex items-center h-10 pl-3 border border-slate-200 bg-gray-50 rounded-full overflow-hidden">
                                <i class="fas fa-venus-mars text-slate-400 text-xs"></i>
                                <input type="text" value="{{ $aprendiz->Sexo == 0 ? 'Masculino' : 'Femenino' }}"
                                       class="h-full px-2 w-full outline-none bg-transparent text-gray-400"
                                       disabled>
                            </div>
                        </div>

                        <div>
                            <label class="font-medium mb-1 block">Correo Institucional</label>
                            <div class="flex items-center h-10 pl-3 border border-slate-200 bg-gray-50 rounded-full overflow-hidden">
                                <i class="fas fa-envelope text-slate-400 text-xs"></i>
                                <input type="text" value="{{ $aprendiz->Correo_Institucional }}"
                                       class="h-full px-2 w-full outline-none bg-transparent text-gray-400"
                                       disabled>
                            </div>
                        </div>

                    </div>

                    <!-- Divisor -->
                    <div class="h-px bg-gray-200 my-4"></div>

                    <!-- Editables -->
                    <p class="text-xs font-semibold text-indigo-500 uppercase tracking-wide mb-4">
                        Datos editables
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">

                        <div>
                            <label class="font-medium mb-1 block">Dirección</label>
                            <div class="flex items-center h-10 pl-3 border border-slate-300 rounded-full focus-within:ring-2 focus-within:ring-indigo-400 transition-all overflow-hidden @error('Direccion') border-red-400 @enderror">
                                <i class="fas fa-map-marker-alt text-slate-400 text-xs"></i>
                                <input type="text"
                                       name="Direccion"
                                       value="{{ old('Direccion', $aprendiz->Direccion) }}"
                                       class="h-full px-2 w-full outline-none bg-transparent"
                                       placeholder="Tu dirección">
                            </div>
                            @error('Direccion')
                            <p class="text-red-500 text-xs mt-1 flex items-center gap-1 pl-2">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label class="font-medium mb-1 block">Teléfono</label>
                            <div class="flex items-center h-10 pl-3 border border-slate-300 rounded-full focus-within:ring-2 focus-within:ring-indigo-400 transition-all overflow-hidden @error('Telefono') border-red-400 @enderror">
                                <i class="fas fa-phone text-slate-400 text-xs"></i>
                                <input type="text"
                                       name="Telefono"
                                       value="{{ old('Telefono', $aprendiz->Telefono) }}"
                                       class="h-full px-2 w-full outline-none bg-transparent"
                                       placeholder="Tu teléfono">
                            </div>
                            @error('Telefono')
                            <p class="text-red-500 text-xs mt-1 flex items-center gap-1 pl-2">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label class="font-medium mb-1 block">Correo Personal</label>
                            <div class="flex items-center h-10 pl-3 border border-slate-300 rounded-full focus-within:ring-2 focus-within:ring-indigo-400 transition-all overflow-hidden @error('Correo_Personal') border-red-400 @enderror">
                                <i class="fas fa-envelope text-slate-400 text-xs"></i>
                                <input type="email"
                                       name="Correo_Personal"
                                       value="{{ old('Correo_Personal', $aprendiz->Correo_Personal) }}"
                                       class="h-full px-2 w-full outline-none bg-transparent"
                                       placeholder="Tu correo personal">
                            </div>
                            @error('Correo_Personal')
                            <p class="text-red-500 text-xs mt-1 flex items-center gap-1 pl-2">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                            @enderror
                        </div>

                    </div>

                    <!-- Info -->
                    <div class="bg-indigo-50 border border-indigo-100 rounded-lg px-4 py-3 text-xs text-indigo-600 flex items-start gap-2 mb-6">
                        <i class="fas fa-info-circle mt-0.5"></i>
                        <span>Solo puedes editar tu dirección, teléfono y correo personal. Los demás datos son oficiales.</span>
                    </div>

                    <!-- Botones -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                        <a href="{{ route('perfil.userLogueado') }}"
                           class="flex items-center justify-center w-full border border-slate-300 text-slate-600 py-2.5 rounded-full hover:bg-gray-100 transition text-sm font-medium">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="flex items-center justify-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white py-2.5 w-full rounded-full transition font-medium">
                            Guardar cambios
                            <svg width="18" height="18" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="m18.038 10.663-5.625 5.625a.94.94 0 0 1-1.328-1.328l4.024-4.023H3.625a.938.938 0 0 1 0-1.875h11.484l-4.022-4.025a.94.94 0 0 1 1.328-1.328l5.625 5.625a.935.935 0 0 1-.002 1.33" fill="#fff"/>
                            </svg>
                        </button>
                    </div>

                </form>

            </div>

            <!-- Footer -->
            <div class="bg-gray-50 border-t border-gray-100 px-8 py-4 text-center">
                <p class="text-xs text-gray-400">
                    ¿Quieres actualizar tus datos de acceso?
                    <a href="{{ route('perfil.edit', $aprendiz->users_id) }}" class="text-indigo-500 hover:underline font-medium">
                        Clic aquí
                    </a>
                </p>
            </div>

        </div>

    </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .content-wrapper {
            background-color: #ffffff !important;
        }
    </style>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
@endsection
