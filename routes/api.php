<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('busses', 'BusseController');
Route::apiResource('practices', 'PracticeController');
Route::apiResource('students', 'StudentController');
Route::apiResource('teachers', 'TeacherController');
//Route::apiResource('managePractices', 'ManagePracticeController');
Route::get('managePractices/{id_practice}', 'ManagePracticeController@show');
Route::delete('managePractices/{id_practice}/{id_student}', 'ManagePracticeController@destroy');
Route::get('managePractices', 'ManagePracticeController@index');
Route::post('managePractices', 'ManagePracticeController@store');
Route::put('managePractices', 'ManagePracticeController@update');