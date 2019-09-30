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
// Route::post('/registar/usuarios', 'ClientesController@store')->name('registar.usuario');






Route::resource('clientes', 'ClientesController');