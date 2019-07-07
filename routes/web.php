<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/new', [
    'uses'=> 'PageController@newPage'
]);

Route::get('/todos', [
    'uses'=> 'TodosController@index'
]);

Route::get('/todos/completed/{id}', [
    'uses'=> 'TodosController@completed',
    'as' => 'todo.completed'
]);

Route::post('create/todo', [
    'uses'=>'TodosController@store'
]);

Route::get('/todo/delete/{id}', [
    'uses'=> 'TodosController@delete',
    'as' => 'todo.delete'
]);

Route::get('/todo/update/{id}', [
    'uses'=> 'TodosController@update',
    'as' => 'todo.update'
]);

Route::post('todo/save/{id}', [
    'uses'=> 'TodosController@save',
    'as'=> 'todo.save'
]);