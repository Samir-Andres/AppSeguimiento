@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div>

  </div>
@stop

@section('content')


<div class="bg-[#FAFAFA] py-16 px-4 flex flex-col justify-center items-center">
    <div class="text-center mb-15">
        <h6 class="text-[30px] font-medium text-slate-900 mb-4">
           Bienvenido <span class="text-blue-600"> {{Auth::user()->name }} </span> a su Dashboard
        </h6>

    </div>

    <div class="flex flex-wrap items-center justify-center gap-6 max-w-6xl w-full">
        <!-- Card 1 -->
         <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden transition-all duration-300 cursor-pointer hover:-translate-y-2 hover:shadow-lg p-4 flex flex-col items-center">
             <div class="w-full max-w-56 flex flex-col h-full">
                <h3 class="text-base font-medium text-slate-900 mb-2">
                   Perfil
                </h3>
                <p class="text-xs text-slate-700 leading-relaxed mb-3">
                    Mire y consulte su información
                </p>
                <div class='flex items-end justify-end'>
                    <a href="{{route('perfil.userLogueado')}}" class="inline-flex items-center gap-2 bg-transparent border-0 text-slate-700 text-xs cursor-pointer p-0 hover:gap-2 group">
                        Ir
                        <svg width="22" height="15" viewBox="0 0 22 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="transition-transform duration-300 group-hover:translate-x-1">
                            <path d="M4.583 7.5h12.834M11 3.125 17.417 7.5 11 11.875" stroke="#314158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
         <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden transition-all duration-300 cursor-pointer hover:-translate-y-2 hover:shadow-lg p-4 flex flex-col items-center">
             <div class="w-full max-w-56 flex flex-col h-full">
                <h3 class="text-base font-medium text-slate-900 mb-2">
                   Regionales
                </h3>
                <p class="text-xs text-slate-700 leading-relaxed mb-3">
                    Mire y consulte las regionales
                </p>
                <div class='flex items-end justify-end'>
                    <a href="{{route('regional.index')}}" class="inline-flex items-center gap-2 bg-transparent border-0 text-slate-700 text-xs cursor-pointer p-0 hover:gap-2 group">
                        Ir
                        <svg width="22" height="15" viewBox="0 0 22 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="transition-transform duration-300 group-hover:translate-x-1">
                            <path d="M4.583 7.5h12.834M11 3.125 17.417 7.5 11 11.875" stroke="#314158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

         <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden transition-all duration-300 cursor-pointer hover:-translate-y-2 hover:shadow-lg p-4 flex flex-col items-center">
             <div class="w-full max-w-56 flex flex-col h-full">
                <h3 class="text-base font-medium text-slate-900 mb-2">
                   Alternativas
                </h3>
                <p class="text-xs text-slate-700 leading-relaxed mb-3">
                    Mire y consulte las alternativas
                </p>
                <div class='flex items-end justify-end'>
                    <a href="{{route('Alternativa.Index')}}" class="inline-flex items-center gap-2 bg-transparent border-0 text-slate-700 text-xs cursor-pointer p-0 hover:gap-2 group">
                        Ir
                        <svg width="22" height="15" viewBox="0 0 22 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="transition-transform duration-300 group-hover:translate-x-1">
                            <path d="M4.583 7.5h12.834M11 3.125 17.417 7.5 11 11.875" stroke="#314158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden transition-all duration-300 cursor-pointer hover:-translate-y-2 hover:shadow-lg p-4 flex flex-col items-center">
             <div class="w-full max-w-56 flex flex-col h-full">
                <h3 class="text-base font-medium text-slate-900 mb-2">
                   Programa Formación
                </h3>
                <p class="text-xs text-slate-700 leading-relaxed mb-3">
                    Mire y consulte los programas
                </p>
                <div class='flex items-end justify-end'>
                    <a href="{{route('ProgramaFormacion.index')}}" class="inline-flex items-center gap-2 bg-transparent border-0 text-slate-700 text-xs cursor-pointer p-0 hover:gap-2 group">
                        Ir
                        <svg width="22" height="15" viewBox="0 0 22 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="transition-transform duration-300 group-hover:translate-x-1">
                            <path d="M4.583 7.5h12.834M11 3.125 17.417 7.5 11 11.875" stroke="#314158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

   <!-- <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden transition-all duration-300 cursor-pointer hover:-translate-y-2 hover:shadow-lg p-4 flex flex-col items-center">
             <div class="w-full max-w-56 flex flex-col h-full">
                <h3 class="text-base font-medium text-slate-900 mb-2">
                   Eps
                </h3>
                <p class="text-xs text-slate-700 leading-relaxed mb-3">
                    Mire y las eps
                </p>
                <div class='flex items-end justify-end'>
                    <a href="{{route('eps.index')}}" class="inline-flex items-center gap-2 bg-transparent border-0 text-slate-700 text-xs cursor-pointer p-0 hover:gap-2 group">
                        Ir
                        <svg width="22" height="15" viewBox="0 0 22 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="transition-transform duration-300 group-hover:translate-x-1">
                            <path d="M4.583 7.5h12.834M11 3.125 17.417 7.5 11 11.875" stroke="#314158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    -->
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/url.css')}}">
@endsection


@section('js')
<script src="https://cdn.tailwindcss.com"></script>
@endsection



