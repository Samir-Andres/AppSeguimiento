<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
        $table->id(); // int primary key auto_increment
        $table->string('nombre', 50);
        $table->string('apellidos', 50);
        $table->string('usuario', 50);
        $table->string('password', 250);
        $table->string('correo', 100);
        $table->string('direccion', 250);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
