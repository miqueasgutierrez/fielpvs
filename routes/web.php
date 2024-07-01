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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('/registros', RegistroController::class);
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('/dependencias', DependenciaController::class);
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('/cargos', CargoController::class);
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('/cargosdependencias', CargoDependenciaController::class);
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('/elecciones', EleccionesController::class);

 Route::get('elecciones/candidatos/{iddependencia}/{idambito}', [EleccionesController::class, 'candidatos'])->name('elecciones.candidatos');

 Route::get('elecciones/candidatos/electiva/{iddependencia}/{idambito}', [EleccionesController::class, 'electiva'])->name('elecciones.electiva');

    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});



Route::delete('/cargosdependencias/{id1}/{id2}', [CargoDependenciaController::class, 'destroy'])->name('cargosdependencias.destroy');


Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('/circuitos', CircuitoController::class);
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('/zonas', ZonaController::class);
    Route::post('zonas/storeMultiple', [ZonaController::class, 'storeMultiple'])->name('zonas.storeMultiple');
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('/candidatos', CandidatosController::class);
    Route::post('candidatos/storeMultiple', [CandidatosController::class, 'storeMultiple'])->name('candidatos.storeMultiple');
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});



Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('/iglesias', IglesiaController::class);
     
      Route::post('iglesias/storeMultiple', [IglesiaController::class, 'storeMultiple'])->name('iglesias.storeMultiple');

    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/apizonas/{circuitoId}', [IglesiaController::class, 'getZonas'])->name('getZonas');

Route::get('/api-iglesias/{zonaId}', [RegistroController::class, 'getIglesias'])->name('getIglesias');


Route::get('/api-cargos/{dependenciaId}', [CandidatosController::class, 'getCargos'])->name('getCargos');



Route::post('/import-registros', [RegistrosImportController::class, 'import'])->name('import.registros');

Route::get('/cargos/{dependencia_id}', [DependenciaController::class, 'getCargos']);



require __DIR__.'/auth.php';
