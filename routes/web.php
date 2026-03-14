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
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\EntecoformadoresController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\FichacaracterizacionController;

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
Route::get('/buscar', [RegionalController::class, 'buscar'] )->name('buscar.alternativa')->middleware('auth');


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
Route::resource('/Rolesadministrativos', RolesadministrativosController::class)->middleware('auth');

// Ruta al index de Tipo de documentos
Route::resource('/TipoDocumentos', TipodocumentosController::class)->middleware('auth');


Route::get('/clear', function () {
    Artisan::call('cache:clear');
});

//Ruta de aprendices
Route::resource('/Aprendices', AprendicesController::class)->middleware('auth');

//Rutas de las bitacoras
Route::resource('/Bitacoras', BitacoraController::class)->middleware('auth');
Route::get('/Bitacora/{id}/download', [BitacoraController::class, 'download'] )->name('bitacora.download')->middleware('auth');
Route::get('/Qr', [QrCodeController::class, 'index'] )->name('bitacora.qr')->middleware('auth');

Route::resource('/Ficha_caracterizacion', FichacaracterizacionController::class)->middleware('auth');

//Ruta resource para ente conformadores donde contendrá los métodos CRUD
Route::resource('/Entecoformadores', EntecoformadoresController::class)->middleware('auth');



Route::resource('/Instructores', InstructorController::class)->middleware('auth');

//Rutas para ver los programas asignados del instructor logueado
//Rutas donde ver la documentación de los aprendices con sus respectivas rutas para rechazar y aprobar bitácoras
Route::get('/Ver/Programa', [InstructorController::class, 'programa_asignado'])->name('ver.programa')->middleware('auth');
Route::get('/Ver/Aprendices/{NIS}', [InstructorController::class, 'Programa_aprendices'])->name('ver.aprendices')->middleware('auth');
Route::get('/Ver/Documentacion/{NIS}', [InstructorController::class, 'Aprendices_documentacion'])->name('ver.documentacion')->middleware('auth');
Route::put('/Cambiar/estado/{id}', [InstructorController::class, 'Aprobar_bitacora'])->name('aprobar.bitacora')->middleware('auth');
Route::put('/Rechazar/Bitacora/{id}', [InstructorController::class, 'Rechazar_bitacora'])->name('rechazar.bitacora')->middleware('auth');

//Rutas para ver los programas que se le esta haciendo seguimineto
Route::get('/Ver/Programa/Aprobado', [InstructorController::class, 'programa_asignado_aprobados'])->name('ver.programa.aprobados')->middleware('auth');
Route::get('/Ver/Aprendiz/Aprobados/{NIS}', [InstructorController::class, 'programa_aprendices_aprobados'])->name('ver.aprendices.aprobados')->middleware('auth');
Route::get('/Ver/Bitacoras/Aprobada/{NIS}', [InstructorController::class, 'Bitacora_aprendiz_aprobadas'])->name('ver.bitacoras.aprobada')->middleware('auth');

Route::put('/Desaprobar/Bitacora/{id}', [InstructorController::class, 'Desaprobar_bitacora'])->name('desaprobar.bitacora')->middleware('auth');



























