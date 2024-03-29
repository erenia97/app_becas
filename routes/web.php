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

// Route::post('/registar/usuarios', 'ClientesController@store')->name('registar.usuario');

Route::resource('clientes', 'ClientesController');
Route::post('/registar/usuarios', 'ClientesController@store')->name('registar.usuario');
Route::get('/registar/clienteupdate', 'ClientesController@index')->name('update.cliente');
Route::post('/registar/clienteupdate2/{id_cliente}', 'ClientesController@update')->name('update.update.clientes');
Route::get('/becasIndex',  'UsuariosController@index')->name('usuariosbecas.index');



Route::post('/registar/entidad', 'EntidadesController@store')->name('registar.entidad');
Route::delete('eliminar/entidad/{id_entidad}', 'EntidadesController@destroy')->name('eliminarentidad');
Route::get('/registar/entidadupdate', 'EntidadesController@index')->name('update.entidad');
Route::post('/registar/entidadupdate2/{id_entidad}', 'EntidadesController@update')->name('update.update.entidad');



Route::get('/registar/crearbecas',  'HomeController@becas')->name('beca');
Route::get('/registar/index',  'BecasController@index')->name('becas.index');
Route::post('/registar/crearbecas',  'BecasController@store')->name('registar.beca');
Route::delete('eliminarBecas/{id_becas}', 'BecasController@destroy')->name('eliminarBecas');

Route::get('/registaar/becasupdate/{id_becas}', 'BecasController@show')->name('update.becas');

Route::post('/registar/becasupdate/{id_becas}', 'BecasController@update')->name('update.update.becas');




Route::get('/registar/requisitos',  'HomeController@requisitos')->name('requisitos');
Route::POST('/registar/ingresarRequisitos',  'RequisitosController@store')->name('becas.requisitos');


Route::get('/registar/contacto',  'HomeController@contacto')->name('contacto');
Route::post('/registar/registroContacto',  'ContactoController@store')->name('registro.contacto');


Route::get('/registar/beneficios',  'HomeController@beneficios')->name('beneficios');
Route::post('/registar/registroBeneficios',  'BeneficiosControler@store')->name('registro.beneficios');


