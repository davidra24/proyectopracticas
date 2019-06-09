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
Route::group(['middleware' => 'web'], function () {
    Auth::routes();
    Route::get('/', function () {
        return redirect()->guest('login');
    });
});

Route::group(
    ['prefix' => 'admin', 'middleware' => ['web', 'auth', 'admin']],
    function () {
        Route::get('/', [
            'uses' => 'AdminController@index',
            'as' => 'admin.index'
        ]);
        Route::get('/estudiantes', 'AdminController@estudiantes');
        Route::get('/practicas', 'AdminController@practicas');
        Route::get('/docentes', 'AdminController@docentes');
        Route::get('/buses', 'AdminController@buses');
        
    }
);
Route::group(
    ['prefix' => 'user', 'middleware' => ['web', 'auth', 'user']],
    function () {
        Route::get('/', [
            'uses' => 'UserController@index',
            'as' => 'user.index'
        ]);
        
        Route::get('/reportes', 'UserController@reportes');
    }
);

Route::get('/', 'WelcomeController@index');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
