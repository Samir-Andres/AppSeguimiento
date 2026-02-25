@extends('layouts.app')

@section('content')
<div class="flex justify-center items-start bg-gray-50 overflow-hidden" style="min-height: calc(100vh - 64px);">

    <div class="mt-10 w-full max-w-[360px] mx-4">
        
        <!-- Mensaje de éxito de Laravel -->
        @if (session('status'))
            <div class="mb-4 px-4 py-3 rounded-lg bg-green-50 border border-green-200 text-green-700 text-xs text-center shadow-sm animate-pulse">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}"
            class="bg-white text-gray-500 w-full md:p-6 p-4 py-8 text-left text-sm rounded-lg shadow-[0px_0px_10px_0px] shadow-black/10">
            @csrf

            <h2 class="text-2xl font-bold mb-2 text-center text-gray-800">{{ __('Recuperar') }}</h2>
            <p class="text-center text-[11px] text-gray-400 mb-8 px-2 leading-relaxed">
                Enviaremos un enlace a tu correo para que puedas restablecer tu contraseña de forma segura.
            </p>

            <!-- Email Address -->
            <div class="mb-6">
                <input id="email" type="email" name="email" value="{{ old('email') }}" 
                    class="w-full border bg-indigo-500/5 border-gray-500/10 outline-none rounded py-2.5 px-3 @error('email') border-red-500 @enderror" 
                    placeholder="Tu correo electrónico" autocomplete="email" autofocus>
                @error('email')
                    <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full mb-3 bg-indigo-500 hover:bg-indigo-600 transition-all active:scale-95 py-2.5 rounded text-white font-medium shadow-md shadow-indigo-200 uppercase tracking-wide">
                {{ __('Enviar Enlace') }}
            </button>

            <p class="text-center mt-6">
                <a href="{{ route('login') }}" class="text-xs text-gray-400 hover:text-indigo-600 transition-colors inline-flex items-center">
                    <svg xmlns="http://www.w3.org" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Volver al Login
                </a>
            </p>
        </form>
    </div>

</div>
@endsection
