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

Route::get('/', 'WelcomeController@index');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/estudiantes', 'AdminController@estudiantes');
Route::get('/admin/practicas', 'AdminController@practicas');
Route::get('/admin/docentes', 'AdminController@docentes');
Route::get('/admin/buses', 'AdminController@buses');
Route::get('/user', 'UserController@index');
Route::get('/user/reportes', 'UserController@reportes');
