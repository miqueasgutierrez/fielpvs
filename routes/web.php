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

Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    



Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function() {



// Rutas accesibles para votantes
Route::middleware(['role:votante'])->group(function () {

      Route::post('elecciones/votacionfinal', [EleccionesController::class, 'votacionfinal'])->name('elecciones.votacionfinal');

  Route::get('elecciones/elector/{iddependencia}/{idambito}', [EleccionesController::class, 'elector'])->name('elecciones.elector');
  Route::get('elecciones/vista1', [EleccionesController::class, 'vista1'])->name('elecciones.vista1');

 Route::get('elecciones/votacionnacional/{idvotante}/{iddependencia}/{idambito}', [EleccionesController::class, 'votacionnacional'])->name('elecciones.votacion');


  Route::get('elecciones/votacionregional/{idvotante}/{iddependencia}/{idambito}', [EleccionesController::class, 'votacionregional'])->name('elecciones.votacionregional');
   
});


    // Rutas accesibles solo para administrador

    Route::middleware(['role:admin'])->group(function () {
        // Registro
        

 Route::get('/estado_dependencias/{iddependencia}/{estado}', [EstadoDependenciaController::class, 'update'])->name('update');


        Route::resource('/registros', RegistroController::class);
        
        // Dependencias
        Route::resource('/dependencias', DependenciaController::class);
        
        // Cargos
        Route::resource('/cargos', CargoController::class);
        
        // Cargo dependencias
        Route::resource('/cargosdependencias', CargoDependenciaController::class);
        Route::delete('/cargosdependencias/{id1}/{id2}', [CargoDependenciaController::class, 'destroy'])->name('cargosdependencias.destroy');
        
        // Zonas
        Route::resource('/zonas', ZonaController::class);
        Route::post('zonas/storeMultiple', [ZonaController::class, 'storeMultiple'])->name('zonas.storeMultiple');
        
        // Circuitos
        Route::resource('/circuitos', CircuitoController::class);
        
        // Candidatos
        Route::resource('/candidatos', CandidatosController::class);
        Route::post('candidatos/storeMultiple', [CandidatosController::class, 'storeMultiple'])->name('candidatos.storeMultiple');
        
        // Iglesias
        Route::resource('/iglesias', IglesiaController::class);
        Route::post('iglesias/storeMultiple', [IglesiaController::class, 'storeMultiple'])->name('iglesias.storeMultiple');
        
        // Resultados PDF

        Route::get('/resultados/nacionales', [ResultadosController::class, 'nacionales'])->name('resultados.nacionales');
         
        
        // API endpoints
        Route::get('/apizonas/{circuitoId}', [IglesiaController::class, 'getZonas'])->name('getZonas');
        Route::get('/api-iglesias/{zonaId}', [RegistroController::class, 'getIglesias'])->name('getIglesias');
        Route::get('/api-cargos/{dependenciaId}', [CandidatosController::class, 'getCargos'])->name('getCargos');
        
        // Importar registros
        Route::post('/import-registros', [RegistrosImportController::class, 'import'])->name('import.registros');
        
        // Obtener cargos de dependencias
        Route::get('/cargos/{dependencia_id}', [DependenciaController::class, 'getCargos']);
   
    // Editar perfil
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


// Rutas accesibles para admin y operador
Route::middleware(['role:operador'])->group(function () {
  
});

});

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


});

require __DIR__.'/auth.php';