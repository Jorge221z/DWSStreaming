<?php

use App\Http\Controllers\Controlador;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test;

// ====================== RUTAS PÚBLICAS ======================
// Accesibles sin autenticación, pero con middleware 'web' forzado (manejo de cookies)
Route::middleware('web')->group(function () {
    // Inicio y catálogos
    Route::get('/', [Controlador::class, 'inicio'])->name('inicio');
    Route::get('inicio', [Controlador::class, 'inicio'])->name('inicio');
    Route::get('catalogo', [Controlador::class, 'catalogo'])->name('catalogo');
    Route::get('catalogoDirectores', [Controlador::class, 'catalogoDirectores'])->name('catalogoDirectores');
    Route::get('catalogoElenco', [Controlador::class, 'catalogoElenco'])->name('catalogoElenco');
    Route::get('documentacion', [Controlador::class, 'documentacion'])->name('documentacion');

    // Login y logout
    Route::get('formulario', [Controlador::class, 'formulario'])->name('formulario');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('salir', [Controlador::class, 'salir'])->name('salir');
});

// ====================== RUTAS PROTEGIDAS ======================
// Requieren autenticación con Sanctum
Route::middleware(['web', 'auth:sanctum'])->group(function () {
    // Formularios y acciones de guardado

    Route::get('formularioPelis', [Controlador::class, 'formularioPelis'])->name('formularioPelis');
    Route::match(['get', 'post'], 'guardarPelis', [Controlador::class, 'guardarPelis'])->name('guardarPelis');
    Route::get('formularioDirectores', [Controlador::class, 'formularioDirectores'])->name('formularioDirectores');
    Route::match(['get', 'post'], 'guardarDirectores', [Controlador::class, 'guardarDirectores'])->name('guardarDirectores');
    Route::get('formularioElenco', [Controlador::class, 'formularioElenco'])->name('formularioElenco');
    Route::match(['get', 'post'], 'guardarElenco', [Controlador::class, 'guardarElenco'])->name('guardarElenco');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});



//pruebas especiales(relaciones) //
Route::get('/test-relation', [Controlador::class, 'testRelation']);//para probar metodos relacionales(one to one)//

//rutas para cambio de idioma//
Route::get('lang/{lang}', function ($lang) {

    if (in_array($lang, ['en', 'es'])) {
        session(['locale' => $lang]);
    }
    return redirect()->back();
})->name('lang.switch');
