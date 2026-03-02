@extends('adminlte::page')

@section('title', 'Crear ficha de caracterización')


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
        <a href="{{route('Ficha_caracterizacion.index')}}" >Fichas</a>

        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328"
                fill="#CBD5E1" />
        </svg>
        <a class="text-indigo-500">Registrar fichas</a>

    </div>


@endsection

@section('content')

    <div id="session-messages" data-success="{{ session('success') }}" data-error="{{ session('error') }}"></div>



    <section class="flex items-center justify-center py-1 px-4">
        <div class="grid md:grid-cols-1 md:gap-10 lg:gap-20 max-w-7xl w-full items-start bg-white p-4 rounded-[2rem] shadow-xl">

            <div class="p-2">
                <h1 class="text-3xl font-semibold text-gray-900 text-center md:text-start mb-3 tracking-tight">
                    Registro de fichas
                </h1>
                <p class="text-sm/6 text-gray-600 text-center md:text-start mx-auto md:mx-0 mb-8 leading-relaxed max-w-[400px]">
                    Complete la información técnica y personal detallada en el sistema.
                </p>

                <form method="POST" action="{{route('Ficha_caracterizacion.store')}}">
                    @csrf


                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-2">

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Codigo</label>
                            <input type="number" name="Codigo" placeholder="10299" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500 transition-colors" value="{{ old('Codigo') }}" />
                            @error('Codigo')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Denominación o Nombre</label>
                            <input type="text" name="Denominacion" placeholder="ADSO" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500 transition-colors" value="{{ old('Denominacion') }}" />
                            @error('Denominacion')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Cupos</label>
                            <input type="number" name="Cupos" placeholder="30" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500 transition-colors" value="{{ old('Cupos') }}" />
                            @error('Cupos')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <div >
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Fecha de inicio</label>
                            <input type="date" name="Fecha_Inicio" id="Fecha_Inicio"  class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500 transition-colors" value="{{ old('Fecha_Inicio') }}" />
                            @error('Fecha_Inicio')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Fecha de clausura</label>
                            <input type="date" name="Fecha_Fin"  class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500 transition-colors" value="{{ old('Fecha_Fin') }}" />
                            @error('Fecha_Fin')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Observaciones</label>
                            <input type="text" name="Observaciones" placeholder="ADSO es un programa de tecnología" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-indigo-500 transition-colors text-gray-500" value="{{ old('Observaciones') }}" />
                            @error('Observaciones')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Centro de formación</label>
                            <select name="tbl_centro_formacion_NIS" id="tbl_centro_formacion_NIS" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none bg-white focus:border-indigo-500 transition-colors text-gray-500">
                                <option value="">Selecciona un centro de formación</option>

                                @foreach ($centro as $item)
                                    <option value="{{ $item->NIS }}"
                                        {{ old('tbl_centro_formacion_NIS') == $item->NIS ? 'selected' : '' }}>
                                        {{ $item->Denominacion }}
                                    </option>
                                @endforeach


                            </select>
                            @error('tbl_centro_formacion_NIS')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror

                        </div>


                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Programa de formación</label>
                            <select name="tbl_programas_formacion_NIS" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none bg-white focus:border-indigo-500 transition-colors text-gray-500">
                                <option value="">Selecciona el programa...</option>
                                @foreach ($programa as $item)
                                    <option value="{{ $item->NIS }}"
                                        {{ old('tbl_programas_formacion_NIS') == $item->NIS ? 'selected' : '' }}>
                                        {{ $item->Denominacion }}
                                    </option>
                                @endforeach

                            </select>
                            @error('tbl_programas_formacion_NIS')
                            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
                            @enderror

                        </div>



                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5 uppercase">Instructor de seguimiento</label>
                            <select name="tbl_instructor_NIS" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none bg-white focus:border-indigo-500 transition-colors text-gray-500">
                                <option value="">Selecciona el instructor de seguimiento...</option>

                                @foreach ($instructor as $item)
                                    <option value="{{ $item->NIS }}"
                                        {{ old('tbl_instructor_NIS') == $item->NIS ? 'selected' : '' }}>
                                        {{ $item->Nombres }} {{$item->Apellidos}}
                                    </option>
                                @endforeach

                            </select>
                            @error('tbl_instructor_NIS')
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

