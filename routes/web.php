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
  return redirect('home');
});
Route::get('/calendario', function () {
  return view('calendario.calendario');
});
Route::get('/test', function () {
  return view('calendario.test');
});

/*Route::resource('/calendario', function () {
    return redirect('calendario.calendar');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index');

//Route::resource('/calendario', 'CalendarioController');

Route::resource('areas', 'AreaController');

Route::resource('asignaturas', 'AsignaturaController');

Route::resource('cargoConcursados', 'CargoConcursadoController');

Route::resource('carreras', 'CarreraController');

Route::resource('categorias', 'CategoriaController');

Route::resource('concursos', 'ConcursoController');

Route::resource('concursoJurados', 'ConcursoJuradoController');

Route::resource('concursoPostulantes', 'ConcursoPostulanteController');

Route::resource('institutos', 'InstitutoController');

Route::resource('jurados', 'JuradoController');

Route::resource('llamados', 'LlamadoController');

Route::resource('logs', 'LogController');

Route::resource('llamadoConcursos', 'LlamadoConcursosController');

Route::resource('perfiles', 'PerfilesController');

Route::resource('postulantes', 'PostulanteController');

Route::resource('requisitos', 'RequisitoController');

Route::resource('requisitoItems', 'RequisitoItemController');

Route::resource('requisitoPostulantes', 'RequisitoPostulanteController');

Route::resource('universidads', 'UniversidadController');

Route::resource('users', 'UserController');
