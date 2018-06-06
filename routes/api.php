<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('areas', 'AreaAPIController');

Route::resource('asignaturas', 'AsignaturaAPIController');

Route::resource('cargo_concursados', 'CargoConcursadoAPIController');

Route::resource('carreras', 'CarreraAPIController');

Route::resource('categorias', 'CategoriaAPIController');

Route::resource('concursos', 'ConcursoAPIController');

Route::resource('concurso_jurados', 'ConcursoJuradoAPIController');

Route::resource('concurso_postulantes', 'ConcursoPostulanteAPIController');

Route::resource('institutos', 'InstitutoAPIController');

Route::resource('jurados', 'JuradoAPIController');

Route::resource('llamados', 'LlamadoAPIController');

Route::resource('logs', 'LogAPIController');

Route::resource('llamado_concursos', 'LlamadoConcursosAPIController');

Route::resource('perfiles', 'PerfilesAPIController');

Route::resource('postulantes', 'PostulanteAPIController');

Route::resource('requisitos', 'RequisitoAPIController');

Route::resource('requisito_items', 'RequisitoItemAPIController');

Route::resource('requisito_postulantes', 'RequisitoPostulanteAPIController');

Route::resource('universidads', 'UniversidadAPIController');

Route::resource('users', 'UserAPIController');

Route::resource('areas', 'AreaAPIController');

Route::resource('asignaturas', 'AsignaturaAPIController');

Route::resource('cargo_concursados', 'CargoConcursadoAPIController');

Route::resource('carreras', 'CarreraAPIController');

Route::resource('categorias', 'CategoriaAPIController');

Route::resource('concursos', 'ConcursoAPIController');

Route::resource('concurso_postulantes', 'ConcursoPostulanteAPIController');

Route::resource('institutos', 'InstitutoAPIController');

Route::resource('jurados', 'JuradoAPIController');

Route::resource('llamados', 'LlamadoAPIController');

Route::resource('logs', 'LogAPIController');

Route::resource('llamado_concursos', 'LlamadoConcursosAPIController');

Route::resource('perfiles', 'PerfilesAPIController');

Route::resource('postulantes', 'PostulanteAPIController');

Route::resource('requisitos', 'RequisitoAPIController');

Route::resource('requisito_items', 'RequisitoItemAPIController');

Route::resource('requisito_postulantes', 'RequisitoPostulanteAPIController');

Route::resource('universidads', 'UniversidadAPIController');

Route::resource('users', 'UserAPIController');