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

//Backend

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('admin');
    Route::get('user', 'UserController@index')->name('user');
    Route::get('post', 'PostController@index')->name('post');
});
