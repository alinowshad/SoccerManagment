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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::resource('posts', 'PostsController');
Route::resource('/dashboard/teams', 'TeamController');
Route::resource('/dashboard/players', 'PlayerController');
Route::get('/dashboard/players/create/{team}', 'PlayerController@create');
Route::get('/dashboard/players/team/{team}', 'PlayerController@index');
Route::get('/dashboard/players/all/{team}', 'PlayerController@existing');
Route::get('/dashboard/players/add/{team}/{player}', 'PlayerController@addexisting');
Route::get('/dashboard/players/delete/{team}/{player}', 'PlayerController@deletefromteam');
Route::get('/dashboard/allplayers', 'PlayerController@all');
Route::get('/dashboard/users/create', 'UserController@create');
Route::get('/dashboard/calendar', 'DashboardController@calendar');
Route::get('/dashboard/users/', 'UserController@index');
Route::get('/dashboard/users/{user}', 'UserController@destroy');
Route::get('/dashboard/users/{user}/edit', 'UserController@edit');
Route::post('/dashboard/users/change/{user}', 'UserController@update');
Auth::routes();
Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard/posts', 'DashboardController@posts');

