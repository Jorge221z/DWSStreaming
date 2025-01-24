<?php

use App\Http\Controllers\Controlador;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controlador::class, 'inicio'])->name('inicio');
Route::get('inicio', [Controlador::class, 'inicio'])->name('inicio');
Route::get('catalogo', [Controlador::class, 'catalogo'])->name('catalogo');
Route::get('formulario', [Controlador::class, 'formulario'])->name('formulario');
Route::match(['get', 'post'],'validar', [Controlador::class, 'validar'])->name('validar');
Route::get('formularioPelis', [Controlador::class, 'formularioPelis'])->name('formularioPelis');
Route::match(['get', 'post'],'guardarPelis', [Controlador::class, 'guardarPelis'])->name('guardarPelis');
Route::get('salir', [Controlador::class, 'salir'])->name('salir'); //salir es para salir a inicio y cerrar sesion//
Route::get('logout', [Controlador::class, 'logout'])->name('logout'); //logout para cerrar sesion simplemente//

//para ejer one to many//
Route::get('formularioDirectores', [Controlador::class, 'formularioDirectores'])->name('formularioDirectores');
Route::match(['get', 'post'],'guardarDirectores', [Controlador::class, 'guardarDirectores'])->name('guardarDirectores');
Route::get('catalogoDirectores', [Controlador::class, 'catalogoDirectores'])->name('catalogoDirectores');

//para ejer many to many//
Route::get('formularioElenco', [Controlador::class, 'formularioElenco'])->name('formularioElenco');
Route::match(['get', 'post'],'guardarElenco', [Controlador::class, 'guardarElenco'])->name('guardarElenco');
Route::get('catalogoElenco', [Controlador::class, 'catalogoElenco'])->name('catalogoElenco');





//pruebas especiales//
Route::get('/test-relation', [Controlador::class, 'testRelation']);//para probar metodos relacionales(one to one)//
