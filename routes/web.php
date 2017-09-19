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
    return view('news/pages/home');
});
Route::get('users/get/{id}', 'UserController@get');
Route::post('users','UserController@post')->name('post');
Route::get('users/list','UserController@listuser');
Route::get('post/{slug}', function() {
    return view('news/pages/singlepost');
});