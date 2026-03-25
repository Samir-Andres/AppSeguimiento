@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Cambiar contraseña')

@section('content')

    <div id="session-messages"
         data-success="{{ session('success') }}"
         data-error="{{ session('error') }}">
    </div>

    <div class="flex items-center justify-center px-2 py-4">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg overflow-hidden">

            <!-- Banner -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-8 py-8 text-center">
              <!--  <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-key text-white text-2xl"></i>
                </div> -->
                <p class="text-xs bg-white/20 text-white font-medium px-3 py-1 rounded-full inline-block mb-2">
                    Seguridad
                </p>
                <h1 class="text-2xl font-bold text-white">Cambiar Contraseña</h1>
                <p class="text-indigo-100 text-xs mt-1">
                    Actualiza tu contraseña de acceso al sistema
                </p>
            </div>

            <!-- Card body -->
            <div class="px-8 py-8">

                <form action="{{ route('password.updatePassword', $usuario->id) }}" method="POST"
                      class="flex flex-col text-sm text-slate-800 w-full">

                    @csrf
                    @method('PUT')

                    <!-- Contraseña actual -->
                    <label class="font-medium mb-1">Contraseña actual</label>
                    <div class="flex items-center h-10 pl-3 border border-slate-300 rounded-full focus-within:ring-2 focus-within:ring-indigo-400 transition-all overflow-hidden @error('current_password') border-red-400 @enderror">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.833 8.333h-.416V5.833a5.417 5.417 0 1 0-10.834 0v2.5h-.416A1.667 1.667 0 0 0 2.5 10v6.667a1.667 1.667 0 0 0 1.667 1.666h11.666a1.667 1.667 0 0 0 1.667-1.666V10a1.667 1.667 0 0 0-1.667-1.667M7.5 5.833a2.5 2.5 0 0 1 5 0v2.5h-5z" fill="#475569"/>
                        </svg>
                        <input type="password"
                               name="current_password"
                               class="h-full px-2 w-full outline-none bg-transparent"
                               placeholder="Ingresa tu contraseña actual">
                    </div>
                    @error('current_password')
                    <p class="text-red-500 text-xs mt-1 mb-3 flex items-center gap-1 pl-2">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </p>
                    @else
                        <div class="mb-4"></div>
                    @enderror

                        <!-- Nueva contraseña -->
                        <label class="font-medium mb-1">Nueva contraseña</label>
                        <div class="flex items-center h-10 pl-3 border border-slate-300 rounded-full focus-within:ring-2 focus-within:ring-indigo-400 transition-all overflow-hidden @error('password') border-red-400 @enderror">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.833 8.333h-.416V5.833a5.417 5.417 0 1 0-10.834 0v2.5h-.416A1.667 1.667 0 0 0 2.5 10v6.667a1.667 1.667 0 0 0 1.667 1.666h11.666a1.667 1.667 0 0 0 1.667-1.666V10a1.667 1.667 0 0 0-1.667-1.667M7.5 5.833a2.5 2.5 0 0 1 5 0v2.5h-5z" fill="#475569"/>
                            </svg>
                            <input type="password"
                                   name="password"
                                   class="h-full px-2 w-full outline-none bg-transparent"
                                   placeholder="Mínimo 8 caracteres">
                        </div>
                        @error('password')
                        <p class="text-red-500 text-xs mt-1 mb-3 flex items-center gap-1 pl-2">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </p>
                        @else
                            <div class="mb-4"></div>
                        @enderror

                            <!-- Confirmar contraseña -->
                            <label class="mb-1">Confirmar nueva contraseña</label>
                            <div class="flex items-center h-10 pl-3 border border-slate-300 rounded-full focus-within:ring-2 focus-within:ring-indigo-400 transition-all overflow-hidden">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.833 8.333h-.416V5.833a5.417 5.417 0 1 0-10.834 0v2.5h-.416A1.667 1.667 0 0 0 2.5 10v6.667a1.667 1.667 0 0 0 1.667 1.666h11.666a1.667 1.667 0 0 0 1.667-1.666V10a1.667 1.667 0 0 0-1.667-1.667M7.5 5.833a2.5 2.5 0 0 1 5 0v2.5h-5z" fill="#475569"/>
                                </svg>
                                <input type="password"
                                       name="password_confirmation"
                                       class="h-full px-2 w-full outline-none bg-transparent"
                                       placeholder="Repite la nueva contraseña">
                            </div>
                            <div class="mb-4"></div>

                            <!-- Info -->
                            <div class="bg-red-100 border border-1ed-200 rounded-lg px-4 py-3 text-xs text-indigo-600 flex items-start gap-2 mb-6">
                                <i class="fas fa-info-circle mt-0.5"></i>
                                <span>Elige una contraseña segura de al menos 8 caracteres combinando letras y números.</span>
                            </div>

                            <!-- Botones -->
                            <div class="flex gap-3">
                                <a href="{{ route('perfil.edit', $usuario->id) }}"
                                   class="flex items-center justify-center w-1/3 border border-slate-300 text-slate-600 py-2.5 rounded-full hover:bg-gray-100 transition text-sm font-medium">
                                    Cancelar
                                </a>
                                <button type="submit"
                                        class="flex items-center justify-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white py-2.5 w-2/3 rounded-full transition font-medium">
                                    Cambiar
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
                    <a href="{{ route('perfil.edit', $usuario->id) }}" class="text-indigo-500 hover:underline font-medium">
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
