    @extends('layouts.app')

    @section('content')
    @section('title', 'Login')



        {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Has olvidado tu contraseña?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



        <div class="flex justify-center items-start bg-gray-50 overflow-hidden" style="min-height: calc(100vh - 64px);">

            <form method="POST" action="{{ route('login') }}"
                class="mt-10 bg-white text-gray-500 w-full max-w-[360px] mx-4 md:p-6 p-4 py-8 text-left text-sm rounded-lg shadow-[0px_0px_10px_0px] shadow-black/10">
                @csrf

                <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">{{ __('Login') }}</h2>

                <!-- Email Address -->
                <div class="mb-4">
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        class="w-full border bg-indigo-500/5 border-gray-500/10 outline-none rounded py-2.5 px-3 @error('email') border-red-500 @enderror"
                        placeholder="Correo electrónico" autocomplete="email" autofocus>
                    @error('email')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <input id="password" type="password" name="password"
                        class="w-full border bg-indigo-500/5 border-gray-500/10 outline-none rounded py-2.5 px-3 @error('password') border-red-500 @enderror"
                        placeholder="Contraseña" autocomplete="current-password">
                    @error('password')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mb-6 px-1">
                    <div class="flex items-center">
                        <input class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="ml-2 text-xs text-gray-600 cursor-pointer" for="remember">
                            {{ __('Recordarme') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="text-xs text-indigo-600 hover:text-indigo-800 transition-colors"
                            href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                </div>

                <button type="submit"
                    class="w-full mb-4 bg-indigo-500 hover:bg-indigo-600 transition-all active:scale-95 py-2.5 rounded text-white font-medium shadow-md shadow-indigo-200 uppercase tracking-wide">
                    {{ __('Iniciar Sesión') }}

                    
                </button>

                <p class="text-center mt-4 text-xs">
                    ¿No tienes una cuenta?
                    <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700 underline font-medium px-1">
                        Regístrate aquí
                    </a>
                </p>
            </form>

        </div>
    @endsection
