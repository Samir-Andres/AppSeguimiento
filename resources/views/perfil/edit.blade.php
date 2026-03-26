@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Gestionar perfil')

@section('content')



    <div id="session-messages"
         data-success="{{ session('success') }}"
         data-error="{{ session('error') }}">
    </div>


    <div class="flex items-center justify-center px-2 py-10">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg overflow-hidden">


            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-8 py-8 text-center">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-user-edit text-white text-2xl"></i>
                </div>
                <p class="text-xs bg-white/20 text-white font-medium px-3 py-1 rounded-full inline-block mb-2">
                    Datos de Acceso
                </p>
                <h1 class="text-2xl font-bold text-white">Actualizar Perfil</h1>
                <p class="text-indigo-100 text-xs mt-1">
                    Modifica tus credenciales de acceso al sistema
                </p>
            </div>

            <div class="px-8 py-8">


                <form action="{{ route('perfil.update', $usuario->id) }}" method="POST"
                      class="flex flex-col text-sm text-slate-800 w-full">

                    @csrf
                    @method('PUT')

                    <!-- Nombre -->
                    <label class="font-medium mb-1">Nombre de usuario</label>
                    <div class="flex items-center h-10 pl-3 border border-slate-300 rounded-full focus-within:ring-2 focus-within:ring-indigo-400 transition-all overflow-hidden @error('name') border-red-400 @enderror">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.311 16.406a9.64 9.64 0 0 0-4.748-4.158 5.938 5.938 0 1 0-7.125 0 9.64 9.64 0 0 0-4.749 4.158.937.937 0 1 0 1.623.938c1.416-2.447 3.916-3.906 6.688-3.906 2.773 0 5.273 1.46 6.689 3.906a.938.938 0 0 0 1.622-.938M5.938 7.5a4.063 4.063 0 1 1 8.125 0 4.063 4.063 0 0 1-8.125 0" fill="#475569"/>
                        </svg>
                        <input type="text"
                               name="name"
                               value="{{ old('name', $usuario->name) }}"
                               class="h-full px-2 w-full outline-none bg-transparent"
                               placeholder="Tu nombre completo">
                    </div>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1 mb-3 flex items-center gap-1 pl-2">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </p>
                    @else
                        <div class="mb-4"></div>
                        @enderror

                        <!-- Correo -->
                        <label class="font-medium mb-1">Correo electrónico</label>
                        <div class="flex items-center h-10 pl-3 border border-slate-300 rounded-full focus-within:ring-2 focus-within:ring-indigo-400 transition-all overflow-hidden @error('email') border-red-400 @enderror">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 3.438h-15a.937.937 0 0 0-.937.937V15a1.563 1.563 0 0 0 1.562 1.563h13.75A1.563 1.563 0 0 0 18.438 15V4.375a.94.94 0 0 0-.938-.937m-2.41 1.874L10 9.979 4.91 5.313zM3.438 14.688v-8.18l5.928 5.434a.937.937 0 0 0 1.268 0l5.929-5.435v8.182z" fill="#475569"/>
                            </svg>
                            <input type="email"
                                   name="email"
                                   value="{{ old('email', $usuario->email) }}"
                                   class="h-full px-2 w-full outline-none bg-transparent"
                                   placeholder="correo@ejemplo.com">
                        </div>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1 mb-3 flex items-center gap-1 pl-2">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </p>
                        @else
                            <div class="mb-4"></div>
                            @enderror

                            <!-- Info -->
                            <div class="bg-indigo-50 border border-indigo-100 rounded-lg px-4 py-3 text-xs text-indigo-600 flex items-start gap-2 mb-6">
                                <i class="fas fa-info-circle mt-0.5"></i>
                                <span>Si cambias tu correo, deberás usarlo para iniciar sesión la próxima vez.</span>
                            </div>

                            <!-- Botones -->
                            <div class="flex gap-3">
                                <a href="{{ route('perfil.userLogueado') }}"
                                   class="flex items-center justify-center w-1/3 border border-slate-300 text-slate-600 py-2.5 rounded-full hover:bg-gray-100 transition text-sm font-medium">
                                    Cancelar
                                </a>
                                <button type="submit"
                                        class="flex items-center justify-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white py-2.5 w-2/3 rounded-full transition font-medium">
                                    Guardar
                                    <svg width="18" height="18" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m18.038 10.663-5.625 5.625a.94.94 0 0 1-1.328-1.328l4.024-4.023H3.625a.938.938 0 0 1 0-1.875h11.484l-4.022-4.025a.94.94 0 0 1 1.328-1.328l5.625 5.625a.935.935 0 0 1-.002 1.33" fill="#fff"/>
                                    </svg>
                                </button>
                            </div>

                </form>

            </div>

            <!-- Footer tarjeta -->
            <div class="bg-gray-50 border-t border-gray-100 px-8 py-4 text-center">
                <p class="text-xs text-gray-400">
                    ¿Solo quieres cambiar tu contraseña?
                    <a href="{{route('perfil.password.edit')}}" class="text-indigo-500 hover:underline font-medium">
                        Clic aquí
                    </a>
                </p>
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
    <script src="{{ asset('js/alerts.js') }}"></script>
@endsection
