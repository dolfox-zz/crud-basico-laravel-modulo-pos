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

Route::get('/filmes', 'FilmesController@index')->name('listar_filmes');
Route::get('/filmes/criar', 'FilmesController@create');
Route::post('/filmes/criar', 'FilmesController@store');
Route::delete('/filmes/{id}', 'FilmesController@destroy');
Route::get('/filmes/{id}/edit', 'FilmesController@edit');
Route::post('/filmes/update', 'FilmesController@update')->name('update-film');
