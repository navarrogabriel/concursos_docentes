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






//Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@getReset');
//Route::post('/password/reset', 'Auth\ResetPasswordController@postReset');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/calendar', 'HomeController@calendar');

Route::resource('users', 'UserController');

Route::resource('postulantes', 'PostulanteController');

Route::resource('areas', 'AreasController');

Route::resource('institutos', 'institutosController');

Route::resource('asignaturas', 'AsignaturaController');

Route::resource('categorias', 'CategoriasController');

Route::resource('dedicaciones', 'dedicacionesController');

Route::resource('jurados', 'juradosController');

Route::resource('perfiles', 'perfilesController');

Route::resource('concursos', 'ConcursosController');

Route::resource('concursospostulantes', 'concursospostulantesController');

Route::resource('concursosjurados', 'concursosjuradosController');

Route::resource('ordenesmeritos', 'ordenesmeritoController');
