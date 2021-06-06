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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostsController@index');

Route::post('posts', 'PostsController@store');

Route::get('create', 'PostsController@create');

Route::get('/post/{post}','PostsController@show');

Route::get('users', 'UsersController@index');

Route::post('follow/{id}', 'UserFollowController@store');

Route::post('unfollow/{id}', 'UserFollowController@destroy');

Route::get('timeline', 'PostsController@timeline');