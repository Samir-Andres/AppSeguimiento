<?php

use App\Http\Controllers\AlternativaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProgramaformacionController;
use App\Http\Controllers\RolesadministrativosController;
use App\Http\Controllers\RegionalController;
use App\Http\Controllers\TipodocumentosController;
use App\Http\Controllers\AprendicesController;
use App\Http\Controllers\BitacoraController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EpsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.userLogueado');
Route::post('/Perfil/update/{id}', [PerfilController::class, 'update'])->name('ActualizarDatos.Perfil');


// Rutas de alternativas a etapa productiva
Route::get('/Alternativa/index', [AlternativaController::class, 'index'])->name('Alternativa.Index');
Route::get('/Alternativa/{id}/edit', [AlternativaController::class, 'edit'])->name('alternativas.edit');
Route::put('/Editar/{id}', [AlternativaController::class, 'update'] )->name('alternativa.actualizar')->middleware('auth');
Route::delete('/Eliminar/{id}', [AlternativaController::class, 'destroy'] )->name('alternativas.delete')->middleware('auth');
Route::get('/Alternativa/create', [AlternativaController::class, 'create'] )->name('create.alternativa')->middleware('auth');
Route::post('/Alternativa/store', [AlternativaController::class, 'store'] )->name('alternativa.store')->middleware('auth');

Route::get('/Alternativa/Detalle/{id}', [AlternativaController::class, 'show'] )->name('alternativa.show')->middleware('auth');
Route::get('/Regional/index', [RegionalController::class, 'index'])->name('regional.index');
Route::get('/Consultar/Regional', [RegionalController::class, 'ConsultarRegional'])->name('consultar.regional');


Route::get('/Programa/index', [ProgramaformacionController::class, 'index'])->name('ProgramaFormacion.index');
Route::get('/Programa/create', [ProgramaformacionController::class, 'create'])->name('Programas.create');
Route::post('/Programa/store', [ProgramaformacionController::class, 'store'])->name('Programas.store');
Route::get('/Programa/{NIS}/edit', [ProgramaformacionController::class, 'edit'])->name('Programas.edit');
Route::put('/Programa/{NIS}', [ProgramaformacionController::class, 'update'])->name('Programas.update');
Route::delete('/Programa/Delete/{NIS}', [ProgramaformacionController::class, 'destroy'])->name('Programas.destroy');
Route::get('/Programa/Detalle/{NIS}', [ProgramaformacionController::class, 'show'])->name('programas.show');


Route::get('/Eps/index', [EpsController::class, 'index'])->name('eps.index')->middleware('auth');
Route::get('/Eps/Detalles/{NIS}', [EpsController::class, 'show'])->name('eps.show')->middleware('auth');
Route::get('/Eps/create', [EpsController::class, 'create'])->name('eps.create')->middleware('auth');
Route::post('/Eps/store', [EpsController::class, 'store'])->name('eps.store')->middleware('auth');
Route::get('/Eps/edit/{NIS}', [EpsController::class, 'edit'])->name('eps.edit')->middleware('auth');
Route::put('/Eps/{NIS}', [EpsController::class, 'update'])->name('eps.update')->middleware('auth');
Route::delete('/Eps/Delete/{NIS}', [EpsController::class, 'destroy'])->name('eps.delete')->middleware('auth');




// Ruta al index de Roles administrativos
Route::get('/Roles/index', [RolesadministrativosController::class, 'index'])->name('roles.index')->middleware('auth');

// Ruta al index de Tipo de documentos
Route::get('/Tipo/Documentos/index', [TipodocumentosController::class, 'index'])->name('tipodocumentos.index')->middleware('auth');

Route::get('/clear', function () {
    Artisan::call('cache:clear');
});


Route::resource('/Aprendices', AprendicesController::class)->middleware('auth');
Route::resource('/Bitacoras', BitacoraController::class)->middleware('auth');








































