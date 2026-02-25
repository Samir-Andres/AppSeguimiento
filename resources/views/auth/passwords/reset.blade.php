@extends('layouts.app')

@section('content')


<div class="flex justify-center items-start bg-gray-50 overflow-hidden" style="min-height: calc(100vh - 64px);">

    <form method="POST" action="{{ route('password.update') }}"
        class="mt-10 bg-white text-gray-500 w-full max-w-[360px] mx-4 md:p-6 p-4 py-8 text-left text-sm rounded-lg shadow-[0px_0px_10px_0px] shadow-black/10">
        @csrf

        <!-- Token oculto necesario para Laravel -->
        <input type="hidden" name="token" value="{{ $token }}">

        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">{{ __('Restablecer Contraseña') }}</h2>

        <!-- Email Address -->
        <div class="mb-4">
            <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" 
                class="w-full border bg-indigo-500/5 border-gray-500/10 outline-none rounded py-2.5 px-3 @error('email') border-red-500 @enderror" 
                placeholder="Correo electrónico" required autocomplete="email" autofocus>
            @error('email')
                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <input id="password" type="password" name="password" 
                class="w-full border bg-indigo-500/5 border-gray-500/10 outline-none rounded py-2.5 px-3 @error('password') border-red-500 @enderror" 
                placeholder="Nueva Contraseña" required autocomplete="new-password">
            @error('password')
                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-8">
            <input id="password-confirm" type="password" name="password_confirmation" 
                class="w-full border bg-indigo-500/5 border-gray-500/10 outline-none rounded py-2.5 px-3" 
                placeholder="Confirmar Nueva Contraseña" required autocomplete="new-password">
        </div>

        <button type="submit"
            class="w-full bg-indigo-500 hover:bg-indigo-600 transition-all active:scale-95 py-2.5 rounded text-white font-medium shadow-md shadow-indigo-200 uppercase tracking-wide">
            {{ __('Restablecer Contraseña') }}
        </button>

    </form>

</div>

@endsection
