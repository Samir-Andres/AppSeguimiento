@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Editar ente coformador')

@section('content_header')
    <div class="flex flex-wrap items-center space-x-2 text-sm text-gray-500 font-medium">
        <a href="{{ route('home') }}">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"><path d="M16 7.609c.352 0 .69.122.96.343l.111.1 6.25 6.25v.001a1.5 1.5 0 0 1 .445 1.071v7.5a.89.89 0 0 1-.891.891H9.125a.89.89 0 0 1-.89-.89v-7.5l.006-.149a1.5 1.5 0 0 1 .337-.813l.1-.11 6.25-6.25c.285-.285.67-.444 1.072-.444Zm5.984 7.876L16 9.5l-5.984 5.985v6.499h11.968z" fill="#898d95ff" stroke="#898d95ff" stroke-width=".094" /></svg>
        </a>
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328" fill="#CBD5E1" /></svg>
        <a href="{{route('Entecoformadores.index')}}">Ente coformadores</a>
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328" fill="#CBD5E1" /></svg>
        <a class="text-indigo-500">Editar ente</a>
    </div>
@endsection

@section('content')

    <div id="session-messages" data-success="{{ session('success') }}" data-error="{{ session('error') }}"></div>

    <section class="flex items-center justify-center py-1 px-4">
        <div class="grid md:grid-cols-1 max-w-7xl w-full items-start bg-white p-4 rounded-[2rem] shadow-xl">
            <div class="p-2">
                <h1 class="text-3xl font-semibold text-gray-900 text-center md:text-start mb-3 tracking-tight">Actualizar ente coformador</h1>
                <p class="text-sm/6 text-gray-600 mb-8 leading-relaxed max-w-[400px] mx-auto text-center">Modifique la información necesaria del registro seleccionado.</p>

                <form method="POST" action="{{ route('Entecoformadores.update', $ente->NIS) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-2">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Tipo documento</label>
                            <select name="tbl_tipo_documentos_NIS" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none bg-white focus:border-indigo-500 transition-colors text-gray-500">
                                @foreach ($tipo as $item)
                                    <option value="{{ $item->NIS }}" {{ (old('tbl_tipo_documentos_NIS', $ente->tbl_tipo_documentos_NIS) == $item->NIS) ? 'selected' : '' }}>
                                        {{ $item->Denominacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbl_tipo_documentos_NIS') <p class="text-red-500 text-xs mt-1 text-center">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Número Documento</label>
                            <input type="number" name="Numdoc" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500" value="{{ old('Numdoc', $ente->Numdoc) }}" />
                            @error('Numdoc') <p class="text-red-500 text-xs mt-1 text-center">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Razón social</label>
                            <input type="text" name="Razon_Social" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500" value="{{ old('Razon_Social', $ente->Razon_Social) }}" />
                            @error('Razon_Social') <p class="text-red-500 text-xs mt-1 text-center">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Dirección</label>
                            <input type="text" name="Direccion" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500" value="{{ old('Direccion', $ente->Direccion) }}" />
                            @error('Direccion') <p class="text-red-500 text-xs mt-1 text-center">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Teléfono</label>
                            <input type="number" name="Telefono" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500" value="{{ old('Telefono', $ente->Telefono) }}" />
                            @error('Telefono') <p class="text-red-500 text-xs mt-1 text-center">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Correo institucional</label>
                            <input type="text" name="Correo_Institucional" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500" value="{{ old('Correo_Institucional', $ente->Correo_Institucional) }}" />
                            @error('Correo_Institucional') <p class="text-red-500 text-xs mt-1 text-center">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <div class="flex items-center">
                            <button type="submit"
                                    class="flex items-center justify-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white py-2.5 w-full rounded-full transition shadow-lg shadow-indigo-200 text-sm font-medium">
                                Crear Registro
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org">
                                    <path d="m18.038 10.663-5.625 5.625a.94.94 0 0 1-1.328-1.328l4.024-4.023H3.625a.938.938 0 0 1 0-1.875h11.484l-4.022-4.025a.94.94 0 0 1 1.328-1.328l5.625 5.625a.935.935 0 0 1-.002 1.33" fill="#fff" />
                                </svg>
                            </button>
                        </div>

                        <div class="hidden sm:block"></div>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com" />
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
@endsection
