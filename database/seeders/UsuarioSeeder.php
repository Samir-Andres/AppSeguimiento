<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        DB::table('usuarios')->insert([
        [
            'nombre' => 'Juan',
            'apellidos' => 'Pérez',
            'usuario' => 'jperez',
            'password' => Hash::make('secreto123'),
            'correo' => 'juan@ejemplo.com',
            'direccion' => 'Calle Falsa 123'
        ],
        [
            'nombre' => 'Maria',
            'apellidos' => 'Gomez',
            'usuario' => 'mgomez',
            'password' => Hash::make('password456'),
            'correo' => 'maria@ejemplo.com',
            'direccion' => 'Av. Principal 45'
        ],
        [
            'nombre' => 'Maria',
            'apellidos' => 'Gomez',
            'usuario' => 'mgomez',
            'password' => 'password456',
            'correo' => 'maria@ejemplo.com',
            'direccion' => 'Av. Principal 45'
        ]
    ]);
}
}
