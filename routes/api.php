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
Route::get('cars','CarController@index')->name('api.car.index');
Route::get('cars/{id}','CarController@view')->name('api.car.view');

Route::get('problems','ProblemController@index')->name('api.problem.index');
Route::get('problem/{id}','ProblemController@view')->name('api.problem.view');