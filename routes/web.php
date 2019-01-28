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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'DashboardController@index');
Route::resource('users', 'UsersController');
Route::resource('projects', 'ProjectsController');
// Route::resource('tasks', 'ProjectTasksController');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::get('/projects/{project}/tasks/{task}', 'ProjectTasksController@show');
Route::delete('/tasks/{task}', 'ProjectTasksController@destroy');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');
// Route::get('/projects/create', 'ProjectsController@create');
// Route::get('/projects/{project}', 'ProjectsController@show');
// Route::post('/projects', 'ProjectsController@store');
// Route::get('/projects/{project}/edit', 'ProjectsController@edit');
// Route::patch('/projects/{project}', 'ProjectsController@update');
// Route::delete('/projects/{project}', 'ProjectsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
