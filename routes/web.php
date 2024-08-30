<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\RegistrosImportController;
use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\CargoDependenciaController;
use App\Http\Controllers\CircuitoController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\IglesiaController;
use App\Http\Controllers\CandidatosController;
use App\Http\Controllers\EleccionesController;
use App\Http\Controllers\EstadoDependenciaController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ResultadosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



 // Ruta principal que redirige según el rol del usuario
Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->hasRole('votante')) {
            return redirect()->route('elecciones.vista1');
        } elseif (auth()->user()->hasAnyRole(['admin', 'operador'])) {
            return view('dashboard');
        }
    }
    return view('welcome'); // o cualquier otra vista para usuarios no autenticados
})->name('dashboard');


// Rutas accesibles para usuarios autenticados
Route::middleware(['auth', 'verified'])->group(function () {
    // Ruta para la vista principal del dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Ruta para la vista de login
    Route::get('/login', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Rutas accesibles solo para usuarios con rol "votante"
    Route::middleware(['role:votante'])->group(function () {
        Route::get('elecciones/vista1', [EleccionesController::class, 'vista1'])->name('elecciones.vista1');
        Route::post('/comprobante', [PDFController::class, 'comprobante'])->name('comprobante');
        Route::post('elecciones/votacionfinal', [EleccionesController::class, 'votacionfinal'])->name('elecciones.votacionfinal');
        Route::get('elecciones/elector/{iddependencia}/{idambito}', [EleccionesController::class, 'elector'])->name('elecciones.elector');
        Route::get('elecciones/votacionnacional/{idvotante}/{iddependencia}/{idambito}', [EleccionesController::class, 'votacionnacional'])->name('elecciones.votacion');
        Route::get('elecciones/votacionregional/{idvotante}/{iddependencia}/{idambito}', [EleccionesController::class, 'votacionregional'])->name('elecciones.votacionregional');
        Route::get('elecciones/votacionzonal/{idvotante}/{iddependencia}/{idambito}', [EleccionesController::class, 'votacionzonal'])->name('elecciones.votacionzonal');
        Route::get('elecciones/votacionlocal/{idvotante}/{iddependencia}/{idambito}', [EleccionesController::class, 'votacionlocal'])->name('elecciones.votacionlocal');
    });

    // Rutas accesibles solo para administradores
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/estado_dependencias/{iddependencia}/{estado}', [EstadoDependenciaController::class, 'update'])->name('update');
        Route::resource('/registros', RegistroController::class);
        Route::resource('/dependencias', DependenciaController::class);
        Route::resource('/cargos', CargoController::class);
        Route::resource('/cargosdependencias', CargoDependenciaController::class);
        Route::delete('/cargosdependencias/{id1}/{id2}', [CargoDependenciaController::class, 'destroy'])->name('cargosdependencias.destroy');
        Route::resource('/zonas', ZonaController::class);
        Route::post('zonas/storeMultiple', [ZonaController::class, 'storeMultiple'])->name('zonas.storeMultiple');
        Route::resource('/circuitos', CircuitoController::class);
        Route::resource('/candidatos', CandidatosController::class);
        Route::post('candidatos/storeMultiple', [CandidatosController::class, 'storeMultiple'])->name('candidatos.storeMultiple');
        Route::resource('/iglesias', IglesiaController::class);
        Route::post('iglesias/storeMultiple', [IglesiaController::class, 'storeMultiple'])->name('iglesias.storeMultiple');
        Route::get('/resultados/nacionales', [ResultadosController::class, 'nacionales'])->name('resultados.nacionales');
        Route::get('/apizonas/{circuitoId}', [IglesiaController::class, 'getZonas'])->name('getZonas');
        Route::get('/api-iglesias/{zonaId}', [RegistroController::class, 'getIglesias'])->name('getIglesias');
        Route::get('/api-cargos/{dependenciaId}', [CandidatosController::class, 'getCargos'])->name('getCargos');
        Route::post('/import-registros', [RegistrosImportController::class, 'import'])->name('import.registros');
        Route::get('/cargos/{dependencia_id}', [DependenciaController::class, 'getCargos']);
    });

    // Rutas accesibles para operadores y administradores
    Route::middleware(['role:operador|admin'])->group(function () {
        Route::resource('/elecciones', EleccionesController::class);
        Route::get('/resultados/regionales', [ResultadosController::class, 'regionales'])->name('resultados.regionales');
        Route::get('/resultados/zonales', [ResultadosController::class, 'zonales'])->name('resultados.zonales');
        Route::get('/resultados/locales', [ResultadosController::class, 'locales'])->name('resultados.locales');
        Route::post('/resultadolocal', [PDFController::class, 'resultadolocal'])->name('resultadolocal');
        Route::post('/resultadofinalpdf', [PDFController::class, 'resultadofinalpdf'])->name('resultadofinalpdf');
        Route::post('/resultadonacional', [PDFController::class, 'resultadonacional'])->name('resultadonacional');
        Route::post('/resultadozonal', [PDFController::class, 'resultadozonal'])->name('resultadozonal');
        Route::post('/resultadoregional', [PDFController::class, 'resultadoregional'])->name('resultadoregional');
        Route::get('elecciones/candidatos/{iddependencia}/{idambito}', [EleccionesController::class, 'candidatos'])->name('elecciones.candidatos');
        Route::get('elecciones/cargos/{iddependencia}/{idambito}', [EleccionesController::class, 'cargos'])->name('elecciones.cargos');
        Route::get('elecciones/opciones/{iddependencia}/{idambito}', [EleccionesController::class, 'opciones'])->name('elecciones.opciones');
        Route::post('elecciones/datos', [EleccionesController::class, 'datos'])->name('elecciones.datos');
        Route::get('elecciones/candidatos/electiva/{iddependencia}/{idambito}', [EleccionesController::class, 'electiva'])->name('elecciones.electiva');
        Route::post('elecciones/vistaresultados', [EleccionesController::class, 'vistaresultados'])->name('elecciones.vistaresultados');
    });

    // Rutas para la edición de perfil
    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// Archivo de rutas para autenticación
require __DIR__.'/auth.php';
