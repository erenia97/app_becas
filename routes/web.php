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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/forms', 'HomeController@forms');
Route::post('/registar/entidad', 'EntidadesController@store')->name('registar.entidad');
Route::post('/registar/usuarios', 'ClientesController@store')->name('registar.usuario');
Route::put('/registar/entidadupdate', 'EntidadesController@update')->name('update.entidad');
Route::get('/registar/crearbecas',  'HomeController@becas')->name('beca');
Route::post('/registar/crearbecas',  'BecasController@store')->name('registar.beca');