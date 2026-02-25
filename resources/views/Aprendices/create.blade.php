@extends('adminlte::page')

@section('title', 'Crear aprendiz')


@section('content_header')
    <div class="flex flex-wrap  items-center space-x-2 text-sm text-gray-500 font-medium ">
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
        <a href="{{route('Aprendices.index')}}" >Aprendices</a>

        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328"
                fill="#CBD5E1" />
        </svg>
        <a class="text-indigo-500">Registra aprendiz</a>

    </div>


@endsection

@section('content')

    <div id="session-messages" data-success="{{ session('success') }}" data-error="{{ session('error') }}"></div>



    <section class="flex items-center justify-center py-1 px-4">
        <div class="grid md:grid-cols-1 md:gap-10 lg:gap-20 max-w-7xl w-full items-start bg-white p-4 rounded-[2rem] shadow-xl">

            <div class="p-2">
                <h1 class="text-3xl font-semibold text-gray-900 text-center md:text-start mb-3 tracking-tight">
                    Registro de aprendices
                </h1>
                <p class="text-sm/6 text-gray-600 text-center md:text-start mx-auto md:mx-0 mb-8 leading-relaxed max-w-[400px]">
                    Complete la información técnica y personal detallada en el sistema.
                </p>

                <form method="POST" action="{{route('Aprendices.store')}}">
                    @csrf


                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-2">



                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Tipo documento</label>
                            <select name="tbl_tipo_documentos_NIS" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none bg-white focus:border-indigo-500 transition-colors text-gray-500">
                                <option value="">Selecciona una tipo...</option>

                                @foreach ($documento as $item)
                                    <option value="{{ $item->NIS }}"
                                        {{ old('NIS') == $item->NIS ? 'selected' : '' }}>
                                        {{ $item->Denominacion }}
                                    </option>
                                @endforeach

                            </select>
                            @error('tbl_tipo_documentos_NIS')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror

                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Número Documento</label>
                            <input type="text" name="Numdoc" placeholder="1029..." class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500 transition-colors" value="{{ old('Numdoc') }}" />
                            @error('Numdoc')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Nombres</label>
                            <input type="text" name="Nombres" placeholder="Juan" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500 transition-colors" value="{{ old('Nombres') }}" />
                            @error('Nombres')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Apellidos</label>
                            <input type="text" name="Apellidos" placeholder="Pérez" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500 transition-colors" value="{{ old('Apellidos') }}" />
                            @error('Apellidos')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <div >
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Dirección</label>
                            <input type="text" name="Direccion" placeholder="Calle 123..." class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500 transition-colors" value="{{ old('Direccion') }}" />
                            @error('Direccion')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Teléfono</label>
                            <input type="number" name="Telefono" placeholder="300..." class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500 transition-colors" value="{{ old('Telefono') }}" />
                            @error('Telefono')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">F. Nacimiento</label>
                            <input type="date" name="FechaNac" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500 transition-colors text-gray-500" value="{{ old('FechaNac') }}" />
                            @error('FechaNac')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Email Institucional</label>
                            <input type="email" name="Correo_Institucional" placeholder="@misena.edu.co" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500 transition-colors" value="{{ old('Correo_Institucional') }}" />
                            @error('Correo_Institucional')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror


                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Email Personal</label>
                            <input type="email" name="Correo_Personal" placeholder="@gmail.com" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500 transition-colors" value="{{ old('Correo_Personal') }}" />
                            @error('Correo_Personal')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Sexo</label>
                            <select name="Sexo" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none bg-white focus:border-indigo-500 transition-colors text-gray-500">
                                <option value="">Seleccione</option>
                                <option value="0">Femenino</option>
                                <option value="1">Masculino</option>
                            </select>
                            @error('Sexo')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Ref. EPS</label>
                            <select name="tbl_eps_NIS" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none bg-white focus:border-indigo-500 transition-colors text-gray-500">
                            <option value="">Selecciona una eps...</option>

                                @foreach ($eps as $item)
                                    <option value="{{ $item->NIS }}"
                                        {{ old('NIS') == $item->NIS ? 'selected' : '' }}>
                                        {{ $item->Denominacion }}
                                    </option>
                                @endforeach


                            </select>
                            @error('tbl_eps_NIS')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror

                        </div>


                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Ref. Ficha</label>
                            <select name="tbl_ficha_caracterizacion_NIS" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none bg-white focus:border-indigo-500 transition-colors text-gray-500">
                                <option value="">Selecciona una ficha...</option>
                                @foreach ($ficha as $item)
                                    <option value="{{ $item->NIS }}"
                                        {{ old('NIS') == $item->NIS ? 'selected' : '' }}>
                                        {{ $item->Denominacion }}
                                    </option>
                                @endforeach

                            </select>
                            @error('tbl_ficha_caracterizacion_NIS')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="flex justify-center items-center w-full mt-0">


                            <button type="submit"
                                    class="flex items-center justify-center gap-2 mt-6 bg-indigo-500 hover:bg-indigo-600 text-white py-2.5 w-full rounded-full transition shadow-lg shadow-indigo-200">
                                Crear Registro
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m18.038 10.663-5.625 5.625a.94.94 0 0 1-1.328-1.328l4.024-4.023H3.625a.938.938 0 0 1 0-1.875h11.484l-4.022-4.025a.94.94 0 0 1 1.328-1.328l5.625 5.625a.935.935 0 0 1-.002 1.33"
                                        fill="#fff" />
                                </svg>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            </div>

        <h1>Hola</h1>


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

