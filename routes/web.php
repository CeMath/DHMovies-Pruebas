<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Pagina inicio donde aparecen 5 peliculas randoms y las ultimas 5 peliculas agregadas
Route::get('/inicio', 'PeliculasController@peliculas');

// Pagina de listado de peliculas
Route::get('/listadoPeliculas', 'PeliculasController@listado');

// Pagina de detalle de cada pelicula
Route::get('/detallePelicula/{id}', "PeliculasController@detalle");

// Buscador de pelicula
Route::get('/buscador', "PeliculasController@buscar");

Route::get('/agregarPelicula', function() {
    return view("agregarPelicula");
});

Route::post('/agregarPelicula', 'PeliculasController@agregar');

Route::get('/borrarPelicula', 'PeliculasController@listadoBorrar');

Route::post('/borrarPelicula', 'PeliculasController@borrar');

Route::get('/buscadorBorrar', "PeliculasController@buscarBorrar");

Route::get('/ABM', function() {
    return view("ABM");
}) -> middleware('admin');

Route::get('/actualizarPelicula', 'PeliculasController@listadoActualizar');

Route::post('/actualizarPelicula', 'PeliculasController@peliculaAActualizar');

Route::get('/buscadorActualizar', "PeliculasController@buscarActualizar");

Route::post('/Actualizar', "PeliculasController@Actualizar");



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

