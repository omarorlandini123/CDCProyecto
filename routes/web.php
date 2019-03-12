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
Route::get('/citas/reporte','CitasController@reporte');
Route::get('/citas/eliminar/{idCita}','CitasController@eliminar');
Route::get('/citas/EnviarReporte','CitasController@enviarReporte');
Route::get('/citas/ultimas/{idHistoria}','CitasController@ultimas');
Route::resource('/citas','CitasController');
Route::get('/pacientes/eliminar/{idPaciente}','PacienteController@eliminar');
Route::resource('/pacientes','PacienteController');

Route::get('/usuario','UsuarioController@getUserData')->name('usuario-data');
Route::get('/citaslist/{cond}','CitasController@listar')->name('citas.listar');

Route::get('/medicoslist/{cond}','MedicosController@listar')->name('medicos.listar');
Route::get('/motivoslist','MotivoController@listar')->name('motivos.listar');

Route::get('/aseguradoraslist','AseguradoraController@listar')->name('aseguradoras.listar');

Route::post('/medico/{idmedico}/turnos','MedicosController@turnos')->name('medicos.turnos');

Route::get('/historias/{cond}','HistoriaController@listar')->name('historias.listar');

Route::get('/ubicaciones/{cond}','UbicacionesController@listar')->name('ubicaciones.listar');
