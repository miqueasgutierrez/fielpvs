<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\RegistrosImportController;
use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\CargoDependenciaController;

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

Route::delete('/cargosdependencias/{id1}/{id2}', [CargoDependenciaController::class, 'destroy'])->name('cargosdependencias.destroy');


Route::post('/import-registros', [RegistrosImportController::class, 'import'])->name('import.registros');




require __DIR__.'/auth.php';
