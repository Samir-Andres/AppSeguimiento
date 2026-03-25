@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Editar usuario')

@section('content_header')
    <div class="flex flex-wrap items-center space-x-2 text-sm text-gray-500 font-medium ml-4 mt-2">
        <a href="{{ route('home') }}" title="Dashboard">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 7.609c.352 0 .69.122.96.343l.111.1 6.25 6.25v.001a1.5 1.5 0 0 1 .445 1.071v7.5a.89.89 0 0 1-.891.891H9.125a.89.89 0 0 1-.89-.89v-7.5l.006-.149a1.5 1.5 0 0 1 .337-.813l.1-.11 6.25-6.25c.285-.285.67-.444 1.072-.444Zm5.984 7.876L16 9.5l-5.984 5.985v6.499h11.968z" fill="#898d95ff" stroke="#898d95ff" stroke-width=".094"/>
            </svg>
        </a>
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328" fill="#CBD5E1"/></svg>
        <a href="{{ route('usuarios.index') }}">Usuarios</a>
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328" fill="#CBD5E1"/></svg>
        <span class="text-indigo-500">Editar usuario</span>
    </div>
@endsection

@section('content')
    <div id="session-messages" data-success="{{ session('success') }}" data-error="{{ session('error') }}"></div>

    <div class="flex justify-center items-start pt-2 pb-2">
        <div class="bg-white w-full max-w-md mx-4 rounded-2xl shadow-lg p-8">

            {{-- Título --}}
            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-indigo-100 rounded-full mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Editar Usuario</h2>
                <p class="text-sm text-gray-400 mt-1">Modifica los datos del usuario</p>
            </div>

            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                {{-- Nombre --}}
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Nombre</label>
                    <div style="height: 48px;" class="flex items-center border border-gray-200 rounded-xl px-3 focus-within:ring-2 focus-within:ring-indigo-400 transition bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        <input name="name" type="text" placeholder="Nombre completo" value="{{ old('name', $usuario->name) }}"
                               style="height: 100%; width: 100%; outline: none; background: transparent; font-size: 14px; color: #374151; border: none; box-shadow: none;">
                    </div>
                    @error('name')<p class="text-red-500 text-xs mt-1 pl-1">{{ $message }}</p>@enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Correo electrónico</label>
                    <div style="height: 48px;" class="flex items-center border border-gray-200 rounded-xl px-3 focus-within:ring-2 focus-within:ring-indigo-400 transition bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        <input name="email" type="email" placeholder="correo@ejemplo.com" value="{{ old('email', $usuario->email) }}"
                               style="height: 100%; width: 100%; outline: none; background: transparent; font-size: 14px; color: #374151; border: none; box-shadow: none;">
                    </div>
                    @error('email')<p class="text-red-500 text-xs mt-1 pl-1">{{ $message }}</p>@enderror
                </div>

                {{-- Roles --}}
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-2">Rol del usuario</label>
                    <div class="flex flex-wrap gap-2">
                        @foreach($roles as $rol)
                            <label class="flex items-center gap-2 cursor-pointer bg-gray-50 border border-gray-200 hover:border-indigo-400 hover:bg-indigo-50 rounded-xl px-3 py-2 transition-all
                                {{ $usuario->tbl_roles_administrativos_NIS == $rol->NIS ? 'border-indigo-500 bg-indigo-50' : '' }}">
                                <input type="radio" name="tbl_roles_administrativos_NIS" value="{{ $rol->NIS }}"
                                       class="accent-indigo-600 w-4 h-4"
                                    {{ $usuario->tbl_roles_administrativos_NIS == $rol->NIS ? 'checked' : '' }}>
                                <span class="text-sm text-gray-700 font-medium capitalize">{{ $rol->nombre }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('tbl_roles_administrativos_NIS')
                    <p class="text-red-500 text-xs mt-1 pl-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Botones --}}
                <div class="flex gap-3 mt-2">
                    <a href="{{ route('usuarios.index') }}"
                       class="w-full text-center border border-gray-200 hover:bg-gray-50 text-gray-600 font-bold py-2 rounded-xl transition-all">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 active:scale-95 transition-all text-white font-bold py-2 rounded-xl shadow-md shadow-indigo-100">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
@endsection
