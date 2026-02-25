@extends('adminlte::page')

@section('title', 'Actualizar Programa')


@section('content_header')
    <div class="flex flex-wrap  items-center space-x-2 text-sm text-gray-500 font-medium">
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
        <a href="{{route('ProgramaFormacion.index')}}" >Programas Formación</a>

        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m14.413 10.663-6.25 6.25a.939.939 0 1 1-1.328-1.328L12.42 10 6.836 4.413a.939.939 0 1 1 1.328-1.328l6.25 6.25a.94.94 0 0 1-.001 1.328"
                fill="#CBD5E1" />
        </svg>
        <a class="text-indigo-500">Actualizar Programa</a>

    </div>


@stop

@section('content')



    <div id="session-messages" data-success="{{ session('success') }}" data-error="{{ session('error') }}"></div>



    <form action="{{route('Programas.update', $programa->NIS)}}" class="flex flex-col items-center text-sm text-slate-800" method="POST">
        @csrf
        @method('PUT')
        <h1 class="text-4xl font-bold py-4 text-center">Actualizar Programas</h1>
        <p class="max-md:text-sm text-gray-500 pb-10 text-center">
           <a href="#" class="text-indigo-600 hover:underline"></a>
        </p>

        <div class="max-w-96 w-full px-4">
            <label for="name" class="font-medium">Codigo</label>
            <div class="flex items-center mt-2 mb-4 h-10 pl-3 border border-slate-300 rounded-full focus-within:ring-2 focus-within:ring-indigo-400 transition-all overflow-hidden">
                <input type="text" name="Codigo" class="h-full px-2 w-full outline-none bg-transparent" placeholder="Enter your full name" value="{{$programa->Codigo}}" >


            </div>
            @error('Codigo')
            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
            @enderror

            <label for="email-address" class="font-medium mt-4">Denominación</label>
            <div class="flex items-center mt-2 mb-4 h-10 pl-3 border border-slate-300 rounded-full focus-within:ring-2 focus-within:ring-indigo-400 transition-all overflow-hidden">

                <input type="text" name="Denominacion" class="h-full px-2 w-full outline-none bg-transparent" placeholder="Enter your email address" value="{{$programa->Denominacion}}">

            </div>

            @error('Denominacion')
            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
            @enderror

            <label for="message" class="font-medium mt-4">Observaciones</label>
            <textarea name="Observacaiones" rows="4"
                      class="w-full mt-2 p-3 bg-transparent border {{ $errors->has('Observacaiones') ? 'border-red-500' : 'border-slate-300' }} rounded-xl resize-none outline-none focus:ring-2 focus:ring-indigo-400 transition-all"
                      placeholder="Detalles de la alternativa">{{ old('Observacaiones', $programa->Observacaiones) }}</textarea>

            @error('Observacaiones')
            <p class="text-red-500 text-xs mb-0 pl-2 text-center">{{ $message }}</p>
            @enderror

            <button type="submit" class="flex items-center justify-center gap-1 mt-5 bg-indigo-500 hover:bg-indigo-600 text-white py-2.5 w-full rounded-full transition">
                Actualizar
            </button>
        </div>
    </form>

@endsection


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
@endsection

