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

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/menu', 'MenuController@test');
Route::get('/menu', "MenuController@output");
Route::get('/home',"TweetController@home");
Route::post('/tweet',"TweetController@post");
Route::get('/users',"TweetController@list");
Route::post('/users/follow',"TweetController@fpost");
