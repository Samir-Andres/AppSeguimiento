@extends('adminlte::page')

@section('title', 'Alternativa')


@section('content_header')

@endsection

@section('content')

    <form action="{{ route('ActualizarDatos.Perfil', $Idusuario->name) }}" class="bg-white p-3 mt-4" method="POST">

        @csrf
        @method('PUT')


        <div class="row">

            <div class="fl-flex-label col-12 col-lg-6 mb-4">
                <input type="text" class="input input__text" placeholder="Nombres" name="nombre"
                       value="{{ $usuario->name }}">

                <div class="mt-3">
                    @error('name')
                    <small class="text-danger mt-2">{{ $message }} <i class="fas fa-info"></i> </small>
                    @enderror
                </div>

            </div>

            <div class="fl-flex-label col-12 col-lg-6 mb-4">
                <input type="text" class="input input__text" placeholder="Apellidos" name="apellido"
                       value="{{ $usuario->email }}">

                <div class="mt-3">
                    @error('email')
                    <small class="text-danger mt-2">{{ $message }} <i class="fas fa-info"></i> </small>
                    @enderror
                </div>
            </div>

            <div class="fl-flex-label col-12 col-lg-12 mb-4 text-center">
                <button type="submit" class="btn btn-primary" style="border-radius: 20px">Actualizar Perfil</button>
            </div>
        </div>
    </form>





@endsection
