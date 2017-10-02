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
/* Route for user */
Route::get('/', 'HomeController@index');
Route::get('login', 'LoginController@getLogin');
Route::post('login', 'LoginController@postLogin')->name('login');
Route::get('logout', 'LoginController@getLogout');

/* Display front */
Route::get('category/{category}','PagesController@getCategory');
Route::get('post/{slug}.html','PagesController@getPost');
Route::get('tag/{tag}','PagesController@getTag');
Route::get('search/{query}','PagesController@getSearch');
Route::get('contact.html','PagesController@getContact');

/*Group router for admin */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	Route::get('/', function () {
        return view('admin.index');
    })->name('dashbroad');

	/* Group for author */
    Route::get('profile', 'AdminController@getProfile');
    Route::put('profile', 'AdminController@putProfile');

    Route::prefix('post')->group(function () {
        Route::get('/', 'PostController@getList')->name('list-post');
        Route::get('add', 'PostController@getAdd');
        Route::post('add', 'PostController@postAdd');
        Route::get('update/{id}', 'PostController@getUpdate');
        Route::post('update/{id}', 'PostController@postUpdate');
        Route::get('delete/{id}', 'PostController@getDelete');
    });
    
    /* Group for admin */
    Route::middleware(['role'])->group(function () {
        /* Group for category */
        Route::prefix('category')->group(function () {
            Route::get('/', 'CategoryController@getList');
            Route::get('add', 'CategoryController@getAdd');
            Route::post('add', 'CategoryController@postAdd');
            Route::get('data', 'CategoryController@dataTable')->name('data');
            Route::post('update', 'CategoryController@postUpdate');
            Route::delete('delete', 'CategoryController@delete');
        });
        /* Group for user */
        Route::prefix('user')->group(function () {
           
        });
        Route::prefix('file')->group(function () {
            Route::get('/', 'FileController@getList')->name('list-file');
            Route::get('delete/{id}', 'FileController@getdelete');
        });
    });
});
