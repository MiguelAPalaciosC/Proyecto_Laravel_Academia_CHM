<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/', 'StartController@index');
//Route::get('/', 'EstudianteController@index');

//Rutas para indicar el controlador

Route::resource('almacen/estudiante','EstudianteController');
Route::resource('almacen/empresa','EmpresaController');

//RUTAS USADAS POR CAMILO TRIANA
Route::resource('usuario','UsuarioController');
Route::resource('academia/tarea','TareaController');
Route::auth();
Route::get('/home', 'HomeController@index');

// Route::resource('almacen/estudiante','EstudianteController');
// Route::resource('almacen/empresa','EmpresaController');


Route::resource('academia/asignatura','AsignaturaAdminController');
Route::resource('academia/inscribir','AsignaturaUsuarioController');

Route::resource('academia/docente','AsignaturaDController');

Route::resource('academia/respuesta','RespuestaEController');
Route::resource('academia/respuestas','RespuestaDController');

Route::resource('academia/nota','NotaController');

Route::resource('estudiante','EstudianteController');
Route::get('materia/{nombre}', 'EstudianteController@busquedaMaterias')->name('materia');
Route::resource('profesor','ProfesorController');
Route::get('profesorMateria/{nombre}', 'ProfesorController@busquedaMaterias')->name('materia');


