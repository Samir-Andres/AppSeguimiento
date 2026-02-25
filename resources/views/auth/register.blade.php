@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-start bg-gray-50 overflow-hidden" style="min-height: calc(100vh - 64px);">

        <form method="POST" action="{{ route('register') }}"
            class="mt-10 bg-white text-gray-500 w-full max-w-[360px] mx-4 md:p-6 p-4 py-8 text-left text-sm rounded-lg shadow-[0px_0px_10px_0px] shadow-black/10">
            @csrf

            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">{{ __('Crear cuenta') }}</h2>

            <!-- Name / Username -->
            <div class="mb-3">
                <input id="name" type="text" name="name" value="{{ old('name') }}"
                    class="w-full border bg-indigo-500/5 border-gray-500/10 outline-none rounded py-2.5 px-3 @error('name') border-red-500 @enderror"
                    placeholder="Nombres completos" autocomplete="name" autofocus>
                @error('name')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    class="w-full border bg-indigo-500/5 border-gray-500/10 outline-none rounded py-2.5 px-3 @error('email') border-red-500 @enderror"
                    placeholder="Correo" autocomplete="email">
                @error('email')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <input id="password" type="password" name="password"
                    class="w-full border bg-indigo-500/5 border-gray-500/10 outline-none rounded py-2.5 px-3 @error('password') border-red-500 @enderror"
                    placeholder="Contraseña" autocomplete="new-password">
                @error('password')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <input id="password-confirm" type="password" name="password_confirmation"
                    class="w-full border bg-indigo-500/5 border-gray-500/10 outline-none rounded py-2.5 px-3"
                    placeholder="Confirmar contraseña" autocomplete="new-password">
            </div>

            <button type="submit"
                class="w-full mb-3 bg-indigo-500 hover:bg-indigo-600 transition-all active:scale-95 py-2.5 rounded text-white font-medium shadow-md shadow-indigo-200">
                {{ __('Crear cuenta') }}
            </button>

            <p class="text-center mt-4">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700 underline font-medium px-1">
                    Login
                </a>
            </p>
        </form>

    </div>
    {{-- 
 <div class="container"> --}}
    {{-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

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
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
