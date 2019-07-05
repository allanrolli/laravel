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
Route::get('/tarefas', 'SeriesController@index')
    ->name('listar_tarefas');
Route::get('/tarefas/criar', 'SeriesController@create')
    ->name('form_criar_tarefa');
Route::post('/tarefas/criar', 'SeriesController@store');
Route::delete('/tarefas/{id}', 'SeriesController@destroy');

Route::get('/tarefas/{tarefaId}/temporadas', 'TemporadasController@index');
